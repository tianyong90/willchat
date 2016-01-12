@extends('user.public.baseindex')
@section('main')
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-info"></i>回复设置
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal validate" method="post" action="__SELF__" role="form">
            <div class="form-body">
                <input type="hidden" name="id1" value="{$info_member.id}" />
                <div class="form-group">
                    <label class="col-md-2 control-label">会员回复标题</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="title1" value="{$info_member.title}" placeholder="">
                        <span class="help-block">
                        会员回复会员卡的时候出现的图文标题</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">会员内容介绍</label>
                    <div class="col-md-9">
                        <textarea name="description1" class="form-control" rows="3">{$info_member.description}</textarea>
                        <span class="help-block">
                        最多填写120个字,会员回复会员卡的时候出现的图文回复介绍</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">会员回复图片</label>
                    <div class="col-md-9">
                        {:W('User/piccontrol',array('picurl1',$info_member['picurl'],'focus'))}
                        <span class="help-block"></span>
                    </div>
                </div>
                <hr />
                <input type="hidden" name="id2" value="{$info_notmember.id}" />
                <div class="form-group">
                    <label class="col-md-2 control-label">非会员回复标题</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="title2" value="{$info_notmember.title}" placeholder="">
                        <span class="help-block">
                        非会员回复会员卡的时候出现的图文标题</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">非会员内容介绍</label>
                    <div class="col-md-9">
                        <textarea name="description2" class="form-control" rows="3">{$info_notmember.description}</textarea>
                        <span class="help-block">
                        最多填写120个字,非会员回复会员卡的时候出现的图文回复介绍</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">非会员回复图片</label>
                    <div class="col-md-9">
                        {:W('User/piccontrol',array('picurl2',$info_notmember['picurl'],'focus'))}
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
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
                title1: {
                    required: true,
                    maxlength: 30
                },
                description1: {
                    required: true,
                    maxlength: 120
                },
                title2: {
                    required: true,
                    maxlength: 30
                },
                description2: {
                    required: true,
                    maxlength: 120
                }
            },

            messages: {
                title1: {
                    required: "请填写回复标题"
                },
                description1: {
                    required: "请填写描述信息"
                },
                title2: {
                    required: "请填写回复标题"
                },
                description2: {
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