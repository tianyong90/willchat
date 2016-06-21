<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-CN">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>{{ $title or 'WillChat' }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="WillChat" />
        <meta content="" name="tianyong90" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{ vendor('metronic/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ vendor('metronic/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ vendor('metronic/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ vendor('metronic/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ vendor('metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ vendor('metronic/global/css/components-md.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ vendor('metronic/global/css/plugins-md.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ vendor('metronic/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ vendor('metronic/layouts/layout4/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ vendor('metronic/layouts/layout4/css/themes/light.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ css('user/custom.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

        @yield('style')

        @yield('pre_js')
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-full-width">
        <!-- BEGIN HEADER -->
        @include('user.layouts.pageheader')
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet bordered">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                        <img src="{!! get_user_avatar(auth()->user()->id) !!}" class="img-responsive" alt=""> </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> {{ auth()->user()->name }} </div>
                                        <div class="profile-usertitle-job"> Developer </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR BUTTONS -->
                                    <div class="profile-userbuttons">
                                        <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                        <button type="button" class="btn btn-circle red btn-sm">Message</button>
                                    </div>
                                    <!-- END SIDEBAR BUTTONS -->
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li class="active">
                                                <a href="{{ user_url('/') }}">
                                                    <i class="icon-home"></i> 用户中心 </a>
                                            </li>
                                            <li>
                                                <a href="{{ user_url('profile/userinfo') }}">
                                                    <i class="icon-settings"></i> 账户信息 </a>
                                            </li>
                                            <li>
                                                <a href="{{ user_url('document/index/guide') }}">
                                                    <i class="icon-info"></i> 帮助文档 </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END MENU -->
                                </div>
                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                @yield('main')
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        @include('user.layouts.pagefooter')
        <!-- END FOOTER -->
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
        <script src="{{ vendor('metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
        <script src="{{ vendor('metronic/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ vendor('metronic/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ vendor('metronic/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ vendor('metronic/layouts/layout4/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ vendor('metronic/layouts/layout4/scripts/demo.min.js') }}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <script src="{{ vendor('metronic/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>
        <script src="{{ vendor('layer/layer.js') }}"></script>
        <script src="{{ js('user/base.js') }}"></script>

        <script>
            jQuery(document).ready(function () {
                Base.initNormalPage(); //常规页面中菜单高亮等操作初始

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                function highligntSidemenu(index) {
                    var navItem = $('.profile-usermenu .nav');
                    navItem.children('li').eq(index).addClass('active').siblings().removeClass('active');
                }
                (function(){
                    var pathname = window.location.pathname;

                    if(pathname.match(/user\/(profile|avatar)/)) {
                        console.log(1);
                        highligntSidemenu(1);
                    } else if(pathname.match(/user\/document/)) {
                        console.log(2);
                        highligntSidemenu(2);
                    } else {
                        console.log(0);
                        highligntSidemenu(0);
                    }
                })();
            });
        </script>
        @yield('js')
    </body>
</html>