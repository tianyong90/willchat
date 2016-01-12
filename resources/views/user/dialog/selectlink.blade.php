<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-cn" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-cn" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-cn">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>选择链接</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<link rel="stylesheet" href="__CSS__/dialog.css" />
<style>
    .dialog-content {
        width: 550px;
        height: auto;
        max-height: 400px;
        overflow: auto;
        padding: 10px;
    }
</style>
</head>
<body>
<div>
    <div class="dialog-content">
        <notempty name="module_list">
            <ul class="link-list">
            <foreach name="module_list" item="module">
                <li>
                    <a class="alink" href="javascript:;" data-keyword="{$module.keyword}" data-url="{$module.url}">{$module.name}</a>
                </li>
            </foreach>
            </ul>
        <else/>
            <span class="error">没有可供选择的模块链接</span>
        </notempty>
    </div>
</div>
<!--[if lt IE 9]>
<script src="{{ asset('static') }}/metronic/global/plugins/respond.min.js"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="{{ asset('static') }}/metronic/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        var currentDialog=top.dialog.getCurrent();
        $('a.alink').click(function(event) {
            var $this=$(this);
            $('a.alink').removeClass('active');
            $this.addClass('active');

            //当前对话框的data值，以便上层窗口调用
            currentDialog.data.keyword=$this.data('keyword');
            currentDialog.data.url=$this.data('url');
        });
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>