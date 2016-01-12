<extend name="base"/>
<block name="main-content">
  <div class="am-container deatil-panel">
    <div class="am-panel am-panel-primary">
      <div class="am-panel-hd">积分记录详情</div>
      <div class="am-panel-bd">
        <ul class="am-list">
          <li>充值金额：{$info.PayMoney}元</li>
          <li>充值时间：{$info.CreateTime|strlongtostrtime}</li>
          <notempty name="info.BillCode">
            <li>充值单号：{$info.BillCode}</li>
          </notempty>
          <li>会员卡号：{$info.CardID}</li>
          <li>会员姓名：{$info.CardName}</li>
          <li>备注：{$info.Remark}</li>
        </ul>
      </div>
    </div>
  </div>
</block>
<block name="script">
</block>