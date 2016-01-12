@extends('user.public.baseindex')
@section('main')
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-info"></i> 测试白名单设置
        </div>
    </div>
    <div class="portlet-body form">
        <div class="note note-info">
            <h4 class="block">温馨提示：</h4>
            白名单中的微信用户可领取尚未通过审核的卡券，方便卡券商家预览卡券效果及进行测试。<br />
            卡券测试白名单最多可设置10个微信号，设置时请输入正确微信号（<span class="font-red">注意与微信昵称和备注名区分开，并确保这些微信号均已关注对应的公众号，否则可能导致设置失败</span>）。<br />
            测试白名单设置为全量设置，即每次设置时需要输入全部白名单成员微信号。<br />
        </div>
        <form class="form-horizontal validate" role="form" method="post" action="__SELF__">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-2 control-label">白名单微信号列表</label>
                    <div class="col-md-9">
                        <textarea name="whitelist" id="whitelist" class="form-control" cols="5" rows="8">{$info.whitelist}</textarea>
                        <span class="help-block">输入要加入白名单的微信号，每行一个，最多10个。</span>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <input type="hidden" name="id" value="{$info.id}" />
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
                    required: "请填写要加入白名单的微信号"
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