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
    <title>用户中心</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    {{--CSRF-TOKEN--}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('static') }}/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{ asset('static') }}/metronic/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{ asset('static') }}/metronic/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css') }}/user/custom.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
    @yield('style')
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="__PUBLIC__/favicon.ico"/>
    @yield('pre_script')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content page-full-width">
<!-- BEGIN HEADER -->
@include('user.public.header')
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN STYLE CUSTOMIZER -->
            <!-- <include file="Public/stylecustomizer"/> -->
            <!-- END STYLE CUSTOMIZER -->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img id="userAvatarId" src="{{ asset('images') }}/user/defaultavatar.png" class="img-responsive" alt="">
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">
                                    {{ $user['name'] }}
                                </div>
                                <div class="profile-usertitle-job">
                                    {{ $user['name'] }}
                                </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                           <!--  <div class="profile-userbuttons">
                                <button type="button" class="btn btn-circle green-haze btn-sm">Follow</button>
                                <button type="button" class="btn btn-circle btn-danger btn-sm">Message</button>
                            </div> -->
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul class="nav" id="nav">
                                    <li>
                                        <a href="{{ url('/user') }}">
                                            <i class="icon-home"></i>
                                            个人中心 </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('avatar') }}">
                                            <i class="icon-settings"></i>
                                            个人信息 </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('document') }}">
                                            <i class="icon-info"></i>
                                            使用帮助 </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <div class="profile-content">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
@include('user.public.footer')
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ asset('static') }}/metronic/global/plugins/respond.min.js"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/jquery.cookies.2.2.0.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/admin/pages/scripts/profile.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('static') }}/artDialog6/dist/dialog-plus-min.js"></script>
<script type="text/javascript" src="{{ asset('static') }}/layer/layer.js"></script>
<script src="{{ asset('js') }}/user/base.js"></script>
<script>
    jQuery(document).ready(function () {
        Metronic.setAssetsPath("{{ asset('static') }}/metronic/");//设置模板文件根路径
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features

        Base.initNormalPage();

        //点击锁屏时保存当前页面地址以便解锁时跳转
        $('a#lockscreen').click(function(event) {
            event.preventDefault();
        });

        //弹出编辑框
        $('.dialog-popup').on('click', function () {
            var triggerItem=$(this); //触发弹出层的元素
            var data=triggerItem.data();
            var url=$(this).attr('href');

            layer.open({
                type: 2,
                title: ' ',
                shadeClose: false,
                shade: [0.75, '#000'],
                area: ['600px', '70%'],
                content: url
            });
            return false;
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document)
        .ajaxStart(function(){
            window.loadingLayerIndex = layer.load();
        })
        .ajaxStop(function(){
            layer.close(loadingLayerIndex);
        });

</script>
<!-- END JAVASCRIPTS -->
@yield('script')
</body>
<!-- END BODY -->
</html>
