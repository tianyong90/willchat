<extend name="Public/dcontentbase" />
<block name="content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="dialog-content form">
        <form class="validate" action="__SELF__" method="post">
            <div class="form-body">
                <div class="form-group">
                    <label>关键词</label>
                    <input type="text" name="keyword" value="{$info.keyword}" class="form-control" placeholder="">
                    <span class="help-block"></span>
                </div>
                <div class="form-group" id="url-section">
                    <label>回复内容</label>
                    <textarea name="content" id="" cols="30" rows="5" class="form-control">{$info.content}</textarea>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>排序</label>
                    <input type="text" name="sort" value="{$info.sort}" class="form-control" placeholder="">
                    <span class="help-block">值越大越靠前</span>
                </div>
                <div class="form-group">
                    <label>启用状态</label>
                    <div class="radio-list">
                        <label class="radio-inline">
                        <input type="radio" name="status" value="1" checked> 正常 </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0" <eq name="info.status" value="0">checked</eq>> 禁用
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <input type="hidden" name="id" value="{$info.id}"/>
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
                    keyword: {
                        required: true,
                        rangelength: [1,20]
                    },
                    content: {
                        required: true,
                        rangelength: [1,500]
                    }
                },
                messages: {
                    keyword: {
                        required: "请输入关键词"
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
                    console.log('validated');
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