<div class="page-sidebar-wrapper">
  <div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu" id="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true"
        data-slide-speed="200">
      <li class="sidebar-toggler-wrapper">
        <div class="sidebar-toggler">
        </div>
      </li>
      <li class="start">
        <a href="{{ user_url('/') }}">
          <i class="icon-home"></i>
          <span class="title">用户中心</span>
          <span class="arrow"></span>
        </a>
      </li>
      <li>
        <a href="javascript:;">
          <i class="icon-settings"></i>
          <span class="title">基础设置</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a href="{{ user_url('/') }}">功能管理</a></li>
          <li><a href="{{ user_url('/') }}">商家信息</a></li>
          <li><a href="{{ user_url('/') }}">支付设置</a></li>
          <!-- <li><a href="{{ user_url('/') }}">统计分析</a></li> -->
          <li><a href="{{ user_url('menu/') }}">微信菜单</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:;">
          <i class="icon-grid"></i>
          <span class="title">微信管理员</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a href="{{ user_url('/') }}">管理员列表</a></li>
          <li><a href="{{ user_url('/') }}">功能设置</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:;">
          <i class="icon-bubble"></i>
          <span class="title">自动回复</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a href="{{ user_url('/') }}">关注回复</a></li>
          <li><a href="{{ user_url('/') }}">文本回复</a></li>
          <li><a href="{{ user_url('/') }}">图文回复</a></li>
          <li><a href="{{ user_url('/') }}">其它回复</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:;">
          <i class="icon-users"></i>
          <span class="title">会员卡</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a id="menu-membercard" href="{{ user_url('/') }}">会员卡管理</a></li>
          <li><a href="{{ user_url('/') }}">回复设置</a></li>
          <li><a href="{{ user_url('/') }}">通知管理</a></li>
          <li><a href="{{ user_url('/') }}">幻灯片</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:;">
          <i class="icon-globe"></i>
          <span class="title">微网站</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a href="{{ user_url('/') }}">回复设置</a></li>
          <li><a id="menu-template" href="{{ user_url('/') }}">微站模板</a></li>
          <li><a href="{{ user_url('/') }}">导航菜单</a></li>
          <li><a href="{{ user_url('/') }}">菜单样式</a></li>
          <li><a href="{{ user_url('/') }}">内容分类</a></li>
          <li><a href="{{ user_url('/') }}">幻灯片</a></li>
          <li><a href="{{ user_url('/') }}">全屏背景</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:;">
          <i class="icon-basket"></i>
          <span class="title">微商城</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a href="{{ user_url('/') }}">商品分类</a></li>
          <li><a href="{{ user_url('/') }}">商品管理</a></li>
          <li><a href="{{ user_url('/') }}">订单管理</a></li>
          <li><a href="{{ user_url('/') }}">回复设置</a></li>
          <li><a href="{{ user_url('/') }}">店铺设置</a></li>
        </ul>
      </li>
      <!--             <li>
                <a href="javascript:;">
                <i class="icon-present"></i>
                <span class="title">微营销</span>
                <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{ user_url('/') }}">微海报</a></li>
                </ul>
            </li> -->
      <li>
        <a href="javascript:;">
          <i class="icon-credit-card"></i>
          <span class="title">微信卡券</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a href="{{ user_url('/') }}">卡券管理</a></li>
          <li><a href="{{ user_url('/') }}">CODE管理</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:;">
          <i class="icon-frame"></i>
          <span class="title">二维码</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a href="{{ user_url('/') }}">二维码</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:;">
          <i class="icon-doc"></i>
          <span class="title">模板消息</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a href="{{ user_url('/') }}">消息模板设置</a></li>
          <li><a href="{{ user_url('/') }}">模板消息记录</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:;">
          <i class="icon-bubbles"></i>
          <span class="title">高级群发</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a href="{{ user_url('/') }}">群发消息</a></li>
          <li><a href="{{ user_url('/') }}">群发消息记录</a></li>
        </ul>
      </li>
      <li class="last">
        <a href="javascript:;">
          <i class="icon-pie-chart"></i>
          <span class="title">粉丝管理</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li><a href="{{ user_url('fans/') }}">粉丝列表</a></li>
          <li><a href="{{ user_url('fans-group/') }}">粉丝分组</a></li>
        </ul>
      </li>
    </ul>
    <!-- END SIDEBAR MENU -->
  </div>
</div>