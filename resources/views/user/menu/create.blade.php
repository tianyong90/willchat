@extends('user.layouts.dialogframe')
@section('style')
@endsection
@section('main')
  <!-- BEGIN PAGE CONTENT-->
  <div class="dialog-content form">
    <form action="" method="post" role="form">
      <div class="form-body">
        <div class="form-group">
          <label>菜单名</label>
          <input type="text" name="name" value="{$info.name}" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>父级菜单</label>
          <select name="pid" id="pid" class="form-control">
            <option value="0">--顶级菜单--</option>
            <volist name="topmenulist" id="menu">
              <option value="{$menu.id}"
              <eq name="info.pid" value="$menu['id']">selected</eq>
              >{$menu.name}</option>
            </volist>
          </select>
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>菜单类型</label>
          <select name="type" id="type" class="form-control">
            <foreach name="menutype" item="type" key="k">
              <option value="{$k}"
              <eq name="info.type" value="$k">selected</eq>
              >{$type}</option>
            </foreach>
          </select>
        </div>
        <div class="form-group" id="key-section">
          <label>关键词</label>
          <input type="text" name="key" value="{$info.key}" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
        <div class="form-group" id="url-section">
          <label>链接</label>
            <div class="input-group">
              <input type="text" name="url" value="{$info.url}" class="form-control" placeholder=请填写以http://开头的有效网址"">
            </div>
        </div>
        <div class="form-group">
          <label>排序</label>
          <input type="text" name="sort" value="{$info.sort}" class="form-control input-small" placeholder="值越大越靠前">
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-green">保存</button>
        <button type="button" class="btn btn-default btn-closedialog">取消</button>
      </div>
    </form>
  </div>
  <!-- END PAGE CONTENT-->
  @stop
  @section('js')
    <script>
      $(function () {
        //根据菜单类型显示或隐藏相应的输入项
        var changeFields = function (type) {
          if (type === 'click') {
            $('div#key-section').show();
            $('div#url-section').hide();
          } else {
            $('div#key-section').hide();
            $('div#url-section').show();
          }
          ;
        };
        //初始时根据类型显示或隐藏相应输入项
        changeFields($('select#type').val());
        //类型改变时根据类型显示或隐藏相应输入项
        $('select#type').change(function (event) {
          changeFields($(this).val());
        });
      })
    </script>
@stop