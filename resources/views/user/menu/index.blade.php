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
        <a href="{{ user_url('menu/create') }}" class="btn default blue-stripe btn-xs dialog-popup dialog-medium"><i class="fa fa-plus"></i>添加菜单</a>
        <a href="javascript:;" id="sync-from-wechat" class="btn default green-stripe btn-xa"><i class="fa fa-cloud-download"></i>从微信同步</a>
        <a href="javascript:;" id="sync-to-wechat" class="btn default green-stripe btn-xa"><i class="fa fa-cloud-upload"></i>同步到微信</a>
        <a href="javascript:;" class="btn default red-stripe btn-xa" id="clear-all"><i class="fa fa-trash-o"></i>清除菜单</a>
      </div>
    </div>
    <div class="portlet-body">
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
                <td>
                  @if ($menu->type == '点击')
                    {{ $menu->key }}
                  @else
                    {{ str_limit($menu->url, 60) }}
                  @endif
                </td>
                <td>
                  <a class="btn blue btn-xs dialog-popup" href="{{ user_url('menu/update/'.$menu->id) }}">编辑</a>
                  <button class="btn red btn-xs btn-delete-confirm" data-link="{{ user_url('menu/destroy/'.$menu->id) }}">删除</button>
                </td>
              </tr>
              @if (count($menu->subButtons) > 0)
                @foreach ($menu->subButtons as $subButton)
                  <tr>
                    <td>┖━━ &nbsp;{{ $subButton->name }}</td>
                    <td>{{ $subButton->type }}</td>
                    <td>
                      @if ($subButton->type == '点击')
                        {{ $subButton->key }}
                      @else
                        {{ str_limit($subButton->url, 60) }}
                      @endif
                    </td>
                    <td>
                      <a class="btn blue btn-xs dialog-popup" href="{{ user_url('menu/update/'.$subButton->id) }}">编辑</a>
                      <button class="btn red btn-xs btn-delete-confirm" data-link="{{ user_url('menu/destroy/'.$subButton->id) }}">删除</button>
                    </td>
                  </tr>
                @endforeach
              @endif
            @endforeach
          @else
            <tr>
              <td colspan="10" class="row-nodata">请从微信同步或手动添加新菜单</td>
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

      // 从微信同步
      $('a#sync-from-wechat').click(function (event) {
        event.preventDefault();
        Base.confirm('从微信同步菜单将会覆盖本地保存的菜单数据，确定要进行同步？', function(){
          var url = "{{ user_url('menu/sync-from-wechat') }}";
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
      });

      // 同步到微信（即根据本地数据重新生成菜单）
      $('a#sync-to-wechat').click(function (event) {
        event.preventDefault();
        Base.confirm('本操作将重新生成微信自定义菜单，确定要进行操作？', function(){
          var url = "{{ user_url('menu/sync-to-wechat') }}";
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
      });

      // 清除全部菜单操作
      $('a#clear-all').click(function (event) {
        event.preventDefault();
        Base.confirm('该操作会清除本系统和微信上的自定义菜单数据并不可恢复，确定继续？', function(){
          var url = "{{ user_url('menu/clear') }}";
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
      });
    });
  </script>
@stop