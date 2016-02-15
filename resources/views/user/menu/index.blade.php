@extends('user.layouts.base')
@section('style')
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-list"></i> 自定义菜单
      </div>
      <div class="actions">
        <a href="{{ user_url('add') }}" class="btn default blue-stripe btn-xs dialog-popup"><i class="fa fa-plus"></i>添加菜单</a>
        <a href="javascript:;" id="create-wxmenu" class="btn default green-stripe btn-xa"><i class="fa fa-save"></i>重新生成</a>
        <a href="javascript:;" class="btn default red-stripe btn-xa" id="clear-all"><i class="fa fa-trash-o"></i>清除菜单</a>
      </div>
    </div>
    <div class="portlet-body">
      <div class="note note-info">
        <h4 class="block">使用提示：</h4>
        <p>
          注意：1级菜单最多只能开启3个，2级子菜单最多开启5个<br>
          官方说明：修改后，需要重新关注，或者最迟隔天才会看到修改后的效果！<br>
        </p>
      </div>
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th>名称</th>
            <th>类型</th>
            <th>关键词/链接</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          @if(count($menuTree) > 0)
            @foreach ($menuTree as $menu)
              <tr>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->type }}</td>
                <td>{{ $menu->key }}</td>
                <td>
                  <a class="btn blue btn-xs dialog-popup"
                     href="{{ user_url('menu/edit/'.$menu->id) }}">编辑</a>
                  <button class="btn red btn-xs btn-delete-confirm" data-link="{{ user_url('menu/destroy/'.$menu->id) }}">删除</button>
                </td>
              </tr>
              @if (count($menu->subButtons) > 0)
                @foreach ($menu->subButtons as $subButton)
                  <tr>
                    <td>┖━━ &nbsp;{{ $subButton->name }}</td>
                    <td>{{ $subButton->type }}</td>
                    <td>{{ $subButton->key }}</td>
                    <td>
                      <a class="btn blue btn-xs dialog-popup"
                         href="{{ user_url('menu/edit/'.$subButton->id) }}">编辑</a>
                      <button class="btn red btn-xs btn-delete-confirm" data-link="{{ user_url('menu/destroy/'.$subButton->id) }}">删除</button>
                    </td>
                  </tr>
                @endforeach
              @endif
            @endforeach
          @else
            <tr>
              <td colspan="10" class="row-nodata">暂无数据</td>
            </tr>
          @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop
@section('js')
  <script>
    $(document).ready(function () {
      // 生成菜单按钮动作
      $('a#create-wxmenu').click(function (event) {
        event.preventDefault();
        var url = "{{ user_url('') }}";
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

      // 清除全部菜单操作
      $('a#clear-all').click(function (event) {
        event.preventDefault();
        if (confirm("您确定要清空全部菜单？")) {
          var url = "{{ user_url('menu/clear') }}";
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