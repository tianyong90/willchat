@extends('user.layouts.baseindex')
@section('main')
  <div class="row">
    <div class="col-md-12">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption caption-md">
            <i class="icon-globe theme-font hide"></i>
            <span class="caption-subject font-blue-madison">接口信息</span>
          </div>
        </div>
        <div class="portlet-body">
          <div class="note note-info">
            服务器URL：{{ url('wechat/'.$token)  }}<br />
            TOKEN：{{ $token }}
          </div>
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