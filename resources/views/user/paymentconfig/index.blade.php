@extends('user.public.baseindex')
@section('main')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bank"></i>支付设置
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-scrollable">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>支付方式</th>
                            <th>说明</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <volist name="paymentlist" id="item">
                        <tr>
                            <td>{$item.name}</td>
                            <td>{$item.description}</td>
                            <td>
                                <notempty name="item.is_on">
                                <span class="badge badge-primary">启用</span>
                                <else/>
                                <span class="badge badge-danger">禁用</span>
                                </notempty>
                            </td>
                            <td>
                                <a class="btn blue btn-xs dialog-popup" href="{:U('editConfig',array('token'=>$token,'type'=>$item['type']))}">修改配置</a>
                            </td>
                        </tr>
                        </volist>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop