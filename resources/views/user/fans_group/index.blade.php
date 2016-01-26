@extends('user.public.base')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-users"></i> 粉丝分组
      </div>
      <div class="actions">
        <a href="{{ user_url('create') }}" class="btn default blue-stripe fa fa-plus dialog-popup">添加分组</a>
      </div>
    </div>
    <div class="portlet-body">
      <!-- <div class="note note-info">
          <h4 class="block">特别提示</h4>
          <p>1、由于微信公众平台接口调用频率有限制，请尽量不要太频繁操作用户分组。若系统提示已超出接口调用频率限制，请稍隔一段时间后再进行操作。</p>
          <p>2、系统默认的未分组、黑名单以及星标组不允许修改。</p>
          <p>3、删除分组后对应分组下的粉丝将会移动到默认分组中</p>
      </div> -->
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
                <a class="btn blue btn-xs dialog-popup" href="{{ user_url('fans-group/edit/'.$group['id']) }}"><i
                      class="fa fa-edit"></i>编辑</a>
                <button class="btn red btn-xs btn-delete-confirm"
                        data-link="{{ user_url('fans-group/delete/'.$group['id']) }}"><i class="fa fa-trash-o"></i>删除
                </button>
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