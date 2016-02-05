@extends('user.public.baseindex')
@section('main')
  <div class="row">
    <div class="col-md-12">
      <!-- BEGIN PORTLET -->
      <div class="portlet light ">
        <div class="portlet-title">
          <div class="caption caption-md">
            <i class="icon-bar-chart theme-font hide"></i>
            <span class="caption-subject font-blue-madison bold uppercase">我的公众号</span>
            <span class="caption-helper hide">3333</span>
          </div>
          <div class="actions">
              <a href="{{ user_url('account/add') }}" class="btn default blue-stripe btn-xs"><i class="fa fa-plus"></i>添加公众号</a>
          </div>
        </div>
        <div class="portlet-body">
          <div class="table-scrollable table-scrollable-borderless">
            <table class="table table-hover table-light">
              <thead>
              <tr class="uppercase">
                <th>#</th>
                <th>公众号名称</th>
                <th>公众号类型</th>
                <th>添加时间</th>
                <!-- <th>已定义/上限</th>
                <th>请求数</th> -->
                <th>操作</th>
              </tr>
              </thead>
              <tbody>
              <volist name="list" id="vo">
                <tr>
                  <td>{$i}</td>
                  <td>
                    <h6>{$vo.wxname}</h6>
                  </td>
                  <td>{$vo.type|get_account_type_title}</td>
                  <td>{$vo.create_time|time_format}</td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="{{ user_url('account/edit/') }}"><i class="fa fa-edit"></i>修改</a>
                   <a class="btn btn-primary btn-xs" href="{{ user_url('/') }}"><i class="fa fa-link"></i>接口</a>
                    <a class="btn btn-primary btn-xs" href="{{ user_url('/') }}"><i class="fa fa-cogs"></i>功能管理</a>
                    <button class="btn btn-danger btn-xs btn-delete-confirm" data-link="{{ user_url('account/destroy/') }}"><i class="fa fa-trash-o"></i>删除</button>
                  </td>
                </tr>
              </volist>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- END PORTLET -->
    </div>
  </div>
@endsection