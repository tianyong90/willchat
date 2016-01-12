@extends('user.public.baseindex')
@section('style')
<link rel="stylesheet" href="__CSS__/metronicuser.css"/>
@stop
@section('main')
<div class="portlet light">
    <div class="portlet-title tabbable-line">
        <div class="caption">
            <i class="fa fa-eye"></i> 菜单样式
        </div>
    </div>
    <div class="portlet-body">
        <ul class="cateradio">
            <li <eq name="styleid" value="0"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/000.png">
                关闭底部导航</label>
            </li>
            <li <eq name="styleid" value="1"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/001.png">
                1.左侧展开</label>
            </li>
            <li <eq name="styleid" value="2"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/002.png">
                2.右侧展开</label>
            </li>
            <li <eq name="styleid" value="3"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/003.png">
                3.左侧滑入</label>
            </li>
            <li <eq name="styleid" value="4"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/004.png">
                4.右侧滑入</label>
            </li>
            <li <eq name="styleid" value="5"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/005.png">
                5.左侧底部滑入</label>
            </li>
            <li <eq name="styleid" value="6"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/006.png">
                6.右侧底部滑入</label>
            </li>
            <li <eq name="styleid" value="7"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/007.png">
                7.左侧底部滑入（弧形排列）</label>
            </li>
            <li <eq name="styleid" value="8"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/008.png">
                8.右侧底部滑入（弧形排列）</label>
            </li>
            <li <eq name="styleid" value="9"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/009.png">
                9.底部横向固定菜单深灰</label>
            </li>
            <li <eq name="styleid" value="10"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/010.png">
                10.底部横向固定菜单白</label>
            </li>
            <li <eq name="styleid" value="11"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/011.png">
                11.底部横向固定菜单</label>
            </li>
            <li <eq name="styleid" value="12"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/012.png">
                12.底部横向固定菜单</label>
            </li>
            <li <eq name="styleid" value="13"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/013.png">
                13.底部横向固定菜单（白色无图标）</label>
            </li>
            <li <eq name="styleid" value="14"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/014.png">
                14.底部横向固定菜单（黑色无图标）</label>
            </li>
            <li <eq name="styleid" value="15"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/015.png">
                15.底部横向固定菜单（主页按钮居中）</label>
            </li>
            <li <eq name="styleid" value="16"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/016.png">
                16.底部横向固定菜单（主页按钮居左）</label>
            </li>
<!--             <li <eq name="styleid" value="17"> class="active"</eq>>
                <label><img src="{{ asset('static') }}/Echo/images/loading.gif" data-echo="__IMG__/menu_preview/017.png">
                17.底部横向固定菜单（带工具菜单）</label>
            </li> -->
        </ul>
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
        $('ul.cateradio').find('li').click(function(event) {
            $(this).addClass('active').siblings('li').removeClass('active');
            var id=$(this).index();
            var url=$(this).attr('action');
            var postData={"styleid": id};
            $.post(url, postData, function(data, textStatus, xhr) {
                if(data.status){
                    Base.success(data.info);
                }else{
                    Base.error(data.info);
                }
            },'json');
            return false;
        });
    })
</script>
@stop