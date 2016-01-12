<foreach name="params" item="item" key="k">
<tr>
    <td>{$item}<input type="hidden" name="pname[{$k}]" value="{$item}"/></td>
    <td>
        <select class="form-control select-ptype" name="ptype[{$k}]" data-key="{$k}">
            <option value="1" <if condition="$info['parameter_map']['ptype'][$k] eq 1">selected</if>>使用文本</option>
            <option value="2" <if condition="$info['parameter_map']['ptype'][$k] eq 2">selected</if>>使用数据字段</option>
            <option value="3" <if condition="$info['parameter_map']['ptype'][$k] eq 3">selected</if>>使用函数</option>
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