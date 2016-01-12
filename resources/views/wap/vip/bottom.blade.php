<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default am-no-layout" id="navbar">
  <ul class="am-navbar-nav am-cf am-avg-sm-2">
    <li>
      <a class="active" id="menu-home"
         href="{:U('index',array('token'=>$token,'openid'=>$openid,'islink'=>1))}">
        <span class="am-icon-home"></span>
        <span class="am-navbar-label">主页</span>
      </a>
    </li>
    <notempty name="myinfo">
      <li>
        <a id="menu-card"
           href="{:U('thiscard',array('token'=>$token,'openid'=>$openid))}">
          <span class="am-icon-user"></span>
          <span class="am-navbar-label">会员</span>
        </a>
      </li>
    </notempty>
    <li>
      <a href="javascript:window.location.reload();">
        <span class="am-icon-refresh"></span>
        <span class="am-navbar-label">刷新</span>
      </a>
    </li>
    <li>
      <a href="javascript:history.go(-1);">
        <span class="am-icon-arrow-left"></span>
        <span class="am-navbar-label">后退</span>
      </a>
    </li>
  </ul>
</div>