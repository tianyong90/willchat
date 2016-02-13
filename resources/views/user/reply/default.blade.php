@extends('user.layouts.base')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-info"></i> 默认回复
      </div>
      <div class="actions">
<!--         <a href="{{ user_url('/') }}" class="btn default blue-stripe dialog-popup" target-form="ids"><i class="fa fa-hand-paper-o"></i>批量移动用户</a> -->
      </div>
    </div>
    <div class="portlet-body form">
      <form action="" method="post" class="form-horizontal" role="form">
        <div class="form-body">
          <div class="form-group">
            <label class="col-md-2 control-label">回复内容</label>
            <div class="col-md-6">
              <textarea class="form-control" name="content" rows="5" placeholder="输入回复内容"></textarea>
            </div>
          </div>
          <!-- <div class="form-group">
            <label class="col-md-2 control-label">新密码</label>
            <div class="col-md-6">
              <input type="password" name="password" class="form-control"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">确认新密码</label>
            <div class="col-md-6">
              <input type="password" name="password_confirmation" class="form-control"/>
            </div>
          </div> -->
        </div>
        <div class="form-actions">
          <div class="row">
            <div class="col-md-offset-2 col-md-6">
              <button type="submit" class="btn green">保存</button>
              <a href="javascript:history.go(-1);" class="btn default">
                取消 </a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('js')
  <script>
    $(function () {
     
    })
  </script>
@endsection