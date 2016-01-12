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
    <title>{$meta_title|default="用户中心"}</title>
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
    <!-- BEGIN THEME STYLES -->
    <link href="{{ asset('static') }}/metronic/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('static') }}/metronic/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{ asset('static') }}/metronic/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
   <link href="__CSS__/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('static') }}/artDialog6/css/ui-dialog.css" />
    <style>
        .page-content {
            background-color: #e7e7e7;
        }
    </style>
    @section('style')
        <!-- 加载其它样式表 -->
    @stop
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="__PUBLIC__/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- 根据参数fullwidth决定是否水平全宽显示 -->
<body class="page-header-fixed page-quick-sidebar-over-content <notempty name='fullwidth'>page-full-width</notempty>">
<!-- BEGIN HEADER -->
@include('user.public.header')
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    @section('sidebar')
        @include('user.public.sidebar')
    @stop
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN STYLE CUSTOMIZER -->
            @include('user.public.stylecustomizer')
            <!-- END STYLE CUSTOMIZER -->
            <!-- BEGIN PAGE HEADER-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @yield('main')
                        <!-- 主体内容 -->
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
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/jquery.cookies.2.2.0.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- <script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> -->
<!-- END CORE PLUGINS -->
<script src="{{ asset('static') }}/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/admin/layout/scripts/demo.js" type="text/javascript"></script>

<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('static') }}/layer/layer.js"></script>
<script src="{{ asset('js/user') }}/base.js"></script>

<script>
    jQuery(document).ready(function () {
        Metronic.setAssetsPath("{{ asset('static') }}/metronic/");//设置模板文件根路径
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        Base.initNormalPage(); //常规页面中菜单高亮等操作初始

        //点击锁屏时保存当前页面地址以便解锁时跳转
        $('a#lockscreen').click(function(event) {
            event.preventDefault();
//            console.log(document.URL);
//            //保存锁屏前的页面URL至COOLIE
//            $.cookie(Think.COOKIE_PREFIX+'redirect_url',document.URL,{expir:1,path:'/'});
//            var lockUrl = Think.U('User/Public/lockscreen');
            location.href=lockUrl;
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

        //选择图片文件对话框
        $('.btn-selectfile').on('click', function () {
            //按钮上的参数
            var triggerItem=$(this); //触发弹出层的元素
            var data=triggerItem.data();
            top.dialog({
                id: 'dialog-selectfile',
                title: '选择文件',
                fixed:true,
                quickClose: true,
                padding: 10,
                data: data,
                zIndex: 99999,
                url: "{:U('User/Dialog/selectfile',array('token'=>$token))}",
                okValue: '确定',
                cancelValue: '取消',
                ok: function() {
                    //如果选定了文件
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

        //重置图片
        $('.btn-resetfile').on('click', function () {
            var picControl=$(this).parents('.pic-control');
            //更新输入框值
            picControl.find("input.pic-path").val("");
            //更新预览图片
            picControl.find("img").attr("src", "__ROOT__/Public/User/images/no_picture.gif");
        });

        //弹出编辑框

    });
</script>
<!-- END JAVASCRIPTS -->
@section('script')
    <!-- 加载其它脚本 -->
@stop
</body>
<!-- END BODY -->
</html>
