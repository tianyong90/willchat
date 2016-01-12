<extend name="Public/dcontentbase" />
<block name="content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="dialog-content form">
        <form action="__SELF__" method="post">
            <div class="form-body">
                <div class="form-group">
                    <label>卡号规则</label>
                    <select name="rule_mode" class="form-control">
                        <option value="1" <eq name="info.rule_mode" value="1">selected</eq>>自动生成</option>
                        <option value="2" <eq name="info.rule_mode" value="2">selected</eq>>使用手机号作卡号</option>
                    </select>
                    <span class="help-block">选择自动生成时请设置下面的各项参数</span>
                </div>
                <div class="form-group">
                    <label>卡号前缀</label>
                    <input type="text" name="prefix" value="{$info.prefix}" class="form-control" placeholder="">
                    <span class="help-block">支持字母、下划线和英文句号组合，且以字母开头长度1至6个字符</span>
                </div>
                <div class="form-group">
                    <label>卡号起始数字</label>
                    <input type="text" name="start_number" value="{$info.start_number}" class="form-control" placeholder="">
                    <span class="help-block">卡号起始数字，正整数</span>
                </div>
                <div class="form-group">
                    <label>卡号数字长度</label>
                    <input type="text" name="number_length" value="{$info.number_length}" class="form-control" placeholder="">
                    <span class="help-block">卡号数字长度就在4至16范围内</span>
                </div>
                <div class="form-group">
                    <label>卡号过滤</label>
                    <input type="text" name="filter" value="{$info.filter}" class="form-control" placeholder="">
                    <span class="help-block">卡号数字中不出现的数字是数字组合，多个过滤数字用|分隔</span>
                </div>
                <!-- <div class="form-group">
                    <label>是否显示</label>
                    <div class="radio-list">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" checked> 显示 </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0" <eq name="info.status" value="0">checked</eq>> 不显示 </label>
                    </div>
                </div> -->
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
        
    })
</script>
@stop