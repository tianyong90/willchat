<extend name="base"/>
<block name="style">
  <style>
    input {
      z-index: 9999 !important;
    }
  </style>
</block>
<block name="main-content">
  <div class="am-container">
    <form action="__SELF__" method="post" class="edit-form">
      <div class="am-input-group">
        <span class="am-input-group-label">卡号</span>
        <input type="text" class="am-form-field" name="cardnumber" id="cardnumber" value="{$myinfo.cardnumber}" readonly placeholder="">
      </div>
      <div class="am-input-group">
        <span class="am-input-group-label">金额</span>
        <input type="text" class="am-form-field js-pattern-fee" name="total_fee" id="total_fee" placeholder="请输入充值金额"
               required>
      </div>
      <button class="am-btn am-btn-primary am-btn-block am-radius submit-ajax" type="submit">充值</button>
    </form>
  </div>
</block>
<block name="script">
  <script>
    $(function () {
      $(document)
          .ajaxStart(function () {
            $(".submit-ajax").html('提交中').addClass('am-disabled');
          })
          .ajaxStop(function () {
            $(".submit-ajax").html('充值').removeClass('am-disabled')
          });
    });

    wx.ready(function () {
      // alert('wx ready');
      // 注意：此 Demo 使用 2.7 版本支付接口实现，建议使用此接口时参考微信支付相关最新文档。
      $("form").validator({
        H5validation: false,
        patterns: {
          fee: /(^0\.0[1-9]$)|(^0\.[1-9]([0-9])?$)|(^[1-9][0-9]*(\.[0-9]{1,2})?$)/
        },
        patternClassPrefix: 'js-pattern-',
        submit: function () {
          if (!this.isFormValid()) {
            return false;
          } else {
            var url = $('form').attr('action');
            var postData = $('form').serialize();

            $.ajax({
              url: url,
              type: 'post',
              dataType: 'json',
              data: postData,
            }).done(function () {
              console.log("success");
            })
            .fail(function () {
              console.log("error");
            })
            .always(function (response) {
              wx.chooseWXPay({
                timestamp: response.timestamp,
                nonceStr: response.nonceStr,
                package: response.package,
                signType: response.signType, // 注意：新版支付接口使用 MD5 加密
                paySign: response.paySign,
                success: function (data) {
                  //充值成功后跳转至会员卡页
                  var url = "{:U('index',array('token'=>$token,'openid'=>$openid))}";
                  window.location.href = url;
                },
                fail: function () {
                  // alert('充值失败');
                }
              });
            });
            return false;
          }
        }
      });
    });
  </script>
</block>