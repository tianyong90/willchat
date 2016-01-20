@extends('user.public.baseindex')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-comment"></i> 客服消息转发设置
      </div>
    </div>
    <div class="portlet-body form">
      <form class="form-horizontal validate" role="form" method="post" action="__SELF__">
        <div class="form-body">
          <div class="form-group">
            <label class="col-md-2 control-label">回复内容</label>

            <div class="col-md-9">
              <input class="form-control input-control" type="text" name="keyword" value="{$info.keyword}">
              <span class="help-block">最多填写20个字</span>
            </div>
          </div>
        </div>
        <div class="form-actions">
          <div class="row">
            <div class="col-md-offset-3 col-md-9">
              <input type="hidden" name="id" value="{$info.id}"/>
              <button type="submit" class="btn green">保存</button>
              <button type="button" class="btn default" onclick="javascript:history.go(-1);">取消</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@stop
@section('script')
  <script src="{{ asset('static') }}/jquery-validation-1.14.0/dist/jquery.validate.min.js"
          type="text/javascript"></script>
  <script src="{{ asset('static') }}/jquery-validation-1.14.0/dist/localization/messages_zh.min.js"
          type="text/javascript"></script>
  <script>
    $(function () {
      //表单验证
      $('form').validate({
        errorElement: 'span',
        errorClass: 'error',
        focusInvalid: true,
        rules: {
          keyword: {
            required: true,
            maxlength: 10
          }
        },

        messages: {
          keyword: {
            required: "请填写关键词"
          }
        },

        onfocusout: function (element) {
          $(element).valid();
        },

        highlight: function (element) {
          $(element)
              .closest('.form-group').addClass('has-error');
        },

        success: function (label) {
          label.closest('.form-group').removeClass('has-error');
          label.remove();
        },

        errorPlacement: function (error, element) {
          if (element.parents(".input-group").length > 0) {
            error.insertAfter(element.closest('.input-group'));
          } else {
            error.insertAfter(element);
          }
        },

        submitHandler: function (form) {
          var formData = $(form).serialize();
          var url = $(form).attr('action');
          $.post(url, formData, function (data, textStatus, xhr) {
            if (data.status) {
              Base.success(data.info);
              if (data.url) {
                setTimeout(function () {
                  top.location.href = data.url
                }, 2000)
              } else {
                setTimeout(function () {
                  top.location.reload();
                }, 2000)
              }
            } else {
              Base.error(data.info);
            }
          }, 'json');
        }
      });
    })
  </script>
@stop