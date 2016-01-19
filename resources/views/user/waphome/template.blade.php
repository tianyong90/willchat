@extends('user.public.baseindex')
@section('style')
  <link rel="stylesheet" href="{{ asset('css') }}/user/metronicuser.css"/>
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title tabbable-line">
      <div class="caption">
        <i class="fa fa-eye"></i>模板设置
      </div>
      <ul class="nav nav-tabs ">
        <li
        <eq name="type" value="1"> class="active"</eq>
        >
        <a href="{:U('',array('token'=>$token,'type'=>'1'))}">
          栏目首页模板 </a>
        </li>
        <li
        <eq name="type" value="2"> class="active"</eq>
        >
        <a href="{:U('',array('token'=>$token,'type'=>'2'))}">
          图文列表模板 </a>
        </li>
        <li
        <eq name="type" value="3"> class="active"</eq>
        >
        <a href="{:U('',array('token'=>$token,'type'=>'3'))}">
          图文详细页模板 </a>
        </li>
      </ul>
    </div>
    <div class="portlet-body">
      <eq name="type" value="1">
        <div class="row tmpls-filter">
          <ul class="filterBtn">
            <li data-filter="ck">我选中的模版</li>
            <li data-filter="mix" class="active">全部模版</li>
            <li data-filter="sub">可显示两级分类</li>
            <li data-filter="focu">支持幻灯片</li>
            <li data-filter="bg">支持自定义背景</li>
            <li data-filter="thumb">带缩略图</li>
            <li data-filter="filt">半透明版块</li>
            <li data-filter="bgs">支持背景音乐</li>
            <li data-filter="slip">支持横向滑动</li>
            <li data-filter="page">支持翻页</li>
          </ul>
        </div>
      </eq>
      <div class="row tmpllist" id="tmpllist">
        <volist name="tpllist" id="tpl">
          <div class="col-md-2 col-sm-3 mix {$tpl.attr} <php>if($tplid == $tpl['id']) echo 'ck';</php>">
            <a class="tpl-select" data-tplid="{$tpl.id}" href="javascript:;">
              <img class="img-responsive" data-echo="__IMG__/tpl_prew/{$tpl.preview}"
                   src="{{ asset('static') }}/Echo/images/loading.gif">
                    <span class="tplinfo">
                    <h4 class="tplname">{$tpl.name}</h4>
                    <p class="tpldescription">{$tpl.description}</p>
                    </span>
            </a>
          </div>
        </volist>
      </div>
    </div>
  </div>
@stop
@section('script')
  <script src="{{ asset('static') }}/Echo/js/echo.min.js"></script>
  <script>
    //模板预览图片懒加载
    Echo.init({
      offset: 0,
      throttle: 0
    });
    $(function () {
      $("ul.filterBtn").children('li').click(function (event) {
        $this = $(this);
        $this.addClass('active').siblings('li').removeClass('active');
        var filter = $this.attr("data-filter");
        var $cate = $("div#tmpllist");
        var speed = 500;
        $cate.children("div." + filter).stop().show(speed).siblings('div').not("." + filter).hide(speed);
      });
      $("a.tpl-select").click(function (e) {
        e.preventDefault();
        $(this).parent('div.mix').addClass('ck').siblings('div.mix').removeClass('ck');
        var url = "{:U('changeTpl',array('token'=>$token,'type'=>$_GET['type']))}";
        var tmplid = $(this).attr('data-tplid');
        var postData = {"tmplid": tmplid};
        $.post(url, postData, function (data) {
          if (data.status) {
            Base.success(data.info);
          } else {
            Base.error(data.info);
          }
        }, 'json');
      }).hover(function () {
        $(this).children('span.tplinfo').stop().fadeIn(50);
      }, function () {
        $(this).children('span.tplinfo').stop().fadeOut(50);
      });
    })
  </script>
@stop