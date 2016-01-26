<extend name="Public/base"/>
<block name="profile-content">
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
              <a href="{{ user_url('/') }}">个人信息设置</a>
            </li>
            <li>
              <a href="{{ user_url('/') }}">头像设置</a>
            </li>
            <li>
              <a href="{{ user_url('/') }}">修改密码</a>
            </li>
          </ul>
        </div>
        <div class="portlet-body row">
          <form action="__SELF__" method="post" class="col-md-6">
            <div class="form-group">
              <label class="control-label">用户名</label>
              <input type="text" name="" value="{$userinfo.username}" placeholder="" class="form-control" readonly/>
            </div>
            <div class="form-group">
              <label class="control-label">昵称</label>
              <input type="text" name="nickname" value="{$userinfo.nickname}" placeholder="" class="form-control"/>
            </div>
            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="text" name="" value="{$userinfo.email}" placeholder="" class="form-control" readonly/>
            </div>
            <div class="form-group">
              <label class="control-label">联系电话</label>
              <input type="text" name="mobile" value="{$userinfo.mobile}" placeholder="" class="form-control" readonly/>
            </div>
            <div class="form-group">
              <label class="control-label">QQ号码</label>
              <input type="text" name="qq" value="{$userinfo.qq}" placeholder="" class="form-control"/>
            </div>
            <div class="form-group">
              <label class="control-label">生日</label>
              <input type="text" name="birthday" value="{$userinfo.birthday}" placeholder="" class="form-control"/>
            </div>
            <!--     <div class="form-group">
                    <label class="control-label">余额</label>
                    <input type="text" name="" value="{$userinfo.balance}" placeholder="" class="form-control" readonly/>
                </div>
                <div class="form-group">
                    <label class="control-label">VIP到期时间</label>
                    <input type="text" name="" value="{$userinfo.viptime|time_format}" placeholder="" class="form-control" readonly/>
                </div> -->
            <div class="form-group">
              <label class="control-label">最后登录IP</label>
              <input type="text" name="" value="{$userinfo.last_login_ip|long2ip}" placeholder="" class="form-control"
                     readonly/>
            </div>
            <div class="margiv-top-10">
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
  @section('script')
    <script>
      $(function () {
      })
    </script>
@stop