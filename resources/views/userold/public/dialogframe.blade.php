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
  <meta content="" name="author"/>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="{{ asset('static') }}/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
        type="text/css"/>
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link href="{{ asset('static') }}/metronic/global/css/components.css" id="style_components" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/global/css/plugins.css" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css') }}/user/custom.css" rel="stylesheet" type="text/css"/>
  <!-- END THEME STYLES -->

  @yield('style')
</head>
<body>
@yield('content')
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
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
<!-- <script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> -->
<!-- END CORE PLUGINS -->
<script src="{{ asset('static') }}/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js"
        type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('static') }}/layer-v2.0/layer/layer.js"></script>
<script src="{{ asset('js') }}/user/base.js"></script>
<script>
  jQuery(document).ready(function () {
    Metronic.init(); // init metronic core components
    Base.initDialogPage(); //dialog弹窗中页面中一些操作初始化

    var currentDialog = top.dialog.getCurrent();
    var title = "{$meta_title}" || " ";
    currentDialog.title(title);

    $('button.btn-closedialog').click(function (event) {
      currentDialog.close().remove();
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
            url: "{{ user_url('/') }}",
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
            url: "{{ user_url('/') }}",
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

    //选择功能链接
    $('.btn-selectlink').on('click', function () {
      var triggerItem = $(this);  //触发弹出层的元素
      var data = triggerItem.data();  //按钮上的参数
      top.dialog({
            id: 'dialog-selectlink',
            title: '选择功能链接',
            fixed: true,
            quickClose: true,
            padding: 10,
            data: data,
            zIndex: 99999,
            url: "{{ user_url('/') }}",
            okValue: '确定',
            cancelValue: '取消',
            ok: function () {
              if (this.data.url) {
                var inputItem = triggerItem.parents('.input-group').find('input');
                //更新输入框值
                inputItem.val(this.data.url);
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

    //弹出编辑框
    $('.dialog-popup').on('click', function () {
      var triggerItem = $(this); //触发弹出层的元素
      var data = triggerItem.data();
      var url = $(this).attr('href');
      top.dialog({
            id: 'popup-dialog',
            title: ' ',
            fixed: true,
            data: data,
            quickClose: false,
            zIndex: 99999,
            url: url
          })
          .show();
      return false;
    });
  });
</script>
@yield('script')
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>