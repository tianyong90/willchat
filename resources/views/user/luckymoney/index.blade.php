@extends('user.layouts.base')
@section('style')
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-cny"></i> 微信红包
      </div>
      <div class="actions">
        <a href="javascript:;" id="create-wxmenu" class="btn default green-stripe btn-xa"><i class="fa fa-save"></i>生成菜单</a>
        <a href="javascript:;" class="btn default red-stripe btn-xa" id="clear-all"><i class="fa fa-trash-o"></i>清除全部菜单</a>
        <a href="{{ user_url('/') }}" class="btn default blue-stripe btn-xs dialog-popup"><i
              class="fa fa-plus"></i>添加菜单</a>
      </div>
    </div>
    <div class="portlet-body">
<!--       <div class="note note-info">
        <h4 class="block">使用提示：</h4>
        <p>

        </p>
      </div> -->
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th>菜单名称</th>
            <th>类型</th>
            <th>关键词/链接</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <notempty name="menutree">
            <volist name="menutree" id="class">
              <tr>
                <td>{$class.name}</td>
                <td>{$class.type|get_wechat_menu_type}</td>
                <td>
                  <eq name="class.type" value="click">
                    {$class.key}
                    <else/>
                    {$class.url|msubstr=0,85,"utf-8",true}
                  </eq>
                </td>
                <td>
                  <eq name="class.status" value="1">
                    <span class="badge badge-primary">启用</span>
                    <else/>
                    <span class="badge badge-danger">禁用</span>
                  </eq>
                </td>
                <td>
                  <a class="btn blue btn-xs dialog-popup"
                     href="{{ user_url('/') }}">修改</a>
                  <button class="btn red btn-xs btn-delete-confirm"
                          data-link="{{ user_url('/') }}">删除
                  </button>
                </td>
              </tr>
              <volist name="class['submenu']" id="class1">
                <tr>
                  <td>└──{$class1.name}</td>
                  <td>{$class1.type|get_wechat_menu_type}</td>
                  <td>
                    <eq name="class1.type" value="click">
                      {$class1.key}
                      <else/>
                      {$class1.url|msubstr=0,85,"utf-8",true}
                    </eq>
                  </td>
                  <td>
                    <eq name="class1.status" value="1">
                      <span class="badge badge-primary">启用</span>
                      <else/>
                      <span class="badge badge-danger">禁用</span>
                    </eq>
                  </td>
                  <td>
                    <a class="btn blue btn-xs dialog-popup"
                       href="{{ user_url('/') }}">修改</a>
                    <button class="btn red btn-xs btn-delete-confirm"
                            data-link="{{ user_url('/') }}">删除
                    </button>
                  </td>
                </tr>
              </volist>
            </volist>
            <else/>
            <tr>
              <td colspan="10" class="row-nodata">未设置菜单</td>
            </tr>
          </notempty>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop
@section('js')
  <script>
    $(document).ready(function () {
      //生成菜单按钮动作
      $('a#create-wxmenu').click(function (event) {
        event.preventDefault();
        var url = "{{ user_url('/') }}";
        $.get(url, function (data) {
          if (data.status) {
            Base.success(data.info);
            setTimeout(function () {
              top.location.reload()
            }, 2000);
          } else {
            Base.error(data.info);
          }
        }, 'json');
      });

      //清除全部菜单操作
      $('a#clear-all').click(function (event) {
        event.preventDefault();
        if (confirm("您确定要清空全部菜单？")) {
          var url = "{{ user_url('/') }}";
          console.log(url);
          $.get(url, function (data) {
            if (data.status) {
              Base.success(data.info);
              setTimeout(function () {
                top.location.reload()
              }, 2000);
            } else {
              Base.error(data.info);
            }
          }, 'json');
        }
        ;
      });
    });
  </script>
@stop