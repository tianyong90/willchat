<!DOCTYPE html>
<!--[if IE 8]>
<html lang="zh-cn" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="zh-cn" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-cn">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8"/>
  <title>锁屏中</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta content="" name="description"/>
  <meta content="" name="author"/>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <!-- <link href="http://fonts.useso.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/> -->
  <link href="{{ asset('static') }}/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
        type="text/css"/>
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link href="{{ asset('static') }}/metronic/admin/pages/css/lock.css" rel="stylesheet" type="text/css"/>
  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link href="{{ asset('static') }}/metronic/global/css/components.css" id="style_components" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/css/plugins.css" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('static') }}/metronic/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('static') }}/metronic/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"
        id="style_color"/>
  <link href="{{ asset('static') }}/metronic/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
  <!-- END THEME STYLES -->
  <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<div class="page-lock">
  <div class="page-logo">
    <a class="brand" href="index.html">
      <img src="__IMG__/logo-big.png" alt="logo"/>
    </a>
  </div>
  <div class="page-body">
    <div class="lock-head">
      屏幕锁定中……
    </div>
    <div class="lock-body">
      <div class="pull-left lock-avatar-block">
        <img src="{:get_avatar(cookie(uid))}" class="lock-avatar">
      </div>
      <form class="lock-form pull-left" action="{:u('Public/login')}" method="post">
        <h4>{:get_username(cookie(uid))}</h4>

        <div class="form-group">
          <input type="hidden" name="username" value="{:get_username(cookie(uid))}">
          <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="登录密码"
                 name="password"/>
        </div>
        <div class="alert alert-danger display-hide">
          <button class="close" data-close="alert"></button>
          <span id="tips"></span>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-success uppercase">登录</button>
        </div>
      </form>
    </div>
    <div class="lock-bottom">
      <a href="{:U('Public/login')}">使用其它账号登录</a>
    </div>
  </div>
  <div class="page-footer-custom">
    2014-2015 &copy; 纳新网络版权所有
  </div>
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ asset('static') }}/metronic/global/plugins/respond.min.js"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('static') }}/metronic/global/plugins/backstretch/jquery.backstretch.min.js"
        type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{ asset('static') }}/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<!-- <script src="{{ asset('static') }}/metronic/admin/layout/scripts/demo.js" type="text/javascript"></script> -->
<script src="{{ asset('static') }}/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script>
  jQuery(document).ready(function () {
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    // Demo.init();

    $("input[name='password']").focus();

    //使用AJAX提交登录
    $('form').submit(function (event) {
      if ($("input[name='password']").val() == "") {
        $('span#tips').html("请输入密码！").parent(".alert").show();
        return false;
      }
      ;

      var self = $(this);
      var postData = self.serialize();
      var url = self.attr('action');
      $.post(url, postData, function (data, textStatus, xhr) {
        if (data.status) {
          location.href = data.url;
        } else {
          $("input[name='password']").val('').focus();
          $('span#tips').html(data.info).parent(".alert").show();
        }
        ;
      }, "json");
      return false;
    });

    //回车提交
    $('form input').keypress(function (e) {
      if (e.which == 13) {
        $(this).submit();
        return false;
      }
    });
  });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>