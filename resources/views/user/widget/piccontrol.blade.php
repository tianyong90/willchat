<div class="pic-control {$class}">
    <span class="thumbnail">
        <img src="__ROOT__{$picpath|default='./Public/User/images/no_picture.gif'}" alt="点击预览">
    </span>
    <div class="buttons">
        <input type="text" class="pic-path" name="{$name}" value="{$picpath}">
        <notempty name="btnReset">
            <a class="btn btn-sm btn-danger btn-resetfile" data-type="{$type}"><i class="fa fa-trash-o"></i>重置</a>
        </notempty>
        <notempty name="btnSelect">
            <a class="btn btn-sm btn-success btn-selectfile" data-type="{$type}"><i class="fa fa-eye"></i>选择</a>
        </notempty>
        <notempty name="btnUpload">
            <a class="btn btn-sm btn-primary btn-uploadfile" data-type="{$type}"><i class="fa fa-upload"></i>上传</a>
        </notempty>
    </div>
</div>