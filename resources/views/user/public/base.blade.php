<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-CN">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.useso.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('static') }}/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('static') }}/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('static') }}/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('static') }}/metronic/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('static') }}/metronic/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('static') }}/metronic/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('static') }}/metronic/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('static') }}/metronic/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    @yield('style')

    @yield('pre_js')

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="{{ asset('static') }}/metronic/layouts/layout4/img/logo-light.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
                <div class="page-actions">
                    <div class="btn-group">
                        <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="hidden-sm hidden-xs">Actions&nbsp;</span>
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-docs"></i> New Post </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-tag"></i> New Comment </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-share"></i> Share </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-flag"></i> Comments
                                    <span class="badge badge-success">4</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-users"></i> Feedbacks
                                    <span class="badge badge-danger">2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <form class="search-form" action="page_general_search_2.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"> </li>
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-success"> 7 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">12 pending</span> notifications</h3>
                                        <a href="page_user_profile_1.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">just now</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> New user registered. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">3 mins</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Server #12 overloaded. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">10 mins</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Server #2 not responding. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">14 hrs</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> Application error. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">2 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Database overloaded 68%. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">3 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> A user IP blocked. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">4 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Storage Server #4 not responding dfdfdfd. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">5 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> System Error. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">9 days</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Storage server failed. </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                            <li class="separator hide"> </li>
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    <span class="badge badge-danger"> 4 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>You have
                                            <span class="bold">7 New</span> Messages</h3>
                                        <a href="app_inbox.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="{{ asset('static') }}/metronic/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">Just Now </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="{{ asset('static') }}/metronic/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">16 mins </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="{{ asset('static') }}/metronic/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Bob Nilson </span>
                                                        <span class="time">2 hrs </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="{{ asset('static') }}/metronic/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">40 mins </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="{{ asset('static') }}/metronic/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">46 mins </span>
                                                    </span>
                                                    <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <li class="separator hide"> </li>
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-calendar"></i>
                                    <span class="badge badge-primary"> 3 </span>
                                </a>
                                <ul class="dropdown-menu extended tasks">
                                    <li class="external">
                                        <h3>You have
                                            <span class="bold">12 pending</span> tasks</h3>
                                        <a href="?p=page_todo_2">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New release v1.2 </span>
                                                        <span class="percent">30%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Application deployment</span>
                                                        <span class="percent">65%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">65% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile app release</span>
                                                        <span class="percent">98%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">98% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Database migration</span>
                                                        <span class="percent">10%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">10% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Web server upgrade</span>
                                                        <span class="percent">58%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">58% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile development</span>
                                                        <span class="percent">85%</span>
                                                    </span>
                                                    <span class="progress">
                                                        <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">85% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New UI release</span>
                                                        <span class="percent">38%</span>
                                                    </span>
                                                    <span class="progress progress-striped">
                                                        <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">38% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> Nick </span>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                    <img alt="" class="img-circle" src="{{ asset('static') }}/metronic/layouts/layout4/img/avatar9.jpg" /> </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="page_user_profile_1.html">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="app_calendar.html">
                                            <i class="icon-calendar"></i> My Calendar </a>
                                    </li>
                                    <li>
                                        <a href="app_inbox.html">
                                            <i class="icon-envelope-open"></i> My Inbox
                                            <span class="badge badge-danger"> 3 </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_todo_2.html">
                                            <i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="page_user_lock_1.html">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    </li>
                                    <li>
                                        <a href="page_user_login_1.html">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout"></i>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
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
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="index.html" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Dashboard 1</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="dashboard_2.html" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">Dashboard 2</span>
                                        <span class="badge badge-success">1</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="dashboard_3.html" class="nav-link ">
                                        <i class="icon-graph"></i>
                                        <span class="title">Dashboard 3</span>
                                        <span class="badge badge-danger">5</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Features</h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">UI Features</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="ui_colors.html" class="nav-link ">
                                        <span class="title">Color Library</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_general.html" class="nav-link ">
                                        <span class="title">General Components</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_buttons.html" class="nav-link ">
                                        <span class="title">Buttons</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_confirmations.html" class="nav-link ">
                                        <span class="title">Popover Confirmations</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_icons.html" class="nav-link ">
                                        <span class="title">Font Icons</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_socicons.html" class="nav-link ">
                                        <span class="title">Social Icons</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_typography.html" class="nav-link ">
                                        <span class="title">Typography</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_tabs_accordions_navs.html" class="nav-link ">
                                        <span class="title">Tabs, Accordions & Navs</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_timeline.html" class="nav-link ">
                                        <span class="title">Timeline</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_tree.html" class="nav-link ">
                                        <span class="title">Tree View</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Page Progress Bar</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="ui_page_progress_style_1.html" class="nav-link "> Flash </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="ui_page_progress_style_2.html" class="nav-link "> Big Counter </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_blockui.html" class="nav-link ">
                                        <span class="title">Block UI</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_bootstrap_growl.html" class="nav-link ">
                                        <span class="title">Bootstrap Growl Notifications</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_notific8.html" class="nav-link ">
                                        <span class="title">Notific8 Notifications</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_toastr.html" class="nav-link ">
                                        <span class="title">Toastr Notifications</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_bootbox.html" class="nav-link ">
                                        <span class="title">Bootbox Dialogs</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_alerts_api.html" class="nav-link ">
                                        <span class="title">Metronic Alerts API</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_session_timeout.html" class="nav-link ">
                                        <span class="title">Session Timeout</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_idle_timeout.html" class="nav-link ">
                                        <span class="title">User Idle Timeout</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_modals.html" class="nav-link ">
                                        <span class="title">Modals</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_extended_modals.html" class="nav-link ">
                                        <span class="title">Extended Modals</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_tiles.html" class="nav-link ">
                                        <span class="title">Tiles</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_datepaginator.html" class="nav-link ">
                                        <span class="title">Date Paginator</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ui_nestable.html" class="nav-link ">
                                        <span class="title">Nestable List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Components</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Date & Time Pickers</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Color Pickers</span>
                                        <span class="badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_select2.html" class="nav-link ">
                                        <span class="title">Select2 Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_multi_select.html" class="nav-link ">
                                        <span class="title">Multi Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select_splitter.html" class="nav-link ">
                                        <span class="title">Select Splitter</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_typeahead.html" class="nav-link ">
                                        <span class="title">Typeahead Autocomplete</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_tagsinput.html" class="nav-link ">
                                        <span class="title">Bootstrap Tagsinput</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_switch.html" class="nav-link ">
                                        <span class="title">Bootstrap Switch</span>
                                        <span class="badge badge-success">6</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_maxlength.html" class="nav-link ">
                                        <span class="title">Bootstrap Maxlength</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_fileinput.html" class="nav-link ">
                                        <span class="title">Bootstrap File Input</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_touchspin.html" class="nav-link ">
                                        <span class="title">Bootstrap Touchspin</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_form_tools.html" class="nav-link ">
                                        <span class="title">Form Widgets & Tools</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_context_menu.html" class="nav-link ">
                                        <span class="title">Context Menu</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_editors.html" class="nav-link ">
                                        <span class="title">Markdown & WYSIWYG Editors</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_code_editors.html" class="nav-link ">
                                        <span class="title">Code Editors</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_ion_sliders.html" class="nav-link ">
                                        <span class="title">Ion Range Sliders</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_noui_sliders.html" class="nav-link ">
                                        <span class="title">NoUI Range Sliders</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_knob_dials.html" class="nav-link ">
                                        <span class="title">Knob Circle Dials</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Form Stuff</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="form_controls.html" class="nav-link ">
                                        <span class="title">Bootstrap Form
                                            <br>Controls</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_controls_md.html" class="nav-link ">
                                        <span class="title">Material Design
                                            <br>Form Controls</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_validation.html" class="nav-link ">
                                        <span class="title">Form Validation</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_validation_states_md.html" class="nav-link ">
                                        <span class="title">Material Design
                                            <br>Form Validation States</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_validation_md.html" class="nav-link ">
                                        <span class="title">Material Design
                                            <br>Form Validation</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_layouts.html" class="nav-link ">
                                        <span class="title">Form Layouts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_input_mask.html" class="nav-link ">
                                        <span class="title">Form Input Mask</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_editable.html" class="nav-link ">
                                        <span class="title">Form X-editable</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_wizard.html" class="nav-link ">
                                        <span class="title">Form Wizard</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_icheck.html" class="nav-link ">
                                        <span class="title">iCheck Controls</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_image_crop.html" class="nav-link ">
                                        <span class="title">Image Cropping</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_fileupload.html" class="nav-link ">
                                        <span class="title">Multiple File Upload</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="form_dropzone.html" class="nav-link ">
                                        <span class="title">Dropzone File Upload</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">Elements</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="elements_steps.html" class="nav-link ">
                                        <span class="title">Steps</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="elements_lists.html" class="nav-link ">
                                        <span class="title">Lists</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="elements_ribbons.html" class="nav-link ">
                                        <span class="title">Ribbons</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-briefcase"></i>
                                <span class="title">Tables</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Static Tables</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="table_static_basic.html" class="nav-link "> Basic Tables </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_static_responsive.html" class="nav-link "> Responsive Tables </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_bootstrap_master.html" class="nav-link "> Bootstrap Table </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Datatables</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="table_datatables_managed.html" class="nav-link "> Managed Datatables </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_buttons.html" class="nav-link "> Buttons Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_colreorder.html" class="nav-link "> Colreorder Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_rowreorder.html" class="nav-link "> Rowreorder Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_scroller.html" class="nav-link "> Scroller Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_fixedheader.html" class="nav-link "> FixedHeader Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_responsive.html" class="nav-link "> Responsive Extension </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_editable.html" class="nav-link "> Editable Datatables </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="table_datatables_ajax.html" class="nav-link "> Ajax Datatables </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="?p=" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Portlets</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="portlet_boxed.html" class="nav-link ">
                                        <span class="title">Boxed Portlets</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="portlet_light.html" class="nav-link ">
                                        <span class="title">Light Portlets</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="portlet_solid.html" class="nav-link ">
                                        <span class="title">Solid Portlets</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="portlet_ajax.html" class="nav-link ">
                                        <span class="title">Ajax Portlets</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="portlet_draggable.html" class="nav-link ">
                                        <span class="title">Draggable Portlets</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Charts</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="charts_amcharts.html" class="nav-link ">
                                        <span class="title">amChart</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="charts_flotcharts.html" class="nav-link ">
                                        <span class="title">Flot Charts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="charts_flowchart.html" class="nav-link ">
                                        <span class="title">Flow Charts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="charts_google.html" class="nav-link ">
                                        <span class="title">Google Charts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="charts_echarts.html" class="nav-link ">
                                        <span class="title">eCharts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="charts_morris.html" class="nav-link ">
                                        <span class="title">Morris Charts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">HighCharts</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="charts_highcharts.html" class="nav-link "> HighCharts </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="charts_highstock.html" class="nav-link "> HighStock </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="charts_highmaps.html" class="nav-link "> HighMaps </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
                                <span class="title">Maps</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="maps_google.html" class="nav-link ">
                                        <span class="title">Google Maps</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="maps_vector.html" class="nav-link ">
                                        <span class="title">Vector Maps</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Layouts</h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Page Layouts</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="layout_language_bar.html" class="nav-link ">
                                        <span class="title">Header Language Bar</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_footer_fixed.html" class="nav-link ">
                                        <span class="title">Fixed Footer</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_boxed_page.html" class="nav-link ">
                                        <span class="title">Boxed Page</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-feed"></i>
                                <span class="title">Sidebar Layouts</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_menu_hover.html" class="nav-link ">
                                        <span class="title">Hover Sidebar Menu</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_reversed.html" class="nav-link ">
                                        <span class="title">Reversed Sidebar Page</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_fixed.html" class="nav-link ">
                                        <span class="title">Fixed Sidebar Layout</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="layout_sidebar_closed.html" class="nav-link ">
                                        <span class="title">Closed Sidebar Layout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class=" icon-wrench"></i>
                                <span class="title">Custom Layouts</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="layout_disabled_menu.html" class="nav-link ">
                                        <span class="title">Disabled Menu Links</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Pages</h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-basket"></i>
                                <span class="title">eCommerce</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="ecommerce_index.html" class="nav-link ">
                                        <i class="icon-home"></i>
                                        <span class="title">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ecommerce_orders.html" class="nav-link ">
                                        <i class="icon-basket"></i>
                                        <span class="title">Orders</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ecommerce_orders_view.html" class="nav-link ">
                                        <i class="icon-tag"></i>
                                        <span class="title">Order View</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ecommerce_products.html" class="nav-link ">
                                        <i class="icon-graph"></i>
                                        <span class="title">Products</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="ecommerce_products_edit.html" class="nav-link ">
                                        <i class="icon-graph"></i>
                                        <span class="title">Product Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-docs"></i>
                                <span class="title">Apps</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="app_todo.html" class="nav-link ">
                                        <i class="icon-clock"></i>
                                        <span class="title">Todo 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="app_todo_2.html" class="nav-link ">
                                        <i class="icon-check"></i>
                                        <span class="title">Todo 2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="app_inbox.html" class="nav-link ">
                                        <i class="icon-envelope"></i>
                                        <span class="title">Inbox</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="app_calendar.html" class="nav-link ">
                                        <i class="icon-calendar"></i>
                                        <span class="title">Calendar</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="app_ticket.html" class="nav-link ">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Support</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">User</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="page_user_profile_1.html" class="nav-link ">
                                        <i class="icon-user"></i>
                                        <span class="title">Profile 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_user_profile_1_account.html" class="nav-link ">
                                        <i class="icon-user-female"></i>
                                        <span class="title">Profile 1 Account</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_user_profile_1_help.html" class="nav-link ">
                                        <i class="icon-user-following"></i>
                                        <span class="title">Profile 1 Help</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_user_profile_2.html" class="nav-link ">
                                        <i class="icon-users"></i>
                                        <span class="title">Profile 2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Login</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="page_user_login_1.html" class="nav-link " target="_blank"> Login Page 1 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_user_login_2.html" class="nav-link " target="_blank"> Login Page 2 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_user_login_3.html" class="nav-link " target="_blank"> Login Page 3 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_user_login_4.html" class="nav-link " target="_blank"> Login Page 4 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_user_login_5.html" class="nav-link " target="_blank"> Login Page 5 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_user_login_6.html" class="nav-link " target="_blank"> Login Page 6 </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_user_lock_1.html" class="nav-link " target="_blank">
                                        <i class="icon-lock"></i>
                                        <span class="title">Lock Screen 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_user_lock_2.html" class="nav-link " target="_blank">
                                        <i class="icon-lock-open"></i>
                                        <span class="title">Lock Screen 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-social-dribbble"></i>
                                <span class="title">General</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="page_general_about.html" class="nav-link ">
                                        <i class="icon-info"></i>
                                        <span class="title">About</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_contact.html" class="nav-link ">
                                        <i class="icon-call-end"></i>
                                        <span class="title">Contact</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Portfolio</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="page_general_portfolio_1.html" class="nav-link "> Portfolio 1 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_portfolio_2.html" class="nav-link "> Portfolio 2 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_portfolio_3.html" class="nav-link "> Portfolio 3 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_portfolio_4.html" class="nav-link "> Portfolio 4 </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-magnifier"></i>
                                        <span class="title">Search</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="page_general_search.html" class="nav-link "> Search 1 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_search_2.html" class="nav-link "> Search 2 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_search_3.html" class="nav-link "> Search 3 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_search_4.html" class="nav-link "> Search 4 </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="page_general_search_5.html" class="nav-link "> Search 5 </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_pricing.html" class="nav-link ">
                                        <i class="icon-tag"></i>
                                        <span class="title">Pricing</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_faq.html" class="nav-link ">
                                        <i class="icon-wrench"></i>
                                        <span class="title">FAQ</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_blog.html" class="nav-link ">
                                        <i class="icon-pencil"></i>
                                        <span class="title">Blog</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_blog_post.html" class="nav-link ">
                                        <i class="icon-note"></i>
                                        <span class="title">Blog Post</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_invoice.html" class="nav-link ">
                                        <i class="icon-envelope"></i>
                                        <span class="title">Invoice</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_general_invoice_2.html" class="nav-link ">
                                        <i class="icon-envelope"></i>
                                        <span class="title">Invoice 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">System</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="page_system_coming_soon.html" class="nav-link " target="_blank">
                                        <span class="title">Coming Soon</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_404_1.html" class="nav-link ">
                                        <span class="title">404 Page 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_404_2.html" class="nav-link " target="_blank">
                                        <span class="title">404 Page 2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_404_3.html" class="nav-link " target="_blank">
                                        <span class="title">404 Page 3</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_500_1.html" class="nav-link ">
                                        <span class="title">500 Page 1</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="page_system_500_2.html" class="nav-link " target="_blank">
                                        <span class="title">500 Page 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-folder"></i>
                                <span class="title">Multi Level Menu</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-settings"></i> Item 1
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="?p=dashboard-2" target="_blank" class="nav-link">
                                                <i class="icon-user"></i> Arrow Toggle
                                                <span class="arrow nav-toggle"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="icon-power"></i> Sample Link 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="icon-paper-plane"></i> Sample Link 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="icon-star"></i> Sample Link 1</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-camera"></i> Sample Link 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-link"></i> Sample Link 2</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-pointer"></i> Sample Link 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="?p=dashboard-2" target="_blank" class="nav-link">
                                        <i class="icon-globe"></i> Arrow Toggle
                                        <span class="arrow nav-toggle"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-tag"></i> Sample Link 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-pencil"></i> Sample Link 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="icon-graph"></i> Sample Link 1</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-bar-chart"></i> Item 3 </a>
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
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Blank Page Layout
                                <small>blank page layout</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height green" data-placement="top" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div>
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-settings"></i>
                                </a>
                                <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <h3>THEME</h3>
                                            <ul class="theme-colors">
                                                <li class="theme-color theme-color-default" data-theme="default">
                                                    <span class="theme-color-view"></span>
                                                    <span class="theme-color-name">Dark Header</span>
                                                </li>
                                                <li class="theme-color theme-color-light active" data-theme="light">
                                                    <span class="theme-color-view"></span>
                                                    <span class="theme-color-name">Light Header</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12 seperator">
                                            <h3>LAYOUT</h3>
                                            <ul class="theme-settings">
                                                <li> Theme Style
                                                    <select class="layout-style-option form-control input-small input-sm">
                                                        <option value="square">Square corners</option>
                                                        <option value="rounded" selected="selected">Rounded corners</option>
                                                    </select>
                                                </li>
                                                <li> Layout
                                                    <select class="layout-option form-control input-small input-sm">
                                                        <option value="fluid" selected="selected">Fluid</option>
                                                        <option value="boxed">Boxed</option>
                                                    </select>
                                                </li>
                                                <li> Header
                                                    <select class="page-header-option form-control input-small input-sm">
                                                        <option value="fixed" selected="selected">Fixed</option>
                                                        <option value="default">Default</option>
                                                    </select>
                                                </li>
                                                <li> Top Dropdowns
                                                    <select class="page-header-top-dropdown-style-option form-control input-small input-sm">
                                                        <option value="light">Light</option>
                                                        <option value="dark" selected="selected">Dark</option>
                                                    </select>
                                                </li>
                                                <li> Sidebar Mode
                                                    <select class="sidebar-option form-control input-small input-sm">
                                                        <option value="fixed">Fixed</option>
                                                        <option value="default" selected="selected">Default</option>
                                                    </select>
                                                </li>
                                                <li> Sidebar Menu
                                                    <select class="sidebar-menu-option form-control input-small input-sm">
                                                        <option value="accordion" selected="selected">Accordion</option>
                                                        <option value="hover">Hover</option>
                                                    </select>
                                                </li>
                                                <li> Sidebar Position
                                                    <select class="sidebar-pos-option form-control input-small input-sm">
                                                        <option value="left" selected="selected">Left</option>
                                                        <option value="right">Right</option>
                                                    </select>
                                                </li>
                                                <li> Footer
                                                    <select class="page-footer-option form-control input-small input-sm">
                                                        <option value="fixed">Fixed</option>
                                                        <option value="default" selected="selected">Default</option>
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END THEME PANEL -->
                        </div>
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Blank Page</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="note note-info">
                        <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        @include('user.public.footer')
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
        <script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('static') }}/metronic/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('static') }}/metronic/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="{{ asset('static') }}/metronic/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        @yield('js')
    </body>
</html>