<notempty name="sku_attr">
    <foreach name="sku_attr" item="item">
        <tr data-key="{$item.attr_id}">
            <td>
                {$item.name}
            </td>
            <td>
                <input class="sku-price" type="text" name="sku_price[{$item.attr}]" value="{$item.price}">
            </td>
        </tr>
    </foreach>
<else/>
    <tr class="no-data">
        <td colspan="4" style="text-align:center;">还没有设置SKU价格</td>
    </tr>
</notempty>