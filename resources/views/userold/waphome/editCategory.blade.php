<extend name="Public/dcontentbase"/>
<block name="content">
  <!-- BEGIN PAGE CONTENT-->
  <div class="dialog-content form">
    <form action="__SELF__" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>分类名</label>
          <input type="text" name="name" value="{$info.name}" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>上级分类</label>
          <select name="pid" id="pid" class="form-control">
            <option value="0">--顶级分类--</option>
            <volist name="topcatelist" id="cate">
              <option value="{$cate.id}"
              <eq name="info.pid" value="$cate['id']">selected</eq>
              >{$cate.name}</option>
            </volist>
          </select>
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>分类图片</label>
          {:W('User/piccontrol',array('pic_path',$info['pic_path'],'focus'))}
          <span class="help-block">选择代表分类的图片</span>
        </div>
        <div class="form-group">
          <label>分类说明</label>
          <input type="text" name="description" value="{$info.description}" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
        <div class="form-group" id="url-section">
          <label>链接</label>
          <input type="text" name="url" value="{$info.url}" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>排序</label>
          <input type="text" name="sort" value="{$info.sort}" class="form-control" placeholder="">
          <span class="help-block">值越大越靠前</span>
        </div>
        <div class="form-group">
          <label>是否显示</label>

          <div class="radio-list">
            <label class="radio-inline">
              <input type="radio" name="status" value="1" checked> 显示 </label>
            <label class="radio-inline">
              <input type="radio" name="status" value="0"
              <eq name="info.status" value="0">checked</eq>
              > 不显示 </label>
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
  <!-- END PAGE CONTENT-->
  @stop
  @section('script')
    <script>
      $(function () {

      })
    </script>
@stop