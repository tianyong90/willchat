<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use EasyWeChat\Foundation\Application;
use Cache;

class OpenAuthController extends Controller
{
    public function getIndex()
    {
        $appId = env('COMPONENT_APPID');
        $appSecret = env('COMPONENT_APPSECRET');
        $token = env('COMPONENT_TOKEN');
        $aesKey = env('COMPONENT_AES_KEY');

        $preAuthCode = $this->getPreAuthCode();

        $redirectUrl = 'http://bontian.oicp.net/open-oauth-callback';

        $authLinkUrl = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid={$appId}&pre_auth_code={$preAuthCode}&redirect_uri={$redirectUrl}";

        return view('open_auth.index', compact('authLinkUrl'));
    }

    /**
     * 使用授权码获取公众号调用凭据和授权的权限集.
     *
     * @param $authCode
     *
     * @return mixed
     */
    public function getAuthorizerAccessToken($authCode)
    {
        $accessToken = Cache::remember('authorizer_access_token', 110, function () {
            $appId = env('COMPONENT_APPID');

            $http = new Client();

            $option = [
                'json' => [
                    'component_appid' => $appId,
                    'authorization_code' => Cache::get('auth_code'),
                ],
            ];

            $url = 'https://api.weixin.qq.com/cgi-bin/component/api_query_auth?component_access_token='.$this->getComponentAccessToken();

            $res = $http->post($url, $option);

            $response = json_decode(strval($res->getBody()));

            return $response;
        });

        return $accessToken;
    }

    /**
     * 授权回调处理.
     *
     * @param Request $request
     */
    public function openOauthCallback(Request $request)
    {
        $authCode = $request->input('auth_code');
        $expiresIn = $request->input('expires_in');

        dump($authCode);

        Cache::put('auth_code', $authCode, $expiresIn / 60);

        dump($this->getAuthorizerAccessToken($authCode));
    }

    /**
     * 获取预授权码
     */
    private function getPreAuthCode()
    {
        $preAuthCode = Cache::remember('pre_auth_code', 10, function () {
            $appId = env('COMPONENT_APPID');

            $url = 'https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode?component_access_token='.$this->getComponentAccessToken();

            $http = new Client();
            $response = $http->post($url, ['json' => ['component_appid' => $appId]]);

            $result = json_decode((string) $response->getBody());

            return $result->pre_auth_code;
        });

        return $preAuthCode;
    }

    /**
     * 获取 component_access_token.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getComponentAccessToken()
    {
        $accessToken = Cache::remember('comopnent_access_token', 110, function () {
            $appId = env('COMPONENT_APPID');
            $appSecret = env('COMPONENT_APPSECRET');

            $http = new Client();

            $option = [
                'json' => [
                    'component_appid' => $appId,
                    'component_appsecret' => $appSecret,
                    'component_verify_ticket' => $this->getVerifyTicket(),
                ],

            ];

            $url = 'https://api.weixin.qq.com/cgi-bin/component/api_component_token';

            $res = $http->post($url, $option);

            $response = json_decode(strval($res->getBody()));

            return $response->component_access_token;
        });

        return $accessToken;
    }

    /**
     * 获取缓存的 component_verify_ticket.
     *
     * @return mixed
     */
    private function getVerifyTicket()
    {
        return Cache::get('component_verify_ticket');
    }

    /**
     * 接收开放平台授权事件.
     *
     * @param Request $request
     */
    public function verify(Request $request)
    {
        $options = [
            'debug' => true,
            'app_id' => env('COMPONENT_APPID'),
            'secret' => env('COMPONENT_APPSECRET'),
            'token' => env('COMPONENT_TOKEN'),
            'aes_key' => env('COMPONENT_AES_KEY'),
            // log
            'log' => [
                'level' => \Monolog\Logger::DEBUG,
                'file' => storage_path('logs/easywechat.log'),
            ],
            // oauth
            'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => '/examples/oauth_callback.php',
            ],
        ];

        $easywechat = new Application($options);

        $content = strval($request->getContent(false));

        $decryptedData = $easywechat->encryptor->decryptMsg(
            $request->get('msg_signature'),
            $request->get('nonce'),
            $request->get('timestamp'),
            $content);

        \Log::info($decryptedData);

        // verity_ticket 存入缓存
        Cache::forever('component_verify_ticket', $decryptedData['ComponentVerifyTicket']);

        echo 'success';
    }
}
