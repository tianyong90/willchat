<extend name="base"/>
<block name="main-content">
    <notempty name="list">
        <ul class="am-list" id="notice-list">
            <volist name="list" id="item">
                <li>
                    <a href="{:U('noticecontent',array('token'=>$token,'openid'=>$openid,'noticeid'=>$item['id']))}">
                        <span class="title">{$item.title|msubstr=0,20}</span>
                        <span class="time">{$item.create_time|date='Y-m-d',###}</span>
                    </a>
                </li>
            </volist>
        </ul>
    <else/>
        <span class="nonotice">暂无通知</span>
    </notempty>
</block>