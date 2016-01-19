<extend name="Public/dcontentbase"/>
<block name="content">
  <div class="dialog-content form">
    <form action="__SELF__" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>图片</label>
          {:W('User/piccontrol',array('pic_path',$info['pic_path'],'focus'))}
        </div>
        <div class="form-group">
          <label>描述</label>
          <input type="text" name="info" value="{$info.info}" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>关键词</label>
          <input type="text" name="keyword" value="{$info.keyword}" class="form-control" placeholder="">
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
              > 不显示
            </label>
          </div>
        </div>
      </div>
      <div class="form-actions">
        <input type="hidden" name="id" value={$info.id}/>
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-danger btn-closedialog">取消</button>
      </div>
    </form>
  </div>
@stop