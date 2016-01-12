<extend name="Public/dcontentbase" />
<block name="content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="dialog-content form">
        <form action="__SELF__" method="post" class="validate">
            <div class="form-body">
                <div class="form-group">
                    <label>登录账号</label>
                    <input type="text" name="kf_account" value="{$Think.get.kf_account}" class="form-control" placeholder="" <notempty name="is_edit">readonly</notempty>>
                    <span class="help-block">请填写完整客服账号，格式为：账号前缀@公众号微信号</span>
                </div>
                <div class="form-group">
                    <label>昵称</label>
                    <input type="text" name="kf_nick" value="{$Think.get.kf_nick}" class="form-control" placeholder="">
                    <span class="help-block">设置客服昵称</span>
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="text" name="kf_password" value="" class="form-control" placeholder="">
                    <span class="help-block">请输入6至25位的登录密码</span>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">保存</button>
                <button type="button" class="btn btn-danger btn-closedialog">取消</button>
            </div>
        </form>
    </div>
    <!-- END PAGE CONTENT-->
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
                kf_account: {
                    required: true
                },
                kf_nick: {
                    required: true,
                    maxlength: 12
                },
                kf_password: {
                    required: true,
                    rangelength: [6,25]
                }
            },

            messages: {
                kf_account: {
                    required: "请输入客服账号"
                },
                kf_nick: {
                    required: "请输入客服昵称"
                },
                kf_password: {
                    required: "请输入客服登录密码"
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