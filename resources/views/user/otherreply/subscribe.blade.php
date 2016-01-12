@extends('user.public.baseindex')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('static') }}/metronic/global/plugins/select2/select2.css" />
@stop
@section('main')
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-comment"></i> 关注时回复的内容
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal validate" role="form" method="post" action="__SELF__">
            <div class="row">
                <div class="form-body col-md-12">
                    <div class="form-group">
                        <label class="col-md-2 control-label">回复形式</label>
                        <div class="col-md-9">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="is_news" value="0" checked> 文本回复 </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_news" value="1" <eq name="info.is_news" value="1">checked</eq>> 图文回复 </label>
                            </div>
                        </div>
                    </div>
                    <div id="content" class="form-group <notempty name="info.is_news">display-hide</notempty>">
                        <label class="col-md-2 control-label">回复内容</label>
                        <div class="col-md-9">
                            <textarea name="content" id="" cols="30" rows="5" class="form-control">{$info.content}</textarea>
                            <span class="help-block">最多填写255个字</span>
                        </div>
                    </div>
                    <div id="keyword" class="form-group <empty name="info.is_news">display-hide</empty>">
                        <label class="col-md-2 control-label">图文关键词</label>
                        <div class="col-md-9">
                            <select name="keyword" class="form-control input-small select2me" data-placeholder="选择关键词">
                              <foreach name="keyword_list" item="item">
                              <option value="{$item}" <eq name="info.keyword" value="$item">selected</eq>>{$item}</option>
                              </foreach>
                            </select>
                            <span class="help-block">例：选择"会员",新用户关注后将回复引导用户注册会员的消息</span>
                        </div>
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
<script type="text/javascript" src="{{ asset('static') }}/metronic/global/plugins/select2/select2.min.js"></script>
<script>
    $(function(){
        $("input[name='is_news']").click(function(event) {
            var val = $(this).val();
            if(val==1){
                $('div#keyword').removeClass('display-hide');
                $('div#content').addClass('display-hide');
            }else{
                $('div#content').removeClass('display-hide');
                $('div#keyword').addClass('display-hide');
            }
        });

        //表单验证
        $('form').validate({
            errorElement: 'span', 
            errorClass: 'error',
            focusInvalid: true,
            rules: {
                content: {
                    required: true,
                    maxlength: 255
                }
            },

            messages: {
                name: {
                    required: "请填写回复内容"
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