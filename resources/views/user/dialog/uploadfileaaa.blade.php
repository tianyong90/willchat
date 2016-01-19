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
  <link rel="stylesheet" href="{{ asset('static') }}/metronic/global/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Generic page styles -->

  <link href="{{ asset('static') }}/cropper-master/dist/cropper.min.css" rel="stylesheet">
  <link href="{{ asset('static') }}/cropper-master/examples/crop-avatar/css/main.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body style="width:800px;overflow:auto;" id="crop-avatar">
<form class="avatar-form" action="{{ user_url('/') }}" enctype="multipart/form-data" method="post">
  <div class="avatar-body">
    <!-- Upload image and data -->
    <div class="avatar-upload">
      <input class="avatar-src" name="avatar_src" type="hidden">
      <input class="avatar-data" name="avatar_data" type="hidden">
      <label for="avatarInput">选择图片</label>
      <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
    </div>

    <!-- Crop and preview -->
    <div class="row">
      <div class="col-sm-9">
        <div class="avatar-wrapper"></div>
      </div>
      <div class="col-sm-3">
        <div class="avatar-preview preview-lg"></div>
        <div class="avatar-preview preview-md"></div>
        <div class="avatar-preview preview-sm"></div>
      </div>
    </div>

    <div class="row avatar-btns">
      <div class="col-sm-9">
        <div class="btn-group">
          <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button"
                  title="Rotate -90 degrees">向左旋转
          </button>
          <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15度</button>
          <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30度</button>
          <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45度</button>
        </div>
        <div class="btn-group">
          <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">
            向右旋转
          </button>
          <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15度</button>
          <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30度</button>
          <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45度</button>
        </div>
      </div>
      <div class="col-sm-3">
        <button class="btn btn-primary btn-block avatar-save" type="submit">确定</button>
      </div>
    </div>
  </div>
</form>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="{{ asset('static') }}/metronic/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('static') }}/cropper-master/dist/cropper.min.js"></script>

<script type="text/javascript" charset="utf-8">
  (function (factory) {
    if (typeof define === 'function' && define.amd) {
      define(['jquery'], factory);
    } else if (typeof exports === 'object') {
      // Node / CommonJS
      factory(require('jquery'));
    } else {
      factory(jQuery);
    }
  })

  (function ($) {

    'use strict';

    var currentDialog = top.dialog.getCurrent();
    //顶层对话框传来的数据
    var param = currentDialog.data;

    //上传的类型，默认为幻灯片
    var type = param.type || 'focus';

    var console = window.console || {
          log: function () {
          }
        };

    function CropAvatar($element) {
      this.$container = $element;

      this.$loading = $('.loading');

      this.$avatarForm = $('.avatar-form');
      this.$avatarUpload = this.$avatarForm.find('.avatar-upload');
      this.$avatarSrc = this.$avatarForm.find('.avatar-src');
      this.$avatarData = this.$avatarForm.find('.avatar-data');
      this.$avatarInput = this.$avatarForm.find('.avatar-input');
      this.$avatarSave = this.$avatarForm.find('.avatar-save');
      this.$avatarBtns = this.$avatarForm.find('.avatar-btns');

      this.$avatarWrapper = $('.avatar-wrapper');
      this.$avatarPreview = $('.avatar-preview');

      this.init();
    }

    CropAvatar.prototype = {
      constructor: CropAvatar,

      support: {
        fileList: !!$('<input type="file">').prop('files'),
        blobURLs: !!window.URL && URL.createObjectURL,
        formData: !!window.FormData
      },

      init: function () {
        this.support.datauri = this.support.fileList && this.support.blobURLs;

        if (!this.support.formData) {
          this.initIframe();
        }

        this.addListener();
      },

      addListener: function () {
        this.$avatarInput.on('change', $.proxy(this.change, this));
        this.$avatarForm.on('submit', $.proxy(this.submit, this));
        this.$avatarBtns.on('click', $.proxy(this.rotate, this));
      },

      initPreview: function () {
        var url = this.$avatar.attr('src');

        this.$avatarPreview.html('<img src="' + url + '">');
      },

      initIframe: function () {
        var target = 'upload-iframe-' + (new Date()).getTime(),
            $iframe = $('<iframe>').attr({
              name: target,
              src: ''
            }),
            _this = this;

        // Ready ifrmae
        $iframe.one('load', function () {

          // respond response
          $iframe.on('load', function () {
            var data;

            try {
              data = $(this).contents().find('body').text();
            } catch (e) {
              console.log(e.message);
            }

            if (data) {
              try {
                data = $.parseJSON(data);
              } catch (e) {
                console.log(e.message);
              }

              _this.submitDone(data);
            } else {
              _this.submitFail('Image upload failed!');
            }

            _this.submitEnd();

          });
        });

        this.$iframe = $iframe;
        this.$avatarForm.attr('target', target).after($iframe.hide());
      },

      change: function () {
        var files,
            file;

        if (this.support.datauri) {
          files = this.$avatarInput.prop('files');

          if (files.length > 0) {
            file = files[0];

            if (this.isImageFile(file)) {
              if (this.url) {
                URL.revokeObjectURL(this.url); // Revoke the old one
              }
              this.url = URL.createObjectURL(file);
              this.startCropper();
            }
          }
        } else {
          file = this.$avatarInput.val();
          if (this.isImageFile(file)) {
            this.syncUpload();
          }
        }
      },

      submit: function () {
        if (!this.$avatarSrc.val() && !this.$avatarInput.val()) {
          return false;
        }

        if (this.support.formData) {
          this.ajaxUpload();
          return false;
        }
      },

      rotate: function (e) {
        var data;

        if (this.active) {
          data = $(e.target).data();

          if (data.method) {
            this.$img.cropper(data.method, data.option);
          }
        }
      },

      isImageFile: function (file) {
        if (file.type) {
          return /^image\/\w+$/.test(file.type);
        } else {
          return /\.(jpg|jpeg|png|gif)$/.test(file);
        }
      },

      startCropper: function () {
        var _this = this;

        if (this.active) {
          this.$img.cropper('replace', this.url);
        } else {
          this.$img = $('<img src="' + this.url + '">');
          this.$avatarWrapper.empty().html(this.$img);
          this.$img.cropper({
            // aspectRatio: 1,
            preview: this.$avatarPreview.selector,
            strict: true,
            crop: function (data) {
              var json = [
                '{"x":' + data.x,
                '"y":' + data.y,
                '"height":' + data.height,
                '"width":' + data.width,
                '"rotate":' + data.rotate + '}'
              ].join();

              _this.$avatarData.val(json);
            }
          });

          this.active = true;
        }

        this.$avatarModal.one('hidden.bs.modal', function () {
          _this.$avatarPreview.empty();
          _this.stopCropper();
        });
      },

      stopCropper: function () {
        if (this.active) {
          this.$img.cropper('destroy');
          this.$img.remove();
          this.active = false;
        }
      },

      ajaxUpload: function () {
        var url = this.$avatarForm.attr('action'),
            data = new FormData(this.$avatarForm[0]),
            _this = this;

        $.ajax(url, {
          type: 'post',
          data: data,
          dataType: 'json',
          processData: false,
          contentType: false,

          beforeSend: function () {
            _this.submitStart();
          },

          success: function (data) {
            _this.submitDone(data);
          },

          error: function (XMLHttpRequest, textStatus, errorThrown) {
            _this.submitFail(textStatus || errorThrown);
          },

          complete: function () {
            _this.submitEnd();
          }
        });
      },

      syncUpload: function () {
        this.$avatarSave.click();
      },

      submitStart: function () {
        this.$loading.fadeIn();
      },

      submitDone: function (data) {
        console.log(data);

        if ($.isPlainObject(data) && data.state === 200) {
          if (data.result) {
            this.url = data.result;

            if (this.support.datauri || this.uploaded) {
              this.uploaded = false;
              this.cropDone();
            } else {
              this.uploaded = true;
              this.$avatarSrc.val(this.url);
              this.startCropper();
            }

            this.$avatarInput.val('');
          } else if (data.message) {
            this.alert(data.message);
          }
        } else {
          this.alert('Failed to response');
        }
      },

      submitFail: function (msg) {
        this.alert(msg);
      },

      submitEnd: function () {
        this.$loading.fadeOut();
      },

      cropDone: function () {
        this.$avatarForm.get(0).reset();
        // this.$avatar.attr('src', this.url);
        this.stopCropper();
      },

      alert: function (msg) {
        var $alert = [
          '<div class="alert alert-danger avatar-alert alert-dismissable">',
          '<button type="button" class="close" data-dismiss="alert">&times;</button>',
          msg,
          '</div>'
        ].join('');

        this.$avatarUpload.after($alert);
      }
    };

    $(function () {
      return new CropAvatar($('#crop-avatar'));
    });

  });
</script>
</body>
</html>