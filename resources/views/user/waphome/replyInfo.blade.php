@extends('user.public.baseindex')
@section('main')
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-info"></i>回复设置
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal validate" method="post" action="" role="form">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-2 control-label">回复标题</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="title" value="{$info.title}" placeholder="">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">内容介绍</label>
                    <div class="col-md-9">
                        <textarea name="description" class="form-control" rows="3">{$info.description}</textarea>
                        <span class="help-block">最多填写120个字</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">封面图片</label>
                    {:W('User/piccontrol',array('picurl',$info['picurl'],'focus'))}
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <input type="hidden" name="id" value="{$info.id}" />
                        <button type="submit" class="btn green">确定</button>
                        <button type="button" class="btn default">取消</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
@section('script')
<script src="{{ asset('static') }}/jquery-validation-1.14.0/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/jquery-validation-1.14.0/dist/localization/messages_zh.min.js" type="text/javascript"></script>
<script>
    $(function(){
        //表单验证
        $('form').validate({
            errorElement: 'span', 
            errorClass: 'error',
            focusInvalid: true,
            rules: {
                title: {
                    required: true,
                    maxlength: 30
                },
                description: {
                    required: true,
                    maxlength: 120
                },
                picurl: {
                    required: true
                }
            },

            messages: {
                title: {
                    required: "请填写回复标题"
                },
                description: {
                    required: "请填写描述信息"
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