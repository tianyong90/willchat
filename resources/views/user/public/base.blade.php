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
  <title></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta content="" name="description"/>
  <meta content="tianyong90" name="author"/>
  {{--CSRF-TOKEN--}}
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="{{ asset('static') }}/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
        type="text/css"/>
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link href="{{ asset('static') }}/metronic/global/css/components.css" id="style_components" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/css/plugins.css" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('static') }}/metronic/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('static') }}/metronic/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css') }}/user/custom.css" rel="stylesheet" type="text/css"/>
  <style>
    .page-content {
      background-color: #e7e7e7;
    }
  </style>
  @yield('style')
      <!-- END THEME STYLES -->
  <link rel="shortcut icon" href="/favicon.ico"/>

  @yield('pre_script')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
@include('user.public.header')
    <!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  @include('user.public.sidebar')
      <!-- END SIDEBAR -->
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN STYLE CUSTOMIZER -->
      @include('user.public.stylecustomizer')
          <!-- END STYLE CUSTOMIZER -->
      <!-- BEGIN PAGE CONTENT-->
      <div class="col-md-12">
        @yield('main')
            <!-- 主体内容 -->
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
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/jquery.cookies.2.2.0.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="{{ asset('static') }}/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js"
        type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('static') }}/layer/layer.js"></script>
<script src="{{ asset('js/user') }}/base.js"></script>
<script>
  jQuery(document).ready(function () {
    Metronic.setAssetsPath("{{ asset('static') }}/metronic/");//设置模板文件根路径
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    // Base.initNormalPage(); //常规页面中菜单高亮等操作初始

    //点击锁屏时保存当前页面地址以便解锁时跳转
    $('a#lockscreen').click(function (event) {
      event.preventDefault();
//            //保存锁屏前的页面URL至cookie
//            $.cookie(Think.COOKIE_PREFIX+'redirect_url',document.URL,{expir:1,path:'/'});
//            var lockUrl = Think.U('User/Public/lockscreen');
      location.href = lockUrl;
    });

    //上传文件对话框
    $('.btn-uploadfile').on('click', function () {
      var triggerItem = $(this); //触发弹出层的元素
      var data = triggerItem.data();
      top.dialog({
            id: 'dialog-uplpadfile',
            title: '上传文件',
            fixed: true,
            quickClose: true,
            padding: 10,
            data: data,
            zIndex: 99999,
            url: "{:U('User/Dialog/uploadfile',array('token'=>$token))}",
            okValue: '确定',
            cancelValue: '取消',
            ok: function () {
              if (this.data.filepath) {
                var picControl = triggerItem.parents('.pic-control');
                //更新输入框值
                picControl.find("input.pic-path").val(this.data.filepath);
                //更新预览图片
                picControl.find("img").attr("src", "__ROOT__" + this.data.filepath);
              }
              ;
              this.close().remove();
            },
            cancel: function () {
            }
          })
          .show();
      return false;
    });

    //选择图片文件对话框
    $('.btn-selectfile').on('click', function () {
      //按钮上的参数
      var triggerItem = $(this); //触发弹出层的元素
      var data = triggerItem.data();
      top.dialog({
            id: 'dialog-selectfile',
            title: '选择文件',
            fixed: true,
            quickClose: true,
            padding: 10,
            data: data,
            zIndex: 99999,
            url: "{:U('User/Dialog/selectfile',array('token'=>$token))}",
            okValue: '确定',
            cancelValue: '取消',
            ok: function () {
              //如果选定了文件
              if (this.data.filepath) {
                var picControl = triggerItem.parents('.pic-control');
                //更新输入框值
                picControl.find("input.pic-path").val(this.data.filepath);
                //更新预览图片
                picControl.find("img").attr("src", "__ROOT__" + this.data.filepath);
              }
              ;
              this.close().remove();
            },
            cancel: function () {
            }
          })
          .show();
      return false;
    });

    //重置图片
    $('.btn-resetfile').on('click', function () {
      var picControl = $(this).parents('.pic-control');
      //更新输入框值
      picControl.find("input.pic-path").val("");
      //更新预览图片
      picControl.find("img").attr("src", "__ROOT__/Public/User/images/no_picture.gif");
    });

    //弹出编辑框
    $('.dialog-popup').on('click', function () {
      var triggerItem = $(this); //触发弹出层的元素
      var data = triggerItem.data();
      var url = $(this).attr('href');

      layer.open({
        type: 2,
        title: ' ',
        shadeClose: false,
        shade: [0.75, '#000'],
        area: 'auto',
        content: url
      });
      return false;
    });


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document)
        .ajaxStart(function () {
          window.loadingLayerIndex = layer.load();
        })
        .ajaxStop(function () {
          layer.close(loadingLayerIndex);
        });

  });
</script>
<!-- END JAVASCRIPTS -->
@yield('script')
</body>
<!-- END BODY -->
</html>
