@extends('user.public.baseindex')
@section('style')
    <link rel="stylesheet" href="{{ asset('static') }}/page/page.css" />
@stop
@section('main')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-qrcode"></i> 二维码管理
            </div>
            <div class="actions">
                <a href="{:U('add',array('token'=>$token))}" class="btn default blue-stripe btn-xs dialog-popup"><i class="fa fa-plus"></i>&nbsp;创建二维码</a>
                <button url="{:U('setStatus',array('Model'=>'Qrcode','status'=>-1))}" class="btn default red-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-trash-o"></i>&nbsp;删除</button>
            </div>
        </div>
        <div class="portlet-body">
            <div class="note note-info">
                <h4 class="block">使用提示：</h4>
                <p>
                    此处生成的带参数的二维码分为两种类型:<br>
                    1、临时二维码，是有过期时间的，最长可以设置为在二维码生成后的7天（即604800秒）后过期，但能够生成较多数量。临时二维码主要用于帐号绑定等不要求二维码永久保存的业务场景<br/>
                    2、永久二维码，是无过期时间的，但数量较少（目前为最多10万个）。永久二维码主要用于适用于帐号绑定、用户来源统计等场景。<br />
                </p>
            </div>
            <div class="table-scrollable">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="table-checkbox">
                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .ids"/>
                        </th>
                        <th>关键词</th>
                        <th>备注</th>
                        <th>预览</th>
                        <th>创建时间</th>
                        <th>被扫次数</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <notempty name="list">
                        <volist name="list" id="item">
                            <tr>
                                <td><input class="ids" type="checkbox" value="{$item['id']}" name="ids[]"></td>
                                <td>{$item.keyword}</td>
                                <td>{$item.description}</td>
                                <td><img src="{$item.url}" class="preview-small" /></td>
                                <td>{$item.create_time|time_format}</td>
                                <td>{$item.scancount}</td>
                                <td>
                                    <!-- <a class="btn blue btn-xs download-pic" id="pic1" onclick="downLoadImage("{$item.url}")">下载</a> -->
                                    <button class="btn red btn-xs btn-delete-confirm" data-link="{:U('deleteQrcode',array('token'=>$token,'id'=>$item['id']))}">删除</button>
                                </td>
                            </tr>
                        </volist>
                    <else/>
                        <tr>
                            <td colspan="10" class="row-nodata">您还没有生成过二维码</td>
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
    </div>
@stop