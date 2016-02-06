@extends('user.public.baseindex')
@section('main')
  <div class="row">
    <div class="col-md-12">
      <div class="portlet light">
        <div class="portlet-title tabbable-line">
          <div class="caption caption-md">
            <i class="icon-globe theme-font hide"></i>
            <span class="caption-subject font-blue-madison bold uppercase">个人信息</span>
          </div>
          <ul class="nav nav-tabs">
            <li class="active">
              <a href="{{ user_url('profile/index') }}">个人信息设置</a>
            </li>
            <li>
              <a href="{{ user_url('avatar') }}">头像设置</a>
            </li>
            <li>
              <a href="{{ user_url('profile/password') }}">修改密码</a>
            </li>
          </ul>
        </div>
        <div class="portlet-body form">
          <form action="" method="post" class="form-horizontal" role="form">
            <div class="form-body">
              <div class="form-group">
                <label class="col-md-2 control-label">用户名</label>
                <div class="col-md-6">
                  <input type="text" name="" value="field" placeholder="" class="form-control" readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">昵称</label>
                <div class="col-md-6">
                  <input type="text" name="nickname" value="field" placeholder="" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Email</label>
                <div class="col-md-6">
                  <input type="text" name="" value="field" placeholder="" class="form-control" readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">联系电话</label>
                <div class="col-md-6">
                  <input type="text" name="mobile" value="field" placeholder="" class="form-control" readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">QQ号码</label>
                <div class="col-md-6">
                  <input type="text" name="qq" value="field" placeholder="" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">生日</label>
                <div class="col-md-6">
                  <input type="text" name="birthday" value="field" placeholder="" class="form-control"/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">最后登录IP</label>
                <div class="col-md-6">
                  <input type="text" name="" value="field" placeholder="" class="form-control"
                         readonly/>
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