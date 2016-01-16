<extend name="base"/>
<block name="main-content">
  <div class="am-container deatil-panel">
    <div class="am-panel am-panel-primary">
      <div class="am-panel-hd">消费记录详情</div>
      <div class="am-panel-bd">
        <ul class="am-list">
          <li>消费订单号：{$info.BillCode}</li>
          <li>消费类型：
            <eq name="info.OrderType" value="1">快速消费
              <else/>
              产品消费
            </eq>
          </li>
          <li>消费时间：{$info.CreateTime|str_time_format}</li>
          <li>会员卡号：{$info.CardID}</li>
          <li>会员姓名：{$info.CardName}</li>
          <li>消费总额：{$info.TotalMoney}</li>
          <li>实付金额：{$info.DiscountMoney}</li>
          <li>积分支付：{$info.PayPoint}</li>
          <li>余额支付：{$info.PayMoney}</li>
          <li>现金支付：{$info.PayCash}</li>
          <li>银联支付：{$info.PayUnion}</li>
          <li>优惠活动名称：{$info.PrivilegeName}</li>
          <li>优惠活动内容：{$info.PrivilegeInfo}</li>
          <li>备注：{$info.Remark}</li>
        </ul>
        <notempty name="goodslist">
          <table class="am-table">
            <thead>
            <tr>
              <th></th>
              <th>名称</th>
              <th>数量</th>
              <th>总价（元）</th>
            </tr>
            </thead>
            <tbody>
            <volist name="goodslist" id="good" key="k">
              <tr>
                <td>{$k}</td>
                <td>{$good[0][GoodsName]}</td>
                <td>{$good[0][Number]|intval}</td>
                <td>{$good[0][TotalMoney]}</td>
              </tr>
            </volist>
            </tbody>
          </table>
        </notempty>
      </div>
    </div>
  </div>
</block>
<block name="script">
  <script>


  </script>
</block>