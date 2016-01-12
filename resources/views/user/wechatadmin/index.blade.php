@extends('user.public.baseindex')
@section('style')
@stop
@section('main')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-users"></i> 管理员列表
            </div>
            <div class="actions">
                <a href="{:U('add',array('token'=>$token))}" class="btn default blue-stripe fa fa-plus dialog-popup">添加</a>
                <button url="{:U('setStatus',array('Model'=>'WechatAdmin','status'=>1))}" class="btn default green-stripe btn-xs ajax-post" target-form="ids"><i class="fa fa-check"></i>&nbsp;启用</button>
                <button url="{:U('setStatus',array('Model'=>'WechatAdmin','status'=>0))}" class="btn default yellow-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-times"></i>&nbsp;禁用</button>
                <!--   <button url="{:U('setStatus',array('Model'=>'WechatAdmin','status'=>-1))}" class="btn default red-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-trash-o"></i>&nbsp;删除</button> -->
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                    <tr>
                        <th class="table-checkbox">
                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .ids"/>
                        </th>
                        <th>头像</th>
                        <th>昵称</th>
                        <th>OPENID</th>
                        <th>添加时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <notempty name="list">
                    <volist name="list" id="vo">
                    <tr>
                        <td><input class="ids" type="checkbox" value="{$vo['id']}" name="ids[]"></td>
                        <td><img src="{$vo.headimgurl|default='__IMG__/wechatavatar.gif'}" class="preview-small" alt=""></td>
                        <td>{$vo.nickname}</td>
                        <td>{$vo.openid}</td>
                        <td>{$vo.create_time|time_format}</td>
                        <td>
                            <eq name="vo.status" value="1">
                            <span class="badge badge-primary">启用</span>
                            <else/>
                            <span class="badge badge-danger">禁用</span>
                            </eq>
                        </td>
                        <td>
                            <!-- <a class="btn blue btn-xs dialog-popup"
                            href="{:U('edit',array('id'=>$vo['id'],'token'=>$token))}">修改</a> -->
                            <button class="btn red btn-xs btn-delete-confirm" data-link="{:U('deleteAdmin',array('id'=>$vo['id'],'token'=>$token))}">删除</button>
                        </td>
                    </tr>
                    </volist>
                    <else/>
                    <tr>
                        <td colspan="8" style="text-align:center;">暂无数据</td>
                    </tr>
                    </notempty>
                </tbody>
            </table>
        </div>
    </div>
@stop