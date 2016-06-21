<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
  <!-- Force latest IE rendering engine or ChromeFrame if installed -->
  <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <meta charset="utf-8">
  <title>上传文件</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap styles -->
  <link rel="stylesheet" href="{{ vendor('metronic/global/plugins/bootstrap/css/bootstrap.min.css') }}">
  <!-- Generic page styles -->
  <link href="{{ vendor('metronic/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}"
        rel="stylesheet"/>
  <link href="{{ vendor('metronic/global/plugins/jquery-file-upload/css/jquery.fileupload.css') }}"
        rel="stylesheet"/>
  <link href="{{ vendor('metronic/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}"
        rel="stylesheet"/>
</head>
<body style="width:450px;height:300px;overflow:auto;">
<div class="container">
  <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>添加文件</span>
      <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files">
    </span>
  <br>
  <br>
  <!-- The global progress bar -->
  <div id="progress" class="progress">
    <div class="progress-bar progress-bar-success"></div>
  </div>
  <!-- The container for the uploaded files -->
  <div id="files" class="files"></div>
  <br>
  <blockquote style="font-size:12px;line-height:0.5em;">
    <p>文件大小应在 <strong>5 MB</strong> 以内</p>

    <p>仅支持 (<strong>JPG, GIF, PNG</strong>) 格式文件</p>
  </blockquote>
</div>
<script type="text/javascript">
  //ThinkPHP对象，包含项目部分基础配置信息
  (function () {
    var ThinkPHP = window.Think = {
      "ROOT": "__ROOT__", //当前网站地址
      "APP": "__APP__", //当前项目地址
      "PUBLIC": "__PUBLIC__", //项目公共目录地址
      "DEEP": "{:C('URL_PATHINFO_DEPR')}", //PATHINFO分割符
      "MODEL": ["{:C('URL_MODEL')}", "{:C('URL_CASE_INSENSITIVE')}", "{:C('URL_HTML_SUFFIX')}"],
      "VAR": ["{:C('VAR_MODULE')}", "{:C('VAR_CONTROLLER')}", "{:C('VAR_ACTION')}"],
      "COOKIE_PREFIX": "{:C('COOKIE_PREFIX')}"
    };
  })();
</script>
<script src="{{ vendor('metronic/global/plugins/jquery.min.js') }}"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="{{ vendor('metronic/global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{{ vendor('metronic/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js') }}"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="{{ vendor('JavaScript-Load-Image/js/load-image.all.min.js') }}"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="{{ vendor('metronic/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js') }}"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{{ vendor('metronic/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js') }}"></script>
<!-- The basic File Upload plugin -->
<script src="{{ vendor('metronic/global/plugins/jquery-file-upload/js/jquery.fileupload.js') }}"></script>
<!-- The File Upload processing plugin -->
<script src="{{ vendor('metronic/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js') }}"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="{{ vendor('metronic/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js') }}"></script>
<!-- The File Upload audio preview plugin -->
<script src="{{ vendor('metronic/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js') }}"></script>
<!-- The File Upload video preview plugin -->
<script src="{{ vendor('metronic/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js') }}"></script>
<!-- The File Upload validation plugin -->
<script
    src="{{ vendor('metronic/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js') }}"></script>
<script src="{{ vendor('think.js') }}"></script>
<!-- The main application script -->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="{{ vendor('metronic/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js') }}"></script>
<![endif]-->

<script>
  /*jslint unparam: true, regexp: true */
  /*global window, $ */
  $(function () {
    'use strict';

    var currentDialog = top.dialog.getCurrent();
    //顶层对话框传来的数据
    var param = currentDialog.data;

    var url = Think.U('User/File/wechatUploadImage', 'token=' + '{$Think.get.token}');
    var uploadButton = $('<button/>')
        .addClass('btn btn-primary')
        .prop('disabled', true)
        .text('上传中……')
        .on('click', function () {
          var $this = $(this),
              data = $this.data();
          $this
              .off('click')
              .text('取消')
              .on('click', function () {
                $this.remove();
                data.abort();
              });
          data.submit().always(function () {
            $this.remove();
          });
        });

    $('#fileupload').fileupload({
      url: url,
      dataType: 'json',
      autoUpload: false,
      acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
      maxFileSize: 5000000, // 5 MB
      // Enable image resizing, except for Android and Opera,
      // which actually support image resizing, but fail to
      // send Blob objects via XHR requests:
      disableImageResize: /Android(?!.*Chrome)|Opera/
          .test(window.navigator.userAgent),
      // previewMaxWidth: 100,
      previewMaxHeight: 100,
      previewCrop: true
    }).on('fileuploadadd', function (e, data) {
      data.context = $('<div/>').appendTo('#files');
      $.each(data.files, function (index, file) {
        var node = $('<p/>')
            .append($('<span/>').text(file.name));
        if (!index) {
          node
              .append('<br>')
              .append(uploadButton.clone(true).data(data));
        }
        node.appendTo(data.context);
      });
    }).on('fileuploadprocessalways', function (e, data) {
      var index = data.index,
          file = data.files[index],
          node = $(data.context.children()[index]);
      if (file.preview) {
        node
            .prepend('<br>')
            .prepend(file.preview);
      }
      if (file.error) {
        node
            .append('<br>')
            .append($('<span class="text-danger"/>').text(file.error));
      }
      if (index + 1 === data.files.length) {
        data.context.find('button')
            .text('上传')
            .prop('disabled', !!data.files.error);
      }
    }).on('fileuploadprogressall', function (e, data) {
      var progress = parseInt(data.loaded / data.total * 100, 10);
      $('#progress .progress-bar').css(
          'width',
          progress + '%'
      );
    }).on('fileuploaddone', function (e, data) {
      if (data.result.status) {
        var link = $('<a>')
            .attr('target', '_blank')
            .prop('href', data.result.fileurl);
        $(data.context.children()[0])
            .wrap(link);

        //上传文件保存到对话框data中以便调用
        currentDialog.data.filepath = (data.result.fileurl);
      } else {
        var error = $('<span class="text-danger"/>').text(data.result.info);
        $(data.context.children()[0])
            .append('<br>')
            .append(error);
      }
      ;
    }).on('fileuploadfail', function (e, data) {
      $.each(data.files, function (index) {
        var error = $('<span class="text-danger"/>').text('上传失败');
        $(data.context.children()[index])
            .append('<br>')
            .append(error);
      });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
  });
</script>
</body>
</html>