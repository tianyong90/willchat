<notempty name="list">
  <ul class="am-list">
    <volist name="list" id="vo">
      <li>
        <div class="am-container">
          <span class="">{$vo.CreateTime|str_time_format}</span>
        </div>
        <div class="am-g">
            <span class="am-u-sm-9">
            <span class="total-money">{$vo.PayMoney}</span>
            </span>
          <a class="am-u-sm-3 am-badge am-badge-success"
             href="{:U('rechargedetail',array('token'=>$token,'openid'=>$openid,'id'=>$vo['ID']))}">查看详情</a>
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