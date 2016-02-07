@extends('user.public.base')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-users"></i> 粉丝列表
      </div>
      <div class="actions">
        <a href="javascript:;" class="btn default blue-stripe" id="sync"><i class="fa fa-refresh"></i>同步粉丝数据</a>
        <a href="{{ user_url('/') }}" class="btn default blue-stripe dialog-popup" target-form="ids"><i class="fa fa-hand-paper-o"></i>批量移动用户</a>
      </div>
    </div>
    <div class="portlet-body">
      <div class="table-scrollable">
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
          @if(count($fanList) > 0)
            @foreach($fanList as $key => $fan)
              <tr>
                <td><input class="ids" type="checkbox" value="{{ $fan->id }}" name="ids[]"></td>
                <td><img src="{{ $fan->headimgurl }}" class="preview-small"/></td>
                <td>{{ $fan->nickname }}</td>
                <td>{{ $fan->remark }}</td>
                <td>{{ $fan->sex }}</td>
                <td>{{ $fan->groupid }}</td>
                <td>{{ $fan->province }}</td>
                <td>{{ $fan->city }}</td>
                <td>{{ $fan->subscribe_time }}</td>
                <td>
                  <a class="btn blue btn-xs dialog-popup" href="{{ user_url('fans/editremark/'.$fan->id) }}"><i class="fa fa-edit"></i>修改备注</a>
                  <a class="btn blue btn-xs dialog-popup" href="{{ user_url('fans/moveto/'.$fan->id) }}"><i class="fa fa-hand-paper-o"></i>移动至分组</a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="10" class="row-nodata">未同步粉丝数据</td>
            </tr>
          @endif
          </tbody>
        </table>
      </div>
      {!! $fanList->render() !!}
    </div>
  </div>
@endsection
@section('js')
  <script>
    $(function () {
      $('a#sync').click(function(event) {
        event.preventDefault();
        var url = "{{ user_url('fans/sync') }}";
        $.get(url, function(data) {
          if(data.status) {
            Base.success(data.info);
            setTimeout(fucntion(){
              window.location.reload();
            }, 2000);
          } else {
            Base.error(data.info);
          }
        });
        // return;
      });
    })
  </script>
@endsection