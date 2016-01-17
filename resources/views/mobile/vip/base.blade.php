<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="viewport" content="width=device-width,initial-scale=1,max-scale=1,user-scalable=no"/>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <!-- 指定标题 -->
  <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
  <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.2/css/amazeui.min.css"/>
  {{--<link rel="stylesheet" href="__CSS__/MemberCard/card.css"/>--}}

  <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
  @yield('css')

  @yield('pre_script')
</head>
<body>
@yield('main')
@include('wap.vip.bottom')
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.4.2/js/amazeui.min.js"></script>
<script src="{{asset('static')}}/layer.mobile-v1.6/layer.m/layer.m.js"></script>
<script>
  $(function () {
    $("input").not('.submit-ajax').focus(function () {
      $("#navbar").hide();
    }).blur(function (event) {
      $("#navbar").show();
    });
  })
</script>
@yield('script')
</body>
</html>