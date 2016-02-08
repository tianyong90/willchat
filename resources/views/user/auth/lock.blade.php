<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-CN">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>WillChat</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="" name="willchat" />
  <meta content="" name="tianyong90" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <!-- <link href="http://fonts.useso.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> -->
  <link href="{{ asset('static') }}/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('static') }}/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('static') }}/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN THEME GLOBAL STYLES -->
  <link href="{{ asset('static') }}/metronic/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
  <link href="{{ asset('static') }}/metronic/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
  <!-- END THEME GLOBAL STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link href="{{ asset('static') }}/metronic/pages/css/lock.min.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN THEME LAYOUT STYLES -->
  <!-- END THEME LAYOUT STYLES -->
  <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->
<body class="">
<div class="page-lock">
  <div class="page-logo">
    <a class="brand" href="{{ user_url('/') }}">
      <img src="{{ asset('images') }}/user/logo.png" alt="logo" height="30" /> </a>
  </div>
  <div class="page-body">
    <div class="lock-head"> 锁屏中…… </div>
    <div class="lock-body">
      <div class="pull-left lock-avatar-block">
        <img src="{{ asset($lockedAvatar) }}" class="lock-avatar"> </div>
      <form class="lock-form pull-left" action="{{ user_url('login') }}" method="post">
        
        {!! csrf_field() !!}

        <h4>{{ $lockedName }}</h4>
        <div class="form-group">
          <input type="hidden" name="name" value="{{ $lockedName }}" />
          <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />
        </div>
        <div class="form-actions">
          <button type="submit" class="btn red uppercase">登录</button>
        </div>
      </form>
    </div>
    <div class="lock-bottom">
      <a href="{{ user_url('login') }}">换用其它账号登录</a>
    </div>
  </div>
  <div class="page-footer-custom"> 2016 &copy; WillChat by Tianyong90. </div>
</div>
<!--[if lt IE 9]>
<script src="{{ asset('static') }}/metronic/global/plugins/respond.min.js"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('static') }}/metronic/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('static') }}/metronic/pages/scripts/lock.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>