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
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('static') }}/metronic/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('static') }}/metronic/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('css') }}/user/custom.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

        @yield('style')

        @yield('pre_js')
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{ user_url('/') }}">
                        <img src="{{ asset('images') }}/user/logo_purple.png" alt="logo" class="logo-default" height="25" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- END NOTIFICATION DROPDOWN -->
                            <li class="separator hide"> </li>

                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> {{ auth()->user()->name }} </span>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                    <!-- <img alt="" class="img-circle" src="{{ asset('images') }}/user/defaultavatar.png" /> </a> -->
                                    <img alt="" class="img-circle" src="{{ asset('') . auth()->user()->avatar }}" /> </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{ user_url('profile/userinfo') }}">
                                            <i class="icon-user"></i> 个人信息 </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="{{ user_url('lock/') }}">
                                            <i class="icon-lock"></i> 锁屏 </a>
                                    </li>
                                    <li>
                                        <a href="{{ user_url('logout/') }}">
                                            <i class="icon-key"></i> 退出 </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true"
                        data-slide-speed="200">
                        <li class="nav-item start ">
                            <a href="{{ user_url('/') }}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">用户中心</span>
                                <!-- <span class="arrow"></span> -->
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">基础设置</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="{{ user_url('menu/') }}" class="nav-link ">
                                        <span class="title">自定义菜单</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-speech"></i>
                                <span class="title">自动回复</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="{{ user_url('reply-text') }}" class="nav-link ">
                                        <span class="title">文本回复</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{ user_url('reply-news') }}" class="nav-link ">
                                        <span class="title">图文回复</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{ user_url('reply-subscribe') }}" class="nav-link ">
                                        <span class="title">关注回复</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{ user_url('reply-default') }}" class="nav-link ">
                                        <span class="title">默认回复</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">粉丝管理</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="{{ user_url('fans/') }}" class="nav-link ">
                                        <span class="title">粉丝列表</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{ user_url('fan-group/') }}" class="nav-link ">
                                        <span class="title">粉丝分组</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-speech"></i>
                                <span class="title">高级群发</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="{{ user_url('broadcast/text') }}" class="nav-link ">
                                        <span class="title">文本群发</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{ user_url('broadcast/text') }}" class="nav-link ">
                                        <span class="title">图文群发</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">统计数据</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="{{ user_url('stats/') }}" class="nav-link ">
                                        <span class="title">粉丝增减</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-frame"></i>
                                <span class="title">二维码</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="{{ user_url('qrcode/forever') }}" class="nav-link ">
                                        <span class="title">永久二维码</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{ user_url('qrcode/temporary') }}" class="nav-link ">
                                        <span class="title">临时二维码</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{ user_url('qrcode/card') }}" class="nav-link ">
                                        <span class="title">卡券二维码</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    @yield('main')
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2016 &copy; WillChat by Tianyong90.
                <a href="https://github.com/tianyong90/willchat" title="" target="_blank">View on GitHub.</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
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
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('static') }}/metronic/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('static') }}/layer/layer.js"></script>
        <script src="{{ asset('js') }}/user/base.js"></script>

        <script>
            jQuery(document).ready(function () {
                Base.initNormalPage(); //常规页面中菜单高亮等操作初始

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document)
                    .ajaxStart(function() {
                        document.loaderIndex = layer.load();
                    })
                    .ajaxStop(function() {
                        layer.close(document.loaderIndex);
                    });

                //上传文件对话框
                $('.btn-uploadfile').on('click', function () {
                    var triggerItem=$(this); //触发弹出层的元素
                    var data=triggerItem.data();
                    top.dialog({
                        id: 'dialog-uplpadfile',
                        title: '上传文件',
                        fixed:true,
                        quickClose: true,
                        padding: 10,
                        data: data,
                        zIndex: 99999,
                        url: "{:U('User/Dialog/uploadfile',array('token'=>$token))}",
                        okValue: '确定',
                        cancelValue: '取消',
                        ok: function() {
                            if (this.data.filepath) {
                                var picControl=triggerItem.parents('.pic-control');
                                //更新输入框值
                                picControl.find("input.pic-path").val(this.data.filepath);
                                //更新预览图片
                                picControl.find("img").attr("src", "__ROOT__"+this.data.filepath);
                            };
                            this.close().remove();
                        },
                        cancel: function() {
                        }
                    })
                    .show();
                    return false;
                });

                //弹出编辑框
                $('.dialog-popup').on('click', function () {
                    var triggerItem = $(this); //触发弹出层的元素
                    var data = triggerItem.data();
                    var url = $(this).attr('href');
                    var area = ['500px', '350px'];
                    //不同尺寸弹出窗
                    if($(this).hasClass('dialog-large')){
                        area = ['750px', '500px'];
                    }else if($(this).hasClass('dialog-mediun')){
                        area = ['500px', '350px'];
                    }else if($(this).hasClass('dialog-small')){
                        area = ['350px', '200px'];
                    }

                    layer.open({
                        title: ' ',
                        type: 2,
                        shift: 2,
                        fixed: true,
                        area: area,
                        shadeClose: false, //开启遮罩关闭
                        content: url
                    });
                    return false;
                });
            });
        </script>
        @yield('js')
    </body>
</html>