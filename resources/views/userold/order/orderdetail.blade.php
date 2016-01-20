<extend name="Public/dcontentbase"/>
@section('style')
  <style>
    .dialog-content {
      overflow-x: hidden;
    }
  </style>
@stop
<block name="content">
  <!-- BEGIN PAGE CONTENT-->
  <div class="dialog-content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="invoice">
      <div class="row">
        <div class="col-xs-6">
          <p>
            {$info.out_trade_no} <br/> {$info.create_time|date='Y-m-d',###}
          </p>
        </div>
      </div>
      <hr/>
      <div class="row">
        <div class="col-xs-4">
          <h3>收货信息:</h3>
          <ul class="list-unstyled">
            <li>
              <strong>姓名:</strong> {$info.realname}
            </li>
            <li>
              <strong>电话:</strong> {$info.mobile}
            </li>
            <li>
              <strong>地址:</strong> {$info.address}
            </li>
            <li>
              <strong>留言:</strong> {$info.remark}
            </li>
          </ul>
        </div>
        <div class="col-xs-4">
          <h3>订单状态:</h3>
          <ul class="list-unstyled">
            <li>
              {$info.status|get_order_status_title}
            </li>
            <notempty name="info.logistics_name">
              <li>物流类型：{$info.logistics_name}</li>
              <li>物流单号：{$info.logistics_number}</li>
            </notempty>
          </ul>
        </div>
        <div class="col-xs-4 invoice-payment">
          <h3>支付详情:</h3>
          <ul class="list-unstyled">
            <notempty name="info.pay_time">
              <li>
                <strong>支付时间:</strong> {$info.pay_time|date="Y-m-d H:i:s",###}
              </li>
              <li>
                <strong>支付方式:</strong>
                <eq name="info.paymode" value="wxpay">
                  微信支付
                  <else/>
                  会员余额支付
                </eq>
              </li>
              <else/>
              <li>
                <strong>待支付</strong>
              </li>
            </notempty>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th>
                #
              </th>
              <th>
                商品名
              </th>
              <th>
                商品属性
              </th>
              <th class="hidden-480">
                数量
              </th>
              <th class="hidden-480">
                单价(元)
              </th>
              <th>
                小计(元)
              </th>
            </tr>
            </thead>
            <tbody>
            <volist name="info.goods_detail" id="vo">
              <tr>
                <td>
                  {$key}
                </td>
                <td>
                  {$vo.goods_name}
                </td>
                <td>
                  {$vo.attribute}
                </td>
                <td class="hidden-480">
                  {$vo.amount}
                </td>
                <td class="hidden-480">
                  {$vo.price}
                </td>
                <td>
                  {$vo['price']*$vo['amount']}
                </td>
              </tr>
            </volist>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-8 invoice-block pull-right">
          <ul class="list-unstyled">
            <li>
              <strong>商品总价:</strong> ￥ {$info.goods_fee}
            </li>
            <li>
              <strong>运费:</strong> ￥ {$info.freight}
            </li>
            <li>
              <strong>总计:</strong> ￥ {$info['goods_fee']+$info['freight']}
            </li>
          </ul>
          <br/>
          <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
            打印 <i class="fa fa-print"></i>
          </a>
        </div>
      </div>
    </div>
    <!-- END PAGE CONTENT-->
  </div>
  <!-- END PAGE CONTENT-->
  @stop
  @section('script')
    <script src="{{ asset('static') }}/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js"
            type="text/javascript"></script>
    <script src="{{ asset('static') }}/metronic/global/plugins/jquery-validation/js/localization/messages_zh.min.js"
            type="text/javascript"></script>
    <script>
      $(function () {

      })
    </script>
@stop