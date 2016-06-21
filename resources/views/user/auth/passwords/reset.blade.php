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
    <title>找回密码</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.useso.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"  type="text/css"/>
    <link href="{{ vendor('metronic/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ vendor('metronic/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ vendor('metronic/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ vendor('metronic/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ vendor('metronic/global/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ vendor('metronic/admin/pages/css/login-soft.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{ vendor('metronic/global/css/components.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{ vendor('metronic/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ vendor('metronic/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{ vendor('metronic/admin/layout/css/themes/darkblue.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ vendor('metronic/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="/">
        <img src="{{ vendor('metronic/admin/layout/img/logo-big.png') }}" alt=""/>
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
    <form class="login-form" action="" method="post">
        <h3 class="form-title">重置您的登录密码</h3>

        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
			<span>
			请输入新密码</span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">新密码</label>

            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="请输入新密码"
                       name="password" tabindex="1" id="password"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">确认密码</label>

            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="请再次输入密码"
                       name="repassword" tabindex="2"/>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn blue pull-right" tabindex="4">
                提交 <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END LOGIN FORM -->
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
<script src="{{ vendor('metronic/global/plugins/respond.min.js') }}"></script>
<script src="{{ vendor('metronic/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
<script src="{{ vendor('metronic/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ vendor('metronic/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ vendor('metronic/global/plugins/bootstrap/js/bootstrap.min.js') }}"
        type="text/javascript"></script>
<script src="{{ vendor('metronic/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ vendor('metronic/global/plugins/uniform/jquery.uniform.min.js') }}"
        type="text/javascript"></script>
<script src="{{ vendor('metronic/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ vendor('metronic/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"
        type="text/javascript"></script>
<script src="{{ vendor('metronic/global/plugins/backstretch/jquery.backstretch.min.js') }}"
        type="text/javascript"></script>
<script type="text/javascript" src="{{ vendor('metronic/global/plugins/select2/select2.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ vendor('metronic/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ vendor('metronic/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<!-- <script src="{{ vendor('metronic/admin/layout/scripts/demo.js') }}" type="text/javascript"></script> -->
<script src="{{ vendor('metronic/admin/pages/scripts/login-soft.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        // Login.init();

        // init background slide images
        $.backstretch([
                    "{{ vendor('metronic/admin/pages/media/bg/1.jpg') }}",
                    "{{ vendor('metronic/admin/pages/media/bg/2.jpg') }}",
                    "{{ vendor('metronic/admin/pages/media/bg/3.jpg') }}",
                    "{{ vendor('metronic/admin/pages/media/bg/4.jpg') }}"
                ], {
                    fade: 1000,
                    duration: 4000
                }
        );

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 25
                },
                repassword: {
                    required: true,
                    minlength: 6,
                    maxlength: 25,
                    equalTo: "#password"
                }
            },

            messages: {
                password: {
                    required: "密码必须填写."
                },
                repassword: {
                    required: "请再次输入密码以确认.",
                    equalTo: "两次输入密码不一致"
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function (form) {
                form.submit();
            }
        });

        $('.login-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit();
                }
                return false;
            }
        });
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>