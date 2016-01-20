<notempty name="attribute_data">
  <foreach name="attribute_data.cateAttrList" item="item">
    <tr data-key="{$item.attr_id}">
      <td>
        {$item.attr_name}
      </td>
      <td>
        <foreach name="attribute_data.goodsAttrList" item="v" key="kk">
          <eq name="v.category_attr_id" value="$item.attr_id">
            <div class="attr-control">
              <input type="hidden" name="goods_attr[{$item.attr_id}][{$kk}][id]" value="{$v.id}"/>
              <input class="goods_attr" type="text" name="goods_attr[{$item.attr_id}][{$kk}][value]"
                     value="{$v.value}"/>
              <span class="btn-delete-attr fa fa-times"></span>
            </div>
          </eq>
        </foreach>
        <span class="btn-add-attr fa fa-plus"></span>
      </td>
    </tr>
  </foreach>
  <else/>
  <tr class="no-data">
    <td colspan="4" style="text-align:center;">还没有添加属性</td>
  </tr>
</notempty>