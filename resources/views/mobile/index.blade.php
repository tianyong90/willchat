<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>shop</title>
  <link rel="stylesheet" href="">
</head>
<body>
<div id="header"></div>
<div id="main">
  <a id="topay" href="javascript:;">
    <h1>付款</h1>
  </a>
</div>
<div id="footer"></div>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  $(function () {

    wx.config({!! $jsConfig !!});

    wx.ready(function(){
      $('a#topay').click(function(){

        wx.chooseWXPay({
          timestamp: {!! $paymentJsConfig['timeStamp'] !!},
          nonceStr: "{!! $paymentJsConfig['nonceStr'] !!}",
          package: "{!! $paymentJsConfig['package'] !!}",
          signType: "{!! $paymentJsConfig['signType'] !!}",
          paySign: "{!! $paymentJsConfig['paySign'] !!}",
          success: function (data) {
            // 充值成功后跳转至会员卡页
            window.location.href = '/';
          },
          fail: function (data) {
             alert(data);
          }
        });
      });

//      wx.hideAllNonBaseMenuItem();





    });

  })
</script>
</body>
</html>