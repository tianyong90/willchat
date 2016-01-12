<notempty name="list">
  <ul class="am-list">
    <volist name="list" id="vo">
      <li data-id="{$vo.Id}">
        <div class="am-container">
          <span class="">{$vo.CreateTime|str_time_format}</span>
        </div>
        <div class="am-g">
                    <span class="am-u-sm-9">
           <!--          <span class="order-typr">
                    <eq name="vo.OrderType" value="1">
                        快速消费
                        <else/>
                        产品消费
                    </eq> -->
                        消费单号：{$vo.BillCode}
                    </span>
          <span class="total-money">消费金额：{$vo.DiscountMoney}元</span>

          <!-- <a data-ajax="false" class="am-u-sm-3 am-badge am-badge-success"
             href="{:U('spendingdetail',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$vo['Id']))}">查看详情</a> -->
        </div>
      </li>
    </volist>
  </ul>
  <else/>
  <div class="tips">
    <i class="am-icon-history am-lg"></i>
    <span>没找到相关记录</span>
  </div>
</notempty>