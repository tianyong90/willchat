<extend name="base"/>
<block name="main-content">
  <div class="am-container">
    <div class="am-panel am-panel-primary" style="margin-top:10px;">
      <div class="am-panel-hd">
        <h3 class="am-panel-title">{$shopinfo.Name}&nbsp;&nbsp;详情</h3>
      </div>
      <div class="am-panel-bd">
        <ul class="am-list">
          <li>店铺名：{$shopinfo.Name}</li>
          <li>所在省：{$shopinfo.Province}</li>
          <li>所在市：{$shopinfo.City}</li>
          <li>所在区（县）：{$shopinfo.District}</li>
          <li>详细地址：{$shopinfo.Address}</li>
          <li>联系电话：{$shopinfo.Telephone}</li>
        </ul>
      </div>
    </div>
  </div>
</block>