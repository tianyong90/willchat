@extends('user.public.base')
@section('main')
  <div class="row">
    <div class="col-md-12">
      <div class="portlet light">
        <div class="portlet-title tabbable-line">
          <div class="caption caption-md">
            <i class="icon-globe theme-font hide"></i>
            <span class="caption-subject font-blue-madison bold uppercase">修改密码</span>
          </div>
          <ul class="nav nav-tabs">
            <li>
              <a href="{{ user_url('profile/index') }}">个人信息设置</a>
            </li>
            <li>
              <a href="{{ user_url('avatar') }}">头像设置</a>
            </li>
            <li class="active">
              <a href="{{ user_url('profile/password') }}">修改密码</a>
            </li>
          </ul>
        </div>
        <div class="portlet-body row">
          <form action="__SELF__" method="post" class="col-md-6">
            <div class="form-group">
              <label class="control-label">原密码</label>
              <input type="password" name="old" class="form-control"/>
            </div>
            <div class="form-group">
              <label class="control-label">新密码</label>
              <input type="password" name="password" class="form-control"/>
            </div>
            <div class="form-group">
              <label class="control-label">确认新密码</label>
              <input type="password" name="repassword" class="form-control"/>
            </div>
            <div class="margin-top-10">
              <button type="submit" class="btn green-haze">保存修改</button>
              <a href="javascript:history.go(-1);" class="btn default">
                取消 </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop
@section('js')
    <script>
      $(function () {
      })


    </script>
@stop