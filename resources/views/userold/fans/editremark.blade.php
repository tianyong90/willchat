<extend name="Public/dcontentbase"/>
@section('style')
  <style>
    .dialog-content {
      width: 400px;
    }
  </style>
@stop
<block name="content">
  <div class="dialog-content form">
    <form action="__SELF__" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>粉丝备注</label>
          <input type="text" name="remark" value="{$Think.get.remark}" class="form-control" placeholder="">
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