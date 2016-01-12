<extend name="Public/dcontentbase" />
@section('style')
    <style>
        .dialog-content {
            width: 500px;
            height: auto;
        }
        .qrcode {
            display: block;
            margin: 10px auto;
            width: 200px;
        }
    </style>
@stop
<block name="content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="dialog-content form">
        <blockquote>
            <p>请使用手机登录需要添加库管理员的微信号并扫描正文的二维码。</p>
            <p>该二维码有效期库5分钟，过期后请刷新重新生成。</p>
        </blockquote>
        <img class="qrcode" src="{$qrcodeurl}" alt="">
    </div>
    <!-- END PAGE CONTENT-->
@stop
@section('script')
<script>
    $(function() {
    })
</script>
@stop