<extend name="base"/>
<block name="style">
</block>
<block name="main-content">
  <!-- Slider -->
  <!-- <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='{"directionNav":true}'>
      <ul class="am-slides">
          <volist name="flash" id="so">
          <li><a href="{$so.url|default='javascript:void(0)'}">
              <notempty name="giftinfo.PhotoUrl">
              <img class="giftimg" src="{$luckurl}{$giftinfo.PhotoUrl}" alt="{$giftinfo.GiftName}" />
              <else/>
              <img class="giftimg" src="{:RES."/card/images/nopic.jpg"}" alt="暂无图片" />
              </notempty>
          </a></li>
          </volist>
      </ul>
  </div> -->
  <!-- Slider -->
  <figure data-am-widget="figure" class="am am-figure am-figure-default " data-am-figure="{ pureview:'auto'}">
    <notempty name="giftinfo.PhotoUrl">
      <img class="giftimg" src="{$giftinfo.PhotoUrl}" alt="{$giftinfo.GiftName}"/>
      <else/>
      <img class="giftimg" src="{:RES."/card/images/nopic.jpg"}" alt="暂无图片"
      data-rel="{:RES."/card/images/nopic.jpg"}"/>
    </notempty>
    <figcaption class="am-figure-capition-btm">{$giftinfo.GiftName}</figcaption>
  </figure>
  <div class="am-container">
    <ul class="am-list gift-info">
      <li>礼品名称：{$giftinfo.GiftName}</li>
      <li>所需积分：{$giftinfo.Point}</li>
      <li>发送方式：邮寄</li>
    </ul>
  </div>
  <div class="am-container">
    <div class="am-container">
      <h4>填写信息兑换礼品。</h4>
    </div>
    <form action="__SELF__" class="edit-form">
      <div class="am-input-group">
        <span class="am-input-group-label">兑换数量</span>
        <input type="number" class="am-form-field" name="amount" id="amount" value="" placeholder="请输入要兑换的数量">
      </div>
      <div class="am-input-group">
        <span class="am-input-group-label">姓名</span>
        <input type="text" class="am-form-field" name="name" id="name" value="" placeholder="请输入收件人姓名">
      </div>
      <div class="am-input-group">
        <span class="am-input-group-label">联系电话</span>
        <input type="number" class="am-form-field" name="phone" id="phone" value="" placeholder="请输入联系电话">
      </div>
      <div class="am-input-group">
        <span class="am-input-group-label">邮政编码</span>
        <input type="number" class="am-form-field" name="postcode" id="postcode" value="" placeholder="请输入邮政编码">
      </div>
      <div class="am-input-group">
        <span class="am-input-group-label">联系地址</span>
                <textarea name="address" id="address" cols="30" rows="2" class="am-form-field"
                          placeholder="请输入联系地址"></textarea>
      </div>
      <input class="am-btn am-btn-primary am-btn-block am-radius submit-ajax" type="submit" value="现在兑换"/>
    </form>
  </div>
</block>

<block name="script">
  <script>
    $(function () {
      $(document)
              .ajaxStart(function () {
                $(".submit-ajax").val('提交中').addClass('am-disabled');
              })
              .ajaxStop(function () {
                $(".submit-ajax").val('提交').removeClass('am-disabled')
              });

      $("form").submit(function (event) {
        var $form = $(this);
        var url = $form.attr('action');
        var submitdata = $form.serialize();
        $.post(url, submitdata, function (data) {
          layer.open({
            content: data.info,
            time: 2,
            end: function () {
              if (data.status) {
                window.location.href = data.url;
              }
            }
          });
        }, 'json');
        return false;
      });
    });
  </script>
</block>