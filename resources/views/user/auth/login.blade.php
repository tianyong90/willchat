@extends('app')
{{--设置标题--}}
@section('title') WillChat @stop
@section('description') WillChat 开源项目演示 @stop

@section('content')
    <body class=" login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="{{ user_url('/') }}">
            <img src="{{ asset('images') }}/user/logo.png" style="height: 25px;" alt="" />
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{ user_url('login') }}" method="post">
            <div class="form-title">
                <span class="form-title">本站仅用于功能演示，请勿用于商业公众号运营。</span>
            </div>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> 请输入密码 </span>
            </div>

            {!! csrf_field() !!}

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">用户名</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="用户名" name="name" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">登录密码</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="登录密码" name="password" /> </div>
            <div class="form-actions">
                <button type="submit" class="btn red btn-block uppercase">登录</button>
            </div>
            <div class="form-actions">
                <div class="pull-left">
                    <label class="rememberme check">
                        <input type="checkbox" name="remember" value="1" >记住我</label>
                </div>
                <div class="pull-right forget-password-block">
                    <a href="javascript:;" id="forget-password" class="forget-password">忘记密码了 ?</a>
                </div>
            </div>
            <div class="create-account">
                <p>
                    <a href="javascript:;" class="btn-primary btn" id="register-btn">注册新账户</a>
                </p>
            </div>
        </form>
        <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" action="index.html" method="post">
            <div class="form-title">
                <span class="form-title">忘记密码了 ?</span>
                <span class="form-subtitle">输入您注册时填写的邮箱</span>
            </div>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn btn-default">返回</button>
                <button type="submit" class="btn btn-primary uppercase pull-right">提  交</button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->
        <!-- BEGIN REGISTRATION FORM -->
        <form class="register-form" action="{{ user_url('register') }}" method="post">
            <div class="form-title">
                <span class="form-title">注册</span>
            </div>
            {!! csrf_field() !!}
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">用户名</label>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="用户名" name="name" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">账户密码</label>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="账户密码" name="password" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">确认账户密码</label>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="确认账户密码" name="password_confirmation" /> </div>
            <div class="form-group margin-top-20 margin-bottom-20">
                <label class="check">
                    <input type="checkbox" name="tnc" />
                    <span class="loginblue-font">我同意</span>
                    <a href="javascript:;" class="loginblue-link">注册协议</a>
                </label>
                <div id="register_tnc_error"> </div>
            </div>
            <div class="form-actions">
                <button type="button" id="register-back-btn" class="btn btn-default">返回</button>
                <button type="submit" id="register-submit-btn" class="btn red uppercase pull-right">提交</button>
            </div>
        </form>
        <!-- END REGISTRATION FORM -->
    </div>
    <div class="copyright"> &copy; 2016 深圳荐货联盟网络科技有限公司 <a target="_blank" href="http://www.miitbeian.gov.cn/">粤ICP备16002610-2号</a> </div>
    <!-- END LOGIN -->
    <!--[if lt IE 9]>
    <script src="{{ vendor('metronic/global/plugins/respond.min.js') }}"></script>
    <script src="{{ vendor('metronic/global/plugins/excanvas.min.js') }}"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ vendor('metronic/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ vendor('metronic/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ vendor('metronic/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ vendor('metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
    <script src="{{ vendor('metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ vendor('metronic/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ vendor('metronic/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <script src="{{ vendor('metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ vendor('metronic/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ vendor('metronic/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ vendor('metronic/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ vendor('metronic/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ vendor('metronic/pages/scripts/login.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    </body>
@stop
