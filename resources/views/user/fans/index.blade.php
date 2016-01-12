@extends('user.public.baseindex')
@section('main')
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-users"></i>粉丝列表
        </div>
        <div class="actions">
            <!-- <a href="{:U('moveusers',array('token'=>$token))}" class="btn default blue-stripe fa fa-plus dialog-popup" target-form="ids">批量移动用户</a> -->
        </div>
    </div>
    <div class="portlet-body">
        <div class="note note-info">
            <h4 class="block">特别提示</h4>
            <p>1、由于微信公众平台接口对于调用获取用户列表、编辑用户备注等接口的频率均有限制，请尽量不要太频繁的进行操作。若系统提示已超出接口调用频率限制，请稍隔一段时间后再试。</p>
            <p>2、各接口调用频率限制详情可<a class="font-red" href="https://mp.weixin.qq.com/cgi-bin/loginpage?t=wxm2-login&lang=zh_CN" target="_new">登录微信公众平台</a>，进入开发者中心在接口权限列表中查看。</p>
        </div>
        <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                   <!--  <th class="table-checkbox">
                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .ids"/>
                    </th> -->
                    <th>头像</th>
                    <th>昵称</th>
                    <th>备注</th>
                    <th>性别</th>
                    <th>分组</th>
                    <th>省(直辖市)</th>
                    <th>城市</th>
                    <th>关注时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <notempty name="list">
                    <volist name="list" id="vo">
                        <tr>
                            <!-- <td><input class="ids" type="checkbox" value="{$vo['openid']}" name="openids[]"></td> -->
                            <td><img src="{$vo.headimgurl|default='__IMG__/wechatavatar.gif'}" class="preview-small" alt=""></td>
                            <td>{$vo.nickname}</td>
                            <td>{$vo.remark}</td>
                            <td><eq name="vo.sex" value="1">男<else/>女</eq></td>
                            <td>
                                <foreach name="groups" item="group">
                                    <eq name="group.id" value="$vo['groupid']">{$group.name}</eq>
                                </foreach>
                            </td>
                            <td>{$vo.province}</td>
                            <td>{$vo.city}</td>
                            <td>{$vo.subscribe_time|time_format}</td>
                            <td>
                                <a class="btn blue btn-xs dialog-popup" href="{:U('editremark',array('openid'=>$vo['openid'],'token'=>$token,'remark'=>$vo['remark']))}">修改备注</a>
                                <a class="btn blue btn-xs dialog-popup" href="{:U('moveuser',array('openid'=>$vo['openid'],'token'=>$token,'groupid'=>$vo['groupid']))}">移动到分组</a>
                                <a class="btn blue btn-xs dialog-popup" href="{:U('LuckMoney/send',array('openid'=>$vo['openid'],'token'=>$token))}">发送红包</a>
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
        <div class="page">
            <div class="pagination pagination-right">
                {$_page|default=''}
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script>
        $(function(){
        })
</script>
@stop