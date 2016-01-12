<extend name="Public/dcontentbase" />
<block name="content">
    <div class="dialog-content form">
        <form action="__SELF__" method="post">
            <div class="form-body">
                <div class="form-group">
                    <label>商户号</label>
                    <input type="text" name="config_param[mchid]" value="{$info['config_param']['mchid']}" class="form-control" placeholder="请填写微信支付商户号">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>支付密钥</label>
                    <input type="text" name="config_param[mchkey]" value="{$info['config_param']['mchkey']}" class="form-control" placeholder="请填写支付密钥">
                    <span class="help-block">通常为32位字符串</span>
                </div>
                <div class="form-group">
                    <label>商户证书</label>
                    <div class="input-group">
                        <input type="text" name="config_param[apiclient_cert]" value="{$info['config_param']['apiclient_cert']}" class="form-control" placeholder="请上传微信支付商户证书" readonly>
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn btn-primary btn-uploadcert">上传商户证书</a>
                        </span>
                    </div>
                    <span class="help-block">请上传从商户平台中下载的证书文件apiclient_cert.pem</span>
                </div>
                <div class="form-group">
                    <label>密钥证书</label>
                    <div class="input-group">
                        <input type="text" name="config_param[apiclient_key]" value="{$info['config_param']['apiclient_key']}" class="form-control" placeholder="请上传微信支付密钥证书" readonly>
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn btn-primary btn-uploadcert">上传密钥证书</a>
                        </span>
                    </div>
                    <span class="help-block">请上传从商户平台中下载的证书文件apiclient_key.pem</span>
                </div>
                <div class="form-group">
                    <label>是否启用</label>
                    <div class="radio-list">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" checked> 启用 </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0" <eq name="info.status" value="0">checked</eq>> 不启用 </label>
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
@stop
@section('script')
<script>
    $(function(){
        $('a.btn-uploadcert').click(function(){
            var triggerItem=$(this); //触发弹出层的元素
            var data=triggerItem.data();
            top.dialog({
                id: 'dialog-uplpadfile',
                title: '上传证书',
                fixed:true,
                quickClose: true,
                padding: 10,
                data: data,
                zIndex: 99999,
                url: "{:U('User/Dialog/uploadcert',array('token'=>$token))}",
                okValue: '确定',
                cancelValue: '取消',
                ok: function() {
                    if (this.data.filepath) {
                        //更新输入框值
                        triggerItem.parents(".input-group").find('input').val(this.data.filepath);
                    };
                    this.close().remove();
                },
                cancel: function() {
                }
            })
            .show();
            return false;
        });
    })
</script>
@stop