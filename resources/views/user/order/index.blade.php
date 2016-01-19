@extends('user.public.baseindex')
@section('style')
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-list"></i> 订单列表
      </div>
    </div>
    <div class="portlet-body">
      <table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
        <tr>
          <th class="table-checkbox">
            <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
          </th>
          <th>订单号</th>
          <th>会员卡号</th>
          <th>姓名</th>
          <th>电话</th>
          <th>总价（元）</th>
          <th>状态</th>
          <th>支付方式</th>
          <th>创建时间</th>
          <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <notempty name="list">
          <volist name="list" id="vo">
            <tr class="odd gradeX">
              <td><input type="checkbox" value="{$vo.id}" class="cbitem" name="id_{$i}"></td>
              <td>{$vo.out_trade_no}</td>
              <td>{$vo.cardnumber|default="无"}</td>
              <td>{$vo.realname}</td>
              <td>{$vo.mobile}</td>
              <td>{$vo['goods_fee']+$vo['freight']}</td>
              <td>{$vo.status|get_order_status_title}</td>
              <td>{$vo.pay_type|get_paytype_title}</td>
              <td>{$vo.create_time|time_format}</td>
              <td>
                <a class="btn blue btn-xs dialog-popup"
                   href="{{ user_url('/') }}">详情</a>
                <eq name="vo.status" value="2">
                  <a class="btn blue btn-xs dialog-popup"
                     href="{{ user_url('/') }}">发货</a>
                </eq>
                <eq name="vo.status" value="1">
                  <button class="btn red btn-xs btn-delete-confirm"
                          data-link="{{ user_url('/') }}">删除
                  </button>
                </eq>
              </td>
            </tr>
          </volist>
          <else/>
          <tr>
            <td colspan="70" style="text-align:center;">暂无数据</td>
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
    $(function () {

    })
  </script>
@stop