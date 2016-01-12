<extend name="Public/dcontentbase" />
<block name="content">
<!-- BEGIN PAGE CONTENT-->
<div class="dialog-content form">
    <form action="__SELF__" method="post">
        <div class="form-body">
            <div class="form-group">
                <label>模板类型</label>
                <select name="type" id="type" class="form-control">
                    <foreach name="msgtmpl_type" item="item" key="k">
                    <option value="{$k}" <eq name="info.type" value="$k">selected</eq>>{$item}</option>
                    </foreach>
                </select>
            </div>
            <div class="form-group">
                <label>模板ID</label>
                <input type="text" name="tmpl_id" value="{$info.tmpl_id}" class="form-control" placeholder="">
                <span class="help-block">请在公众平台上添加消息模板后将模板ID复制至此</span>
            </div>
            <div class="form-group">
                <label>模板内容</label>
                <textarea class="form-control" name="tmpl_content" id="tmpl_content" cols="30" rows="6">{$info.tmpl_content}</textarea>
                <span class="help-block">请在公众平台上添加消息模板后将模板内容复制至此</span>
            </div>
            <div class="form-group">
                <a href="javascript:;" id="parse-tmpl" class="btn btn-primary btn-sm">解析模板</a>
                <span class="help-block font-red">解析模板后在下方配置参数替换规则,若修改了模板内容,请重新解析</span>
                <table class="table table-striped table-hover" id="table-param">
                    <thead>
                        <tr>
                            <th>参数名</th>
                            <th>替换方式</th>
                            <th>替换内容</th>
                        </tr>
                    </thead>
                    <tbody>
                        <foreach name="info.parameter_map.pname" item="item" key="k">
                        <tr>
                            <td>{$item}<input type="hidden" name="pname[{$k}]" value="{$item}"/></td>
                            <td>
                                <select class="form-control select-ptype" name="ptype[{$k}]" data-key="{$k}">
                                    <option class="block blue" value="1" <if condition="$info['parameter_map']['ptype'][$k] eq 1">selected</if>>使用文本</option>
                                    <option class="block blue" value="2" <if condition="$info['parameter_map']['ptype'][$k] eq 2">selected</if>>使用数据字段</option>
                                    <option class="block blue" value="3" <if condition="$info['parameter_map']['ptype'][$k] eq 3">selected</if>>使用函数</option>
                                </select>
                            </td>
                            <td class="td-pcontent">
                                <if condition="$info['parameter_map']['ptype'][$k] eq 2">
                                <select name="pcontent[{$k}]" class="form-control">
                                    <volist name="fields.fieldlist" id="field">
                                    <option value="{$field.fieldname}" <if condition="$info['parameter_map']['pcontent'][$k] eq $field['fieldname']">selected</if>>{$field.fieldtitle}</option>
                                    </volist>
                                </select>
                                <elseif condition="$info['parameter_map']['ptype'][$k] eq 3"/>
                                <select name="pcontent[{$k}]" class="form-control">
                                    <option value="tmpl_time" <if condition="$info['parameter_map']['pcontent'][$k] eq 'tmpl_time'">selected</if>>当前时间</option>
                                    <option value="tmpl_date" <if condition="$info['parameter_map']['pcontent'][$k] eq 'tmpl_date'">selected</if>>当前日期</option>
                                    <option value="tmpl_date_time" <if condition="$info['parameter_map']['pcontent'][$k] eq 'tmpl_date_time'">selected</if>>当前时间和日期</option>
                                </select>
                                <else/>
                                <input class="form-control" type="text" name="pcontent[{$k}]" value="{$info['parameter_map']['pcontent'][$k]}"/>
                                </if>
                            </td>
                        </tr>
                        </foreach>
                    </tbody>
                </table>
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
<script>
    $(function() {
        //模板消息类型改变后自动重新解析模板
        $('select#type').change(function(event) {
            if($('textarea#tmpl_content').val()!==""){
                var url="{:U('parseTmpl')}";
                var postData = {
                    tmplType:$('select#type').val(),
                    id:"{$info.id}",
                    tmplContent:$('textarea#tmpl_content').val()
                };
                $.post(url, postData, function(data) {
                    if (data) {
                        //清除参数替换表格中已有的行
                        var tbodyParam=$('table#table-param>tbody');
                        tbodyParam.html('');
                        $(data).appendTo(tbodyParam);
                    }else{
                        top.Base.error('解析模板失败');
                    };
                },'html');
            }
        });

        //手动解析模板
        $('a#parse-tmpl').click(function(event) {
            if($('textarea#tmpl_content').val()!==""){
                var url="{:U('parseTmpl')}";
                var postData = {
                    tmplType:$('select#type').val(),
                    id:"{$info.id}",
                    tmplContent:$('textarea#tmpl_content').val()
                };
                $.post(url, postData, function(data) {
                    if (data) {
                        //清除参数替换表格中已有的行
                        var tbodyParam=$('table#table-param>tbody');
                        tbodyParam.html('');
                        $(data).appendTo(tbodyParam);
                    }else{
                        top.Base.error('解析模板失败');
                    };
                },'html');
            }else{
                top.Base.error('请先填写模板内容');
            }
        });

        $('tbody').on('change','select.select-ptype',function(){
            var type=$(this).val();
            var tdPcontent=$(this).parents('tr').find('td.td-pcontent');
            var key=$(this).data('key');
            var tdHtml="";
            switch(type) {
                case "2":{
                    tdHeml="<select name='pcontent["+key+"]' class='form-control'>";
                        var fields=$.cookie('fields');;
                        fields=$.parseJSON(fields);
                        console.log(fields);
                        $.each(fields.fieldlist, function(index, val) {
                            tdHeml+="<option value='"+val.fieldname+"'>"+val.fieldtitle+"</option>";
                        });
                    tdHeml+="</select>"
                    break;
                }
                case "3":{
                    tdHeml="<select name='pcontent["+key+"]' class='form-control'><option value='tmpl_time'>当前时间</option><option value='tmpl_date'>当前日期</option><option value='tmpl_date_time'>当前时间和日期</option></select>";
                    break;
                }
                default:{
                    tdHeml="<input class='form-control' type='text' name='pcontent["+key+"]' value=''/>";
                    break;
                }
            }
            tdPcontent.html(tdHeml);
        });
    })
</script>
@stop