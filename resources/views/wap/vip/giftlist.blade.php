<extend name="base"/>
<block name="main-content">
  <div class="am-container">
    <ul class="am-list" id="gift-list">
      <volist name="giftlist" id="item">
      <li class="am-g">
        <a href="{:U('giftexchange',array('token'=>$token,'openid'=>$openid,'shopid'=>$item['ShopID'],'giftid'=>$item['ID']))}">
        <img class="gift-pic" src="{$item.PhotoUrl}" alt="">
        <h3 class="gift-name">{$item.GiftName}</h3>
        <span class="am-badge am-badge-primary am-round">需要{$item.Point}积分</span>
        </a>
      </li>
      </volist>
    </ul>
    <notempty name="pagecount">
    <ul data-am-widget="pagination" class="am-pagination am-pagination-select">
      <li class="am-pagination-prev ">
        <eq name="p" value='1'>
        <a href="javascript:;" class="isfirstpage">上一页</a>
        <else/>
        <a href="{:U('',array('token'=>$token,'openid'=>$openid,'cid'=>$_GET['cid'],'p'=>$p-1))}" class="">上一页</a>
        </eq>
      </li>
      <li class="am-pagination-select">
        <select class="pagination">
          <for start="1" end="$pagecount+1">
          <option value="{:U('',array('token'=>$token,'openid'=>$openid,'cid'=>$_GET['cid'],'p'=>$i))}" <eq name="i" value="$p">selected</eq>>{$i}/{$pagecount}</option>
          </for>
        </select>
      </li>
      <li class="am-pagination-next ">
        <eq name="p" value='$pagecount'>
        <a href="javascript:;" class="islastpage">下一页</a>
        <else/>
        <a href="{:U('',array('token'=>$token,'openid'=>$openid,'cid'=>$_GET['cid'],'p'=>$p+1))}" class="">下一页</a>
        </eq>
      </li>
    </ul>
    </notempty>
  </div>
</block>
<block name="script">
  <script src="__JS__/MemberCard/pagination.js"></script>
</block>