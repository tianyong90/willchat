<extend name="Public/dcontentbase"/>
<block name="content">
  <div class="dialog-content form">
    <form action="__SELF__" method="post">
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
          <label>菜单图标</label>

          <div class="menuicon-control">
            <span class="icon-preview fa fa-{$info.icon}"></span>
            <input type="hidden" class="icon-input" name="icon" value="{$info.icon}"/>
            <a href="javascript:;" class="btn btn-primary btn-xs btn-selecticon" data-target="icon">选择图标</a>
            <a href="javascript:;" class="btn btn-danger btn-xs btn-reseticon" data-target="icon">重置图标</a>
          </div>
          <span class="help-block">选择菜单的图标</span>
        </div>
        <div class="form-group">
          <label>关键词</label>
          <input type="text" name="key" value="{$info.key}" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
        <div class="form-group">
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
          <label>状态</label>

          <div class="radio-list">
            <label class="radio-inline">
              <input type="radio" name="status" value="1" checked> 启用
            </label>
            <label class="radio-inline">
              <input type="radio" name="status" value="0"
              <eq name="info.status" value="0">checked</eq>
              > 禁用
            </label>
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
      $(function () {
        //选择菜单图标对话框
        $('.btn-selecticon').on('click', function () {
          //按钮上的参数
          var triggerItem = $(this); //触发弹出层的元素
          var data = triggerItem.data();
          top.dialog({
                id: 'dialog-selecticon',
                title: '选择菜单图标',
                fixed: true,
                quickClose: true,
                padding: 10,
                data: data,
                zIndex: 99999,
                url: "{:U('User/Dialog/selecticon')}",
                okValue: '确定',
                cancelValue: '取消',
                ok: function () {
                  //如果选定了图标
                  if (this.data.icon) {
                    var iconPreview = triggerItem.siblings('.icon-preview');
                    var iconInput = triggerItem.siblings('.icon-input');
                    //更新输入框值
                    iconInput.val(this.data.icon);
                    //更新预览
                    var classes = iconPreview.attr('class').split(' ');
                    $.each(classes, function (index, val) {
                      if (val.match(/fa\-/ig)) {
                        iconPreview.removeClass(val);
                      }
                      ;
                    });
                    iconPreview.addClass("fa-" + this.data.icon);
                  }
                  ;
                  this.close().remove();
                },
                cancel: function () {
                }
              })
              .show();
          return false;
        });

        //重置图标
        $('.btn-reseticon').on('click', function () {
          var triggerItem = $(this);
          var iconPreview = triggerItem.siblings('.icon-preview');
          var iconInput = triggerItem.siblings('.icon-input');
          //更新输入框值
          iconInput.val('');
          //重置图标预览
          var classes = iconPreview.attr('class').split(' ');
          $.each(classes, function (index, val) {
            if (val.match(/fa\-/ig)) {
              iconPreview.removeClass(val);
            }
            ;
          });

        });
      })
    </script>
@stop