@extends('user.public.baseindex')
@section('style')
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-users"></i>卡券列表
      </div>
      <div class="actions">
        <a class="btn default blue-stripe btn-xs" href="{{ user_url('/') }}"><i
              class="fa fa-plus"></i>创建卡券</a>
      </div>
    </div>
    <div class="portlet-body">
      <div class="note note-info">
        <h4 class="block">温馨提示：</h4>
        使用些功能，商户必须开通微信卡券功能，如未开通，请在公众平台进行申请。<br/>
        卡券添加或修改后须微信公众平台审核通过后才能使用。<br/>
      </div>
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th>#</th>
            <th>卡券名称</th>
            <th>卡券类型</th>
            <th>状态</th>
            <th>更新时间</th>
            <th>总库存</th>
            <th>当前库存</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <volist name="cardlist" id="item">
            <?php $temp = strtolower($item['card_type']) ?>
            <tr>
              <td>{$i}</td>
              <td>{$item[$temp]['base_info']['title']}</td>
              <td>{$item.card_type|get_card_type}</td>
              <td>{$item[$temp]['base_info']['status']|get_card_status}</td>
              <td>{$item[$temp]['base_info']['update_time']|date="Y-m-d H:i",###}</td>
              <td>{$item[$temp]['base_info']['sku']['total_quantity']}</td>
              <td>{$item[$temp]['base_info']['sku']['quantity']}</td>
              <td>
                <a class="btn blue btn-xs dialog-popup"
                   href="{{ user_url('/') }}">查看二维码</a>
                <a class="btn blue btn-xs dialog-popup"
                   href="{{ user_url('/') }}">更新库存</a>
                <a class="btn blue btn-xs"
                   href="{{ user_url('/') }}">编辑</a>
                <button class="btn red btn-xs btn-delete-confirm"
                        data-link="{{ user_url('/') }}">
                  删除
                </button>
              </td>
            </tr>
          </volist>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop