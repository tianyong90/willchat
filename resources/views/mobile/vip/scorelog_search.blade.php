<notempty name="list">
  <ul class="am-list">
    <volist name="list" id="vo">
      <li data-id="{$vo.Id}">
        <div class="am-container">
          <span class="">{$vo.CreateTime|str_time_format}</span>
        </div>
        <div class="am-g">
                    <span class="am-u-sm-4">
                        积分变化：<span>{$vo.ChangePoint}</span>
                    </span>
                    <span class="am-u-sm-8">
                        备注：<span>{$vo.ChangeInfo}</span>
                    </span>
          <!-- <a data-ajax="false" class="am-u-sm-3 am-badge am-badge-success" href="{:U('scoredetail',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$vo['ID']))}">查看详情</a> -->
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