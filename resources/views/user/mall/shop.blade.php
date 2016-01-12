@extends('user.public.baseindex')
@section('main')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-info"></i> 店铺设置
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post" action="__SELF__">
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">店铺名称</label>
                        <div class="col-md-9">
                            <input name="name" type="text" class="form-control" value="{$info.name}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">招牌图片</label>
                        {:W('User/piccontrol',array('shop_sign_path',$info['shop_sign_path'],'shop_sign'))}
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">店铺简介</label>
                        <div class="col-md-9">
                            <textarea class="editor" id="introduction" name="introduction" rows="5">{$info.introduction}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">版权信息</label>
                        <div class="col-md-9">
                            <input name="copyright" type="text" class="form-control" value="{$info.copyright}">
                            <span class="help-block">如：某某公司版权所有</span>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="hidden" name="id" value="{$info.id}">
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
<script type="text/javascript" charset="utf-8" src="{{ asset('static') }}/ueditor/ueditor-front.config.js"></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('static') }}/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="{{ asset('static') }}/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="{{ asset('static') }}/jquery-validation-1.14.0/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/jquery-validation-1.14.0/dist/localization/messages_zh.min.js" type="text/javascript"></script>
<script>
    var editors=$('textarea.editor');
    $.each(editors, function(index, val) {
        UE.getEditor($(val).attr('id'));
    });

    $(function(){
        //表单验证
        $('form').validate({
            errorElement: 'span', 
            errorClass: 'error',
            focusInvalid: true,
            rules: {
                name: {
                    required: true,
                    rangelength: [2,25]
                }

            },

            messages: {
                name: {
                    required: "请输入店铺名称"
                }
            },

            onfocusout: function(element){
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
                if(element.parents(".input-group").length>0){
                    error.insertAfter(element.closest('.input-group'));
                }else{
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                var formData=$(form).serialize();
                var url=$(form).attr('action');
                $.post(url, formData, function(data, textStatus, xhr) {
                    if (data.status) {
                        Base.success(data.info);
                        if (data.url) {
                            setTimeout(function(){top.location.href=data.url}, 2000)
                        }else{
                            setTimeout(function(){top.location.reload();}, 2000)
                        }
                    } else {
                        Base.error(data.info);
                    }
                },'json');
            }
        });
    })
</script>
@stop