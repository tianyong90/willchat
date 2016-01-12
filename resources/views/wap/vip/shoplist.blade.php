<extend name="base"/>
<block name="main-content">
  <div class="am-container">
    <ul class="am-list" id="shop-list">
      <volist name="shoplist" id="item">
        <li>
          <a href="{:U('Wap/Card/shopinfo',array('token'=>$token,'wecha_id'=>$wecha_id,'shopid'=>$item['ID']))}">
            <span>{$item.Name}</span>
          </a>
        </li>
      </volist>
    </ul>
  </div>
</block>