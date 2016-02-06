@extends('user.public.baseindex')
@section('main')
  <!-- BEGIN PORTLET -->
  <div class="portlet light ">
    <div class="portlet-title">
      <div class="caption caption-md">
        <i class="icon-bar-chart theme-font hide"></i>
        <span class="caption-subject font-blue-madison bold uppercase">我的公众号</span>
        <span class="caption-helper hide">3333</span>
      </div>
      <div class="actions">
        <a href="{{ user_url('account/create') }}" class="btn default blue-stripe btn-xs"><i class="fa fa-plus"></i>添加公众号</a>
      </div>
    </div>
    <div class="portlet-body">
      <div class="table-scrollable table-scrollable-borderless">
        <table class="table table-hover table-light">
          <thead>
          <tr class="uppercase">
            <th>#</th>
            <th>名称</th>
            <th>类型</th>
            <th>添加时间</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          @foreach($accounts as $key => $account)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $account->name }}</td>
              <td>{{ $account->type }}</td>
              <td>{{ $account->created_at }}</td>
              <td>
                <a class="btn btn-primary btn-xs" href="{{ user_url('account/edit/'.$account->id) }}"><i class="fa fa-edit"></i>修改</a>
                <a class="btn btn-primary btn-xs" href="{{ user_url('account/interface/'.$account->id) }}"><i class="fa fa-link"></i>接口</a>
                <a class="btn btn-primary btn-xs" href="{{ user_url('account/manage/'.$account->id) }}"><i class="fa fa-cogs"></i>功能管理</a>
                <button class="btn btn-danger btn-xs btn-delete-confirm" data-link="{{ user_url('account/destroy/'.$account->id) }}"><i class="fa fa-trash-o"></i>删除</button>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- END PORTLET -->
@endsection