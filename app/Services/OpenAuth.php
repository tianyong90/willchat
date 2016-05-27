<?php

namespace App\Services;

use Cache;
use GuzzleHttp\Client;

/**
 * 开放平台授权.
 */
class OpenAuth
{
    /**
     * 使用授权码获取公众号调用凭据和授权的权限集.
     *
     * @param $authCode
     *
     * @return mixed
     */
    public function getAuthorizerAccessToken()
    {
        $accessToken = Cache::remember('authorizer_access_token', 110, function () {
            $appId = env('COMPONENT_APPID');

            $http = new Client();

            $option = [
                'json' => [
                    'component_appid'    => $appId,
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
     * 获取预授权码
     */
    public function getPreAuthCode()
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
                    'component_appid'         => $appId,
                    'component_appsecret'     => $appSecret,
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
    public function getVerifyTicket()
    {
        return Cache::get('component_verify_ticket');
    }

    /**
     * 刷新公众号 accessToken.
     *
     * @param string $authorizerAppid
     * @param string $refershToken
     */
    public function refreshAuthorizerAccessToken($authorizerAppId, $refershToken)
    {
        $componentAccessToken = $this->getComponentAccessToken();

        $http = new Client();

        $option = [
            'json' => [
                'component_appid'          => env('COMPONENT_APPID'),
                'authorizer_appid'         => $authorizerAppId,
                'authorizer_refresh_token' => $refershToken,
            ],
        ];

        $url = 'https://api.weixin.qq.com/cgi-bin/component/api_authorizer_token?component_access_token='.$componentAccessToken;

        $res = $http->post($url, $option);

        $response = json_decode(strval($res->getBody()), true);

        if ($response && array_key_exists('authorizer_access_token', $response)) {
            Cache::put('authorizer_access_token', $response['authorizer_access_token'], 110);

            return $response['authorizer_access_token'];
        }

        return '';
    }
}
