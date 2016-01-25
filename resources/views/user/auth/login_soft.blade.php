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
    <title>欢迎登录用户中心</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('static') }}/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('static') }}/metronic/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{ asset('static') }}/metronic/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{ asset('static') }}/metronic/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <!-- <img src="{{ asset('static') }}/metronic/admin/layout/img/logo-big.png" alt=""/> -->
        <img src="__IMG__/logo-big.png" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{:U('User/Public/login')}" method="post">
        <h3 class="form-title">登录个人中心</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
			<span id="tips">
			请输入用户名和密码！</span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">用户名</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="请输入用户名" name="username" tabindex="1"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">密码</label>

            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="请输入密码" name="password" tabindex="2"/>
            </div>
        </div>
        <div class="form-actions">
            <!-- <label class="checkbox"><input type="checkbox" name="remember" value="1" tabindex="3"/> 记住我 </label> -->
            <button type="submit" class="btn blue pull-right" tabindex="4">
                登录 <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
        <div class="forget-password">
            <!-- <h4>忘记密码了？</h4> -->
            <!-- <p>
                忘记密码了？<a href="javascript:;" id="forget-password">点此找回</a>
            </p> -->
        </div>
        <div class="create-account">
          <!--   <p>
                还没有账号？&nbsp; <a href="javascript:;" id="register-btn">
                立即免费注册</a>
            </p> -->
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="{:U('User/Public/sendmail')}" method="post">
        <h3>忘记密码？</h3>
        <p>
            输入账户关联的邮箱找回密码
        </p>
        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                       name="email" id="email"/>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn">
                <i class="m-icon-swapleft"></i> 返回
            </button>
            <button type="submit" class="btn blue pull-right">
                提交 <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->
    <form class="register-form" action="{:U('User/Public/register')}" method="post">
        <h3>注 册</h3>
        <p>
            填写注册信息（必填）:
        </p>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">用户名</label>

            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="输入用户名"
                       name="username" id="username-reg"/>
            </div>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>

            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">密码</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="输入密码" name="password"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">确认密码</label>
            <div class="controls">
                <div class="input-icon">
                    <i class="fa fa-check"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="再次输入密码" name="repassword"/>
                </div>
            </div>
        </div>
        <p>
            填写个人信息（选填）:
        </p>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">实名</label>

            <div class="input-icon">
                <i class="fa fa-font"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="请输入您的真实姓名" name="truename"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">QQ</label>

            <div class="input-icon">
                <i class="fa fa-check"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="QQ号码" name="qq"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">电话</label>
            <div class="input-icon">
                <i class="fa fa-location-arrow"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="请输入电话号码" name="tel"/>
            </div>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="tnc"/> 我已阅读并同意 <a href="#protocol" data-toggle="modal"> 用户协议 </a>
            </label>

            <div id="register_tnc_error">
            </div>
        </div>
        <div class="form-actions">
            <button id="register-back-btn" type="button" class="btn">
                <i class="m-icon-swapleft"></i> 返回
            </button>
            <button type="submit" id="register-submit-btn" class="btn blue pull-right">
                注册 <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    2016 &copy; WillChat. Preducted by <a href="https://github.com/tianyong90">tianyong90</a>
</div>
<!-- END COPYRIGHT -->
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
<script src="{{ asset('static') }}/jquery.cookies.2.2.0.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('static') }}/metronic/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('static') }}/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
<!-- <script src="{{ asset('static') }}/metronic/admin/layout/scripts/demo.js" type="text/javascript"></script> -->
<script src="{{ asset('static') }}/jquery.form.min.js" type="text/javascript"></script>
<script src="__JS__/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();

        // Demo.init();
        // init background slide images
        $.backstretch([
                "{{ asset('static') }}/metronic/admin/pages/media/bg/1.jpg",
                "{{ asset('static') }}/metronic/admin/pages/media/bg/2.jpg",
                "{{ asset('static') }}/metronic/admin/pages/media/bg/3.jpg",
                "{{ asset('static') }}/metronic/admin/pages/media/bg/4.jpg"
            ], {
                fade: 1000,
                duration: 6000
            }
        );
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>