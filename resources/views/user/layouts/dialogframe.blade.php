<!DOCTYPE html>
<!--[if IE 8]>
<html lang="zh-CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="zh-CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-CN">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8"/>
  <title></title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta content="" name="WillChat"/>
  <meta content="" name="tianyong90"/>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="{{ asset('static') }}/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('static') }}/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN THEME GLOBAL STYLES -->
  <link href="{{ asset('static') }}/metronic/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
  <link href="{{ asset('static') }}/metronic/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
  <!-- END THEME GLOBAL STYLES -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

  @yield('style')

  @yield('pre_js')
</head>
<body>
@yield('main')
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
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script src="{{ asset('js') }}/user/base.js"></script>
<script>
  jQuery(document).ready(function () {
    Base.initDialogPage(); //dialog弹窗中页面中一些操作初始化

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

    // var currentDialog = top.dialog.getCurrent();
    // var title = "{$meta_title}" || " ";
    // currentDialog.title(title);

    // $('button.btn-closedialog').click(function (event) {
    //   currentDialog.close().remove();
    // });


  });
</script>
@yield('script')
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>