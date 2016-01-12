@extends('user.public.baseindex')
@section('main')
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-info"></i> 商家信息设置
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal validate" role="form" method="post" action="__SELF__">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-2 control-label">名称</label>
                    <div class="col-md-9">
                        <input name="name" type="text" class="form-control" value="{$info.name}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">简称</label>
                    <div class="col-md-9">
                        <input name="shortname" type="text" class="form-control"
                        value="{$info.shortname}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">电话</label>
                    <div class="col-md-9">
                        <input name="telephone" type="text" class="form-control" value="{$info.telephone}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">手机</label>
                    <div class="col-md-9">
                        <input name="mobile" type="text" class="form-control" value="{$info.mobile}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">电子邮箱</label>
                    <div class="col-md-9">
                        <input name="email" type="text" class="form-control" value="{$info.email}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">传真</label>
                    <div class="col-md-9">
                        <input name="fax" type="text" class="form-control" value="{$info.fax}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">地址</label>
                    <div class="col-md-9">
                        <input name="address" type="text" class="form-control" value="{$info.address}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">LOGO</label>
                    <div class="col-md-9">
                        {:W('User/piccontrol',array('logo_path',$info['logo_path'],'logo'))}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">商家简介</label>
                    <div class="col-md-9">
                        <textarea class="editor" id="intro" name="intro" rows="5">{$info.intro}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <input type="hidden" name="id" value="{$info.id}" >
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
                },
                telephone: {
                    rangelength: [2,25]
                },
                mobile: {
                    required: true,
                    rangelength: [6,40]
                },
                address: {
                    required: true,
                    maxlength: 50
                },
                logourl: {
                    required: true
                }

            },

            messages: {
                name: {
                    required: "请输入公司名称"
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