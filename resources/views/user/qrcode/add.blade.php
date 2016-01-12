<extend name="Public/dcontentbase" />
<block name="content">
    <div class="dialog-content form">
        <form action="__SELF__" method="post">
            <div class="form-body">
                <empty name="Think.get.is_shop_qrcode">
                    <div class="form-group">
                        <label>二维码类型</label>
                        <select name="type" id="type" class="form-control">
                            <option value="1">永久二维码</option>
                            <option value="0">临时二维码</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>关键词</label>
                        <input type="text" name="keyword" value="{$info.keyword}" class="form-control" placeholder="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group" id="expr">
                        <label>有效期</label>
                        <input type="text" name="expire" value="{$info.expire}" class="form-control" placeholder="">
                        <span class="help-block">临时二维码的有效期，单位为秒</span>
                    </div>
                <else/>
                <div class="form-group">
                    <label>对应店铺</label>
                    <select name="keyword" class="form-control">
                        <foreach name="shop_list" item="shop">
                            <option value="shopid_{$shop.ID}">{$shop.Name}</option>
                        </foreach>
                    </select>
                    <span class="help-block">选择二维码对应的分店</span>
                </div>
                </empty>
                <div class="form-group">
                    <label>备注</label>
                    <input type="text" name="description" value="{$info.description}" class="form-control" placeholder="">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">保存</button>
                <button type="button" class="btn btn-danger btn-closedialog">取消</button>
            </div>
        </form>
    </div>
@stop
@section('script')
<script>
    $(function() {
        //根据菜单类型显示或隐藏相应的输入项
        var changeFields = function(type) {
            if (type==='1') {
                $('div#expr').hide();
            } else{
                $('div#expr').show();
            };
        };
        //初始时根据类型显示或隐藏相应输入项
        changeFields($('select#type').val());
        //类型改变时根据类型显示或隐藏相应输入项
        $('select#type').change(function(event) {
            changeFields($(this).val());
        });
    })
</script>
@stop