@extends('user.public.baseindex')
@section('style')
  <link rel="stylesheet" href="{{ asset('static') }}/page/page.css"/>
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-qrcode"></i> 商家二维码管理
      </div>
      <div class="actions">
        <a href="{:U('add',array('token'=>$token,'is_shop_qrcode'=>true))}"
           class="btn default blue-stripe btn-xs dialog-popup"><i class="fa fa-plus"></i>&nbsp;创建二维码</a>
        <button url="{:U('setStatus',array('Model'=>'Qrcode','status'=>-1))}"
                class="btn default red-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-trash-o"></i>&nbsp;删除
        </button>
      </div>
    </div>
    <div class="portlet-body">
      <div class="note note-info">
        <h4 class="block">使用提示：</h4>

        <p>
          1、这里生成的二维码主要用于商家进行推广和统计会员来源<br>
          2、生成的带参数二维码类型均为永久二维码，由于微信公众平台对生成永久二维码数量有限制，请务必珍惜每一次生成二维码的机会，以免超出限制<br>
        </p>
      </div>
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th class="table-checkbox">
              <input type="checkbox" class="group-checkable" data-set="#sample_1 .ids"/>
            </th>
            <th>对应店铺</th>
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
                <td><img src="{$item.url}" class="preview-small"/></td>
                <td>{$item.create_time|time_format}</td>
                <td>{$item.scancount}</td>
                <td>
                  <!-- <a class="btn blue btn-xs download-pic" id="pic1" onclick="downLoadImage("{$item.url}")">下载</a> -->
                  <button class="btn red btn-xs btn-delete-confirm"
                          data-link="{:U('deleteQrcode',array('token'=>$token,'id'=>$item['id']))}">删除
                  </button>
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