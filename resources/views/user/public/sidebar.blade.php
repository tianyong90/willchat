<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" id="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
          <!--   <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler">
                </div>
            </li> -->
            <volist name="MENU" id="vo">
                <li class="start">
                <!-- 无子菜单时一级菜单直接为跳转链接 -->
                <empty name="vo._child">
                <a href="{:U($vo['url'])}">
                <else/>
                <a href="javascript:;">
                </empty>
                <i class="{$vo.icon_class}"></i>
                <span class="title">{$vo.title}</span>
                <span class="arrow"></span>
                </a>
                <notempty name="vo._child">
                    <ul class="sub-menu">
                    <volist name="vo._child" id="sub">
                        <li><a href="{:U($sub['url'],array('token'=>$token))}">{$sub.title}</a></li>
                    </volist>
                    </ul>
                </notempty>
            </li>
            </volist>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>