@extends('user.public.baseindex')

@section('content')
{{--BEGIN DASHBOARD STATS--}}
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$data['memberCount'] or 0}}
                </div>
                <div class="desc">
                    会员
                </div>
            </div>
            <a class="more" href="">
                查看更多 <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$data['newsCount'] or 0}}
                </div>
                <div class="desc">
                    图文回复
                </div>
            </div>
            <a class="more" href="">
                查看更多 <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-edit"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$data['textCount'] or 0}}
                </div>
                <div class="desc">
                    文本回复
                </div>
            </div>
            <a class="more" href="">
                查看更多 <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$data['orderCount'] or 0}}
                </div>
                <div class="desc">
                    订单
                </div>
            </div>
            <a class="more" href="">
                查看更多 <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
{{--END DASHBOARD STATS--}}
<div class="clearfix">
</div>
<div class="row">
    <div class="col-md-12">
        {{--BEGIN PORTLET--}}
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">我的公众号</span>
                    <span class="caption-helper hide">3333</span>
                </div>
                <div class="actions">
                    <a href="{{ url('avatar') }}" class="btn default blue-stripe btn-xs dialog-popup"><i class="fa fa-plus"></i>&nbsp;添加公众号</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable table-scrollable-borderless">
                    <table class="table table-hover table-light">
                        <thead>
                        <tr class="uppercase">
                            <th>#</th>
                            <th>公众号名称</th>
                            <th>公众号类型</th>
                            <th>添加时间</th>
                            <!-- <th>已定义/上限</th>
                            <th>请求数</th> -->
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $key=>$account)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><h6>{{$account->name}}</h6></td>
                                <td>{{$account->type}}</td>
                                <td>{{$account->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm dialog-popup"
                                       href="{{ url('/') }}"><i class="fa fa-edit"></i>&nbsp;修改</a>
                                    <a class="btn btn-primary btn-sm"
                                       href=""><i class="fa fa-cog"></i>&nbsp;功能管理</a>
                                    <button class="btn btn-danger btn-sm btn-delete-confirm" data-link=""><i class="fa fa-trash-o"></i>&nbsp;删除</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--END PORTLET--}}
    </div>
</div>
@stop

@section('script')
    <script src="{{ asset('static') }}/metronic/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
@stop