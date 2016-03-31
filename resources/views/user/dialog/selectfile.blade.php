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
  <title>选择文件</title>
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
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link href="{{ asset('static') }}/metronic/global/css/components.css" id="style_components" rel="stylesheet"
        type="text/css"/>
  <!-- <link href="{{ asset('static') }}/metronic/global/css/plugins.css" rel="stylesheet" type="text/css"/> -->
  <!-- END THEME STYLES -->
  <link rel="stylesheet" href="{{ asset('css') }}/user/dialog.css"/>
</head>
<body>
<div class="tabbable-line" id="filetab">
  <ul class="nav nav-tabs">
    <li
    <eq name="type" value="focus">class="active"</eq>
    >
    <a href="{{ user_url('/') }}">幻灯片</a>
    </li>
    <li
    <eq name="type" value="background">class="active"</eq>
    >
    <a href="{{ user_url('/') }}">全屏背景</a>
    </li>
  </ul>
  <div class="tab-content">
    <ul class="filelist">
      <foreach name="material" item="vo">
        <li>
          <img class="{$type}" src="__ROOT__{$vo}" data-picpath="{$vo}" alt="">
        </li>
      </foreach>
    </ul>
  </div>
</div>
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
<!-- END CORE PLUGINS -->

<script src="{{ asset('static') }}/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script>
  jQuery(document).ready(function () {
    var currentDialog = top.dialog.getCurrent();
    $('ul.filelist').find('li').click(function (event) {
      $(this).addClass('active').siblings('li').removeClass('active');
      //当前圣诞框的data值，以便上层窗口调用
      currentDialog.data.filepath = $(this).children('img:first').data('picpath');
    });
  });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>