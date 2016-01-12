<extend name="Public/baseindex"/>
@section('style')
    <link rel="stylesheet" type="text/css" href="__CSS__/document.css">
@stop
<block name="profile-content">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">帮助中心</span>
                    </div>
                    <div class="actions">
                        <div class="portlet-input input-inline input-small">
                            <div class="input-icon right">
                                <i class="icon-magnifier"></i>
                                <input class="form-control input-circle" placeholder="搜索" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                <foreach name="catelist" item="cate">
                                <li <if condition="$Think.get.category eq $cate">class="active"</if>>
                                    <a href="{:U('index?category='.$cate)}">
                                    <i class="fa fa-briefcase"></i>{:get_category_title($cate)}</a>
                                    <span class="after">
                                    </span>
                                </li>
                                </foreach>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <ul id="article-list">
                                <volist name="list" id="vo">
                                    <li>
                                        <a class="title" href="{:U('detail?id='.$vo['id'].'&category='.$_GET['category'])}" title="{$vo.title}">{$vo.title}</a>
                                        <span class="time">{$vo.create_time|time_format}</span>
                                    </li>
                                </volist>
                            </ul>
                            <div class="page">
                                <div class="pagination pagination-right">
                                    {$_page|default=''}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')

@stop