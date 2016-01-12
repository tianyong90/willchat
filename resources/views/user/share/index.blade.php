@extends('user.public.baseindex')
@section('main')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>分享管理
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>
                <a href="#portlet-config" data-toggle="modal" class="config">
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <li class="active">
                        <a href="#tab_15_1" data-toggle="tab">
                            7日分享统计 </a>
                    </li>
                    <li>
                        <a href="#tab_15_2" data-toggle="tab">
                            分享记录 </a>
                    </li>
                    <li>
                        <a href="#tab_15_3" data-toggle="tab">
                            分享设置 </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_15_1">

                    </div>
                    <div class="tab-pane" id="tab_15_2">
                        <div class="table-scrollable">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>模块名称</th>
                                    <th>模块ID</th>
                                    <th>分享人</th>
                                    <th>分享人手机</th>
                                    <th>时间</th>
                                </tr>
                                </thead>
                                <tboay>
                                    <volist id="item" name="info">
                                        <tr>
                                            <td>{$item.moduleName}</td>
                                            <td>{$item.moduleid}</td>
                                            <td>{$item.user.truename}</td>
                                            <td>{$item.user.tel}</td>
                                            <td class="norightborder"><?php echo date('Y-m-d H:i:s',$item['time']);?></td>
                                        </tr>
                                    </volist>
                                </tboay>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_15_3">
                        <form class="form-horizontal" role="form" method="post" action="{:U('User/Index/insert')}">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">分数</label>

                                    <div class="col-md-9">
                                        <input name="score" id="score" class="form-control input-medium"
                                               value="{$record.score}"/>
                                        <span class="help-block">每次分享可以获取多少积分</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">次数</label>

                                    <div class="col-md-9">
                                        <input name="daylimit" id="daylimit" class="form-control input-medium"
                                               value="{$record.daylimit}"/>
                                        <span class="help-block">每个人每天分享赚积分的最大次数，超过这个数字后分享也不会获取积分</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">保存</button>
                                        <button type="button" class="btn default" onclick="javascript:history.go(-1);">
                                            取消
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ asset('static') }}/metronic/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js"
            type="text/javascript"></script>
@stop