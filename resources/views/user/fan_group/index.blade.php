@extends('user.layouts.base')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-users"></i> 粉丝分组
      </div>
      <div class="actions">
        <a href="{{ user_url('fan_group/create') }}" class="btn default blue-stripe dialog-popup"><i class="fa fa-plus"></i>创建分组</a>
      </div>
    </div>
    <div class="portlet-body">
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th>分组ID</th>
            <th>分组名称</th>
            <th>粉丝数量</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          @foreach($groups as $key=>$group)
            <tr>
              <td>{{ $group['id'] }}</td>
              <td>{{ $group['name'] }}</td>
              <td>{{ $group['count'] }}</td>
              <td>
                @if($key > 2)
                  <a class="btn blue btn-xs dialog-popup" href="{{ user_url('fan_group/edit/'.$group['id'].'/'.$group['name']) }}"><i class="fa fa-edit"></i>编辑</a>
                  <button class="btn red btn-xs btn-delete-confirm" data-link="{{ user_url('fan_group/destroy/'.$group['id']) }}"><i class="fa fa-trash-o"></i>删除
                  </button>
                @endif
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop
@section('js')
  <script>
    $(document).ready(function () {
    });
  </script>
@stop