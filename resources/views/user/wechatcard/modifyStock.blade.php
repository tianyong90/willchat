@extends('user.public.base')
@section('style')
  <style>
    .dialog-content {
      width: 400px;
    }
  </style>
@stop
@section('main')
  <div class="dialog-content form">
    <form class="validate" action="__SELF__" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>调整方式</label>

          <div class="radio-list">
            <label class="radio-inline">
              <input type="radio" name="type" value="increase" checked> 增加库存 </label>
            <label class="radio-inline">
              <input type="radio" name="type" value="reduce"> 减少库存 </label>
          </div>
        </div>
        <div class="form-group">
          <label>调整量</label>
          <input type="text" name="amount" class="form-control" placeholder="">
          <span class="help-block">填写库存调整量，必须为正整数</span>
        </div>
      </div>
      <div class="form-actions">
        <input type="hidden" name="card_id" value="{$card_id}"/>
        <button type="submit" class="btn btn-primary">确定</button>
        <button type="button" class="btn btn-danger btn-closedialog">取消</button>
      </div>
    </form>
  </div>
  @stop
  @section('js')
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
            amount: {
              required: true,
              min: 1
            }
          },

          messages: {
            amount: {
              required: "请输入库存调整量",
              min: "调整量必须库正数"
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