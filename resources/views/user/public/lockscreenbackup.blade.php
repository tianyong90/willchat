<!DOCTYPE html>
<!--[if IE 8]>
<html lang="zh-ch" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="zh-ch" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-ch">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>锁屏中……</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
    <link href="{{ asset('static') }}/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('static') }}/metronic/admin/pages/css/lock2.css" rel="stylesheet" type="text/css"/>
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
    <!-- <div class="page-logo">
        <a class="brand" href="index.html">
            <img src="__IMG__/logo-big.png" alt="logo"/>
        </a>
    </div> -->
    <div class="page-body">
        <img class="page-lock-img" src="{:get_avatar(cookie(uid))}" alt="">
        <div class="page-lock-info">
            <h1>{:get_username(cookie(uid))}</h1>
			<span class="email">
			{$gname} </span>
			<span class="locked">
			锁屏中 </span>

            <form class="form-inline" method="post" action="{:U('Public/login')}">
                <div class="input-group input-medium">
                    <input type="hidden" name="username" value="{:get_username(cookie(uid))}">
                    <input type="password" name="password" id="password" class="form-control" tabindex="1" placeholder="登录密码">
					<span class="input-group-btn">
					<button tabindex="2" type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>
					</span>
                </div>
                <!-- /input-group -->
                <div class="relogin">
                    <a href="{:U('User/Public/login')}">使用其它账号登录</a>
                </div>
            </form>
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
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('static') }}/metronic/global/plugins/backstretch/jquery.backstretch.min.js"
        type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{ asset('static') }}/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- <script src="{{ asset('static') }}/metronic/admin/pages/scripts/lock.js"></script> -->
<script>
    jQuery(document).ready(function () {
        Metronic.setAssetsPath("{{ asset('static') }}/metronic/");//设置模板文件根路径
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        // Lock.init();
        Demo.init();
        $("#password").focus();

        $.backstretch([
            "{{ asset('static') }}/metronic/admin/pages/media/bg/1.jpg",
            "{{ asset('static') }}/metronic/admin/pages/media/bg/2.jpg",
            "{{ asset('static') }}/metronic/admin/pages/media/bg/3.jpg",
            "{{ asset('static') }}/metronic/admin/pages/media/bg/4.jpg"
            ], {
              fade: 1000,
              duration: 8000
        });
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>