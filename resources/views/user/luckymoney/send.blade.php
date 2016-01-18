<extend name="Public/dcontentbase" />
<block name="content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="dialog-content form">
        <form action="__SELF__" method="post">
            <div class="form-body">
                <div class="form-group">
                    <label>红包类型</label>
                    <select name="type" class="form-control" id="type">
                        <option value="CASH_LUCK_MONEY">现金红包</option>}
                        <option value="GROUP_LUCK_MONEY">裂变红包</option>}
                    </select>
                    <span class="help-block">请选择要发送的红包类型</span>
                </div>
                <div class="form-group">
                    <label>商户名称</label>
                    <input type="text" name="send_name" value="{$send_name}" class="form-control" placeholder="1">
                    <span class="help-block">填写商户名称，必填。</span>
                </div>
                <div class="form-group">
                    <label>红包总金额</label>
                    <input type="text" name="total_amount" value="" class="form-control" placeholder="1">
                    <span class="help-block">红包总金额，单位为元。</span>
                </div>
                <div class="form-group" id="total_num">
                    <label>红包发放总人数</label>
                    <input type="text" name="total_num" value="3" class="form-control" placeholder="">
                    <span class="help-block">即有多少人能领取到裂变的红包,最小为3。</span>
                </div>
                <div class="form-group">
                    <label>祝福语</label>
                    <input type="text" name="wishing" value="" class="form-control" placeholder="恭喜发财，大吉大利！">
                    <span class="help-block">红包祝福语，必填。</span>
                </div>
                <div class="form-group">
                    <label>活动名称</label>
                    <input type="text" name="act_name" value="" class="form-control" placeholder="">
                    <span class="help-block">红包活动名称，如“优惠红包反利”，必填。</span>
                </div>
                <div class="form-group">
                    <label>红包备注</label>
                    <input type="text" name="remark" value="" class="form-control" placeholder="">
                    <span class="help-block">红包备注信息，必填。</span>
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
<script>
    $(function() {
        //根据菜单类型显示或隐藏相应的输入项
        var changeFields = function(type) {
            if (type==='CASH_LUCK_MONEY') {
                $('div#total_num').hide();
            } else{
                $('div#total_num').show();
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