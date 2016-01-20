<!DOCTYPE html>
<!--[if IE 8]>
<html lang="zh-cn" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="zh-cn" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-cn">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8"/>
  <title>订单详情{$info.orderid}</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta content="" name="description"/>
  <meta content="" name="author"/>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="{{ asset('static') }}/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('static') }}/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('static') }}/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
        type="text/css"/>
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link href="{{ asset('static') }}/metronic/assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>
  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link href="{{ asset('static') }}/metronic/assets/global/css/components.css" id="style_components" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('static') }}/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('static') }}/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
  <!-- END THEME STYLES -->
  <link rel="shortcut icon" href="favicon.ico"/>
  <style>
    .page-container {
      width: 700px;
      height: 400px;
      display: block;
      overflow-y: auto;
    }
  </style>
</head>
<body style="overflow:scroll;">
<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper orderdetail">
    <div class="page-content">
      <!-- BEGIN PAGE CONTENT-->
      <div class="invoice">
        <div class="row">
          <div class="col-xs-6">
            <p>
              {$info.orderid} <br/> {$info.create_time|date='Y-m-d',###}
            </p>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-xs-4">
            <h3>收货信息:</h3>
            <ul class="list-unstyled">
              <li>
                <strong>姓名:</strong> {$info.truename}
              </li>
              <li>
                <strong>电话:</strong> {$info.tel}
              </li>
              <li>
                <strong>地址:</strong> {$info.address}
              </li>
              <li>
                <strong>备注:</strong> {$info.remark}
              </li>
            </ul>
          </div>
          <div class="col-xs-4">
            <h3>订单状态:</h3>
            <ul class="list-unstyled">
              <li>
                {$info.status|get_order_status}
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
                <th class="hidden-480">
                  数量
                </th>
                <th class="hidden-480">
                  单价(元)
                </th>
                <th>
                  总价(元)
                </th>
              </tr>
              </thead>
              <tbody>
              <foreach name="goods_detail.pid" item="item" key="key">
                <tr>
                  <td>
                    {$key}
                  </td>
                  <td>
                    {$goods_detail['pname'][$key]}
                  </td>
                  <td class="hidden-480">
                    {$goods_detail['pcount'][$key]}
                  </td>
                  <td class="hidden-480">
                    <empty name="fans">
                      {$goods_detail['pprice'][$key]}<br/>
                      <else/>
                      {$goods_detail['pvprice'][$key]}<br/>
                    </empty>
                  </td>
                  <td>
                    <empty name="fans">
                      {$goods_detail['pprice'][$key]*$goods_detail['pcount'][$key]}
                      <else/>
                      {$goods_detail['pvprice'][$key]*$goods_detail['pcount'][$key]}
                    </empty>
                  </td>
                </tr>
              </foreach>
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
  </div>
  <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!--[if lt IE 9]>
<script src="{{ asset('static') }}/metronic/assets/global/plugins/respond.min.js"></script>
<script src="{{ asset('static') }}/metronic/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{ asset('static') }}/metronic/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/assets/global/plugins/jquery-migrate.min.js"
        type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ asset('static') }}/metronic/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"
        type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
<script
    src="{{ asset('static') }}/metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
    type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/assets/global/plugins/jquery.blockui.min.js"
        type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/assets/global/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="{{ asset('static') }}/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script>
  jQuery(document).ready(function () {
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
  });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>