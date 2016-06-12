@extends('user.layouts.baseindex')
@section('main')
  <div class="row">
    <div class="col-md-12">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption caption-md">
            <i class="icon-globe theme-font hide"></i>
            <span class="caption-subject font-blue-madison bold uppercase">添加公众号</span>
          </div>
        </div>
        <div class="portlet-body form">
          <form action="" method="post" class="form-horizontal" role="form">
            <div class="form-body">
              <div class="form-group">
                <label class="col-md-2 control-label">公众号名</label>
                <div class="col-md-6">
                  <input type="text" name="name" value="{{ $accountInfo->name or old('name') }}" placeholder="如：willchat" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">token</label>
                <div class="col-md-6">
                  <input type="text" name="token" value="{{ $accountInfo->token or old('token') }}" placeholder="如：tokenwillchat" class="form-control" readonly />
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">AppId</label>
                <div class="col-md-6">
                  <input type="text" name="app_id" value="{{ $accountInfo->app_id or old('app_id') }}" placeholder="请填写Appid" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">AppSecret</label>
                <div class="col-md-6">
                  <input type="text" name="app_secret" value="{{ $accountInfo->app_secret or old('app_secret') }}" placeholder="请填写 AppSecret" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">EncodingAESkey</label>
                <div class="col-md-6">
                  <input type="text" name="aes_key" value="{{ $accountInfo->aes_key or old('aes_key') }}" placeholder="请填写 EncodingAESkey" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">公众号类型</label>
                <div class="col-md-6">
                  <select name="type" class="form-control">
                    <option value="1">订阅号</option>
                    <option value="2">认证订阅号</option>
                    <option value="3">服务号</option>
                    <option value="4">认证服务号</option>
                  </select>
                </div>
              </div>
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
    </div>
  </div>
@endsection
@section('js')
  <script>
    $(function () {
    })
  </script>
@endsection