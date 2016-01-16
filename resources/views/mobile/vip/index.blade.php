@extends('base')

<extend name="base"/>
<block name="style">
</block>
<block name="main-content">
  <!-- Slider -->
  <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='{"directionNav":true}'>
    <ul class="am-slides">
      <volist name="slide" id="vo">
        <li><a href="{$vo.url|default='javascript:void(0)'}"><img src="__ROOT__{$vo.pic_path}"/></a></li>
      </volist>
    </ul>
  </div>
  <!-- Slider -->
  <div class="am-container">
    <div class="am-g reg-entry">
      <span class="am-u-sm-3">
      <img class="card-logo" src="__ROOT__{$cardinfo.logo}" alt=""/>
      </span>
      <span class="am-u-sm-9">
      <h1 class="card-name">{$cardinfo.name}</h1>
      <p class="card-message">{$cardinfo.msg}</p>
      <notempty name="myinfo">
        <a class="am-badge am-badge-secondary am-round"
             href="{:U('thiscard',array('token'=>$token,'openid'=>$openid))}">使用会员卡</a>
        <else/>
        <!-- 微信号还没有领取过任何卡 -->
        <a class="am-badge am-badge-secondary am-round"
           href="{:U('memberbind',array('token'=>$token,'openid'=>$openid))}">绑定会员卡</a>
        <a class="am-badge am-badge-success am-round"
           href="{:U('register',array('token'=>$token,'openid'=>$openid))}">领取会员卡</a>
      </notempty>
      </span>
    </div>
  </div>
  <div class="am-container">
    <ul class="am-list" id="contact-links">
      <li>
        <a href="<notempty name="businessinfo.telephone">tel:{$businessinfo.telephone}
        <else/>
        javascript:;</notempty>">
        <i class="am-icon-phone"></i>
          <span>
          <notempty name="businessinfo.telephone">{$businessinfo.telephone}
            <else/>
            商家未设置电话
          </notempty>
          </span>
        </a>
      </li>
      <li>
        <a href="{:U('map',array('token'=>$token,'openid'=>$openid))}">
          <i class="am-icon-location-arrow"></i>
            <span>
            <notempty name="businessinfo.address">{$businessinfo.address}
              <else/>
              商家未设置地址
            </notempty>
            </span>
        </a>
      </li>
      <li>
        <a href="{:U('businessinfo',array('token'=>$token,'openid'=>$openid))}">
          <i class="am-icon-info"></i>
            <span>
            查看商家详情
            </span>
        </a>
      </li>
    </ul>
  </div>
</block>