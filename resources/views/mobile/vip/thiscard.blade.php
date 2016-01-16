<extend name="base"/>
<block name="main-content">
    <switch name="error">
    <case value="-5">
        <div class="am-container error">
            <span class="am-icon-frown-o am-icon-lg"></span>
            <p>会员系统中无对应的会员记录,<br/>请尝试重新领取或绑定会员卡。</p>
        </div>
        <div class="am-container">
            <ul class="am-list" id="card-list">
                <notempty name="cardinfo">
                    <li class="am-g">
                        <span class="am-u-sm-3">
                            <img class="card-logo" style="max-width:4px;max-height:40px;" src="{$cardinfo.logo}" alt=""/>
                        </span>
                        <span class="am-u-sm-9">
                            <h1 class="card-name">{$cardinfo.cardname}</h1>
                            <p class="card-message">{$cardinfo.msg}</p>
                            <a class="am-badge am-badge-secondary am-round" href="{:U('memberbind',array('token'=>$token,'openid'=>$openid,'deleteold'=>1))}">绑定会员卡</a>
                            <a class="am-badge am-badge-success am-round" href="{:U('register',array('token'=>$token,'openid'=>$openid,'deleteold'=>1))}">领取会员卡</a>
                        </span>
                    </li>
                <else/>
                    <li><a href="#"><span>商家暂时未设置会员卡</span></a></li>
                </notempty>
            </ul>
        </div>
    </case>
    <case value="-6">
        <div class="am-container error">
            <span class="am-icon-frown-o am-icon-lg"></span>
            <p>您还没有注册会员卡</p>
            <a class="am-btn am-btn-primary am-btn-block am-radius" href="{:U('index',array('token'=>$token,'openid'=>$openid,'islink'=>1))}">去领卡</a>
        </div>
    </case>
    <case value="-7">
        <div class="am-container error">
            <span class="am-icon-frown-o am-icon-lg"></span>
            <p>未能从会员系统获取会员信息,请稍后重试</p>
            <button class="am-btn am-btn-primary am-btn-block am-radius reload">刷新</button>
        </div>
    </case>
    <case value="-1">
        <div class="am-container error">
            <span class="am-icon-frown-o am-icon-lg"></span>
            <p>未能从会员系统获取会员信息,请稍后重试</p>
            <button class="am-btn am-btn-primary am-btn-block am-radius reload">刷新</button>
        </div>
    </case>
    <default/>
    <div id="card">
      <img class="card-bg" src="<notempty name="cardinfo.diybg">{$cardinfo.diybg}<else/>__IMG__/MemberCard/card_bg/card_bg{$cardinfo.bg|default=1}.png</notempty>" alt="" />
  <notempty name="cardinfo.display_cardlogo">
    <img class="card-logo" src="__ROOT__{$cardinfo.logo}" alt=""/>
  </notempty>
  <notempty name="cardinfo.display_cardname">
    <span class="card-name" style="color:{$cardinfo.namecolor}">{$cardinfo.name}</span>
  </notempty>
  <notempty name="cardinfo.display_cardnumber">
    <p class="card-number" style="color:{$cardinfo.numbercolor}">{$myinfo.cardnumber}</p>
  </notempty>
  </div>
  <div class="am-g">
    <div class="am-u-sm-6 am-u-sm-centered">
      <a href="###" id="scan-qrcode">
        <i class="am-icon-qrcode"></i>
        二维码
      </a>
    </div>
  </div>
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="qrcode">
    <div class="am-modal-dialog">
      <div class="am-modal-bd">
        <div id="qrcodezone"></div>
      </div>
    </div>
  </div>
  <div class="am-container">
    <div class="quicklink">
      <a href="{:U('scorelog',array('token'=>$token,'openid'=>$openid,'cardid'=>$cardinfo['id']))}"
         class="am-u-sm-4"><i class="am-icon-md am-icon-flag"></i><span>
                {$luckpoint|default=0}分</span></a>
      <a href="{:U('rechargelog',array('token'=>$token,'openid'=>$openid,'cardid'=>$cardinfo['id']))}"
         class="am-u-sm-4"><i class="am-icon-md am-icon-money"></i><span>
                {$luckmoney|default=0}元</span></a>
      <a href="{:U('noticelist',array('token'=>$token,'openid'=>$openid,'cardid'=>$cardinfo['id']))}" class="am-u-sm-4"><i class="am-icon-md am-icon-bell-o"></i><span>{$notice_count}</span></a>
    </div>
  </div>
  <div class="am-container">
    <ul class="am-list menu-list">
      <!-- <li>
          <a href="{:U('signscore',array('token'=>$token,'openid'=>$openid,'cardid'=>$cardinfo['id']))}">
              <i class="am-icon-tag menu-icon"></i>
              <span>签到赚积分</span>
          </a></li> -->
      <li>
        <a href="{:U('scorelog',array('token'=>$token,'openid'=>$openid,'mid'=>$myinfo['mid']))}">
          <i class="am-icon-tags menu-icon"></i>
          <span>积分记录</span>
        </a></li>
      <eq name="payment_on" value="true">
        <!-- 如果配置并开启了支付系统则显示充值入口 -->
        <li>
          <a href="{:U('recharge',array('token'=>$token,'openid'=>$openid,'mid'=>$myinfo['mid']))}">
            <i class="am-icon-cny menu-icon"></i>
            <span>我要充值</span>
          </a></li>
      </eq>
      <li>
        <a href="{:U('rechargelog',array('token'=>$token,'openid'=>$openid,'mid'=>$myinfo['mid']))}">
          <i class="am-icon-history menu-icon"></i>
          <span>充值记录</span>
        </a></li>
      <li>
        <a href="{:U('giftlist',array('token'=>$token,'openid'=>$openid,'mid'=>$myinfo['mid']))}">
          <i class="am-icon-gift menu-icon"></i>
          <span>积分兑换</span>
        </a></li>
      <li>
        <a href="{:U('consumelog',array('token'=>$token,'openid'=>$openid,'mid'=>$myinfo['mid']))}">
          <i class="am-icon-money menu-icon"></i>
          <span>消费记录</span>
        </a></li>
      <li>
        <a href="{:U('memberinfo',array('token'=>$token,'openid'=>$openid,'mid'=>$myinfo['mid']))}">
          <i class="am-icon-user menu-icon"></i>
          <span>个人资料</span>
        </a></li>
      <li>
        <a href="{:U('updatepassword',array('token'=>$token,'openid'=>$openid,'mid'=>$myinfo['mid']))}">
          <i class="am-icon-key menu-icon"></i>
          <span>修改密码</span>
        </a></li>
    </ul>
  </div>
  </switch>
</block>
<block name="script">
  <script src="__STATIC__/jquery.qrcode.min.js"></script>
  <script>
    function utf16to8(str) {
      var out, i, len, c;
      out = "";
      len = str.length;
      for (i = 0; i < len; i++) {
        c = str.charCodeAt(i);
        if ((c >= 0x0001) && (c <= 0x007F)) {
          out += str.charAt(i);
        } else if (c > 0x07FF) {
          out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));
          out += String.fromCharCode(0x80 | ((c >> 6) & 0x3F));
          out += String.fromCharCode(0x80 | ((c >> 0) & 0x3F));
        } else {
          out += String.fromCharCode(0xC0 | ((c >> 6) & 0x1F));
          out += String.fromCharCode(0x80 | ((c >> 0) & 0x3F));
        }
      }
      return out;
    }

    $(function () {
      var qrcode_str = "{$myinfo.cardnumber}";
      if (qrcode_str) {
        var content = utf16to8(qrcode_str);
        $("#qrcodezone").qrcode({
          text: content,
          render: "canvas",//设置渲染方式
          width: 200,     //设置宽度
          height: 200,     //设置高度
          // typeNumber  : -1,      //计算模式
          // correctLevel    : QRErrorCorrectLevel.H,//纠错等级
          // background      : "#ffffff",//背景颜色
          // foreground      : "#000000" //前景颜色
        })
      } else {
        $("#qrcode").remove();
      }

      $("#scan-qrcode").click(function (event) {
        $("#qrcode").modal();
      });

      //刷新
      $('button.reload').click(function (event) {
        window.location.reload();
      });
    })
  </script>
</block>