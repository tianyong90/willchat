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
          <label>选择目标分组</label>
          <select name="groupid" class="form-control">
            <volist name="groups" id="group">
              <option value="{$group.id}"
              <eq name="Think.get.groupid" value="$group.id">selected</eq>
              >{$group.name}</option>
            </volist>
          </select>
          <span class="help-block">选择用户要移动到哪个分组</span>
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-danger btn-closedialog">取消</button>
      </div>
    </form>
  </div>
@stop