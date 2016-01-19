@extends('user.public.base')
@section('style')
  <link href="{{ asset('static') }}/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
        rel="stylesheet" type="text/css"/>
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-cubes"></i> 系统功能列表
      </div>
    </div>
    <div class="portlet-body">
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <tr>
            <th>#</th>
            <th>功能</th>
            <th>回复关键词</th>
            <th>权限</th>
            <th>状态</th>
          </tr>
          @foreach($functions as $key=>$function)
            <tr>
              <td>{{$key}}</td>
              <td>{{$function['name']}}</td>
              <td>{{$function['description']}}</td>
              <td>
                <span class="badge badge-success</if>">VIP{$func['gid']-1}</span>
              </td>
              {{--<td>--}}
              {{--<input name="" type="checkbox" class="make-switch" value="1" data-id=""/>--}}
              {{--</td>--}}
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
@stop
@section('script')
  <script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
          type="text/javascript"></script>
  <script>
    $('input.make-switch').on('switchChange.bootstrapSwitch', function (event, state) {
      var url = "{:U('toggleFunction',null,false,false)}";
      var postData = {
        'token': '{$token}',
        'fid': $(this).data('id'),
        'is_add': state
      };
      $.post(url, postData, function (data) {
        if (data.status) {
          Base.success(data.info);
        } else {
          Base.error(data.info);
        }
      })
    });
  </script>
@stop