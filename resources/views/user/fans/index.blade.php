@extends('user.public.base')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-users"></i> 粉丝列表
      </div>
      <div class="actions">
        <!-- <a href="{{ user_url('/') }}" class="btn default blue-stripe fa fa-plus dialog-popup" target-form="ids">批量移动用户</a> -->
      </div>
    </div>
    <div class="portlet-body">
      <table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
        <tr>
          <th class="table-checkbox">
             <input type="checkbox" class="group-checkable" data-set="#sample_1 .ids"/>
          </th>
          <th>头像</th>
          <th>昵称</th>
          <th>备注</th>
          <th>性别</th>
          <th>分组</th>
          <th>省(直辖市)</th>
          <th>城市</th>
          <th>关注时间</th>
          <th>操作</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
      <div class="page">
        <div class="pagination pagination-right">
          {$_page|default=''}
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <script>
    $(function () {
    })
  </script>
@endsection