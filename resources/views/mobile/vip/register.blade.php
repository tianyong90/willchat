<extend name="base"/>
<block name="main-content">
  <div class="am-container">
    <form action="__SELF__" class="edit-form">
      <volist name="fieldsconfig.field_list" id="vo">
        <if condition="$fieldsinfo[$vo]['type'] eq 'string'" >
          <!-- 文本类型 -->
          <div class="am-input-group">
            <span class="am-input-group-label">{$fieldsinfo[$vo]['title']}</span>
            <input type="text" class="am-form-field" name="{$vo}" value="" placeholder="{$fieldsinfo[$vo]['placeholder']}" pattern="{$fieldsinfo[$vo]['pattern']}" <in name="vo" value="$fieldsconfig.required_list">required</in>>
          </div>
        <elseif condition="$fieldsinfo[$vo]['type'] eq 'password'" />
          <!-- 密码类型 -->
          <div class="am-input-group">
            <span class="am-input-group-label">{$fieldsinfo[$vo]['title']}</span>
            <input type="password" class="am-form-field" id="{$vo}" name="{$vo}" value="" placeholder="{$fieldsinfo[$vo]['placeholder']}" <in name="vo" value="$fieldsconfig.required_list">required</in>>
          </div>
          <div class="am-input-group">
            <span class="am-input-group-label">确认{$fieldsinfo[$vo]['title']}</span>
            <input type="password" class="am-form-field" data-equal-to="#{$vo}" name="re{$vo}" value="" placeholder="请确认密码" <in name="vo" value="$fieldsconfig.required_list">required</in>>
          </div>
        <elseif condition="$fieldsinfo[$vo]['type'] eq 'datepicker'" />
          <!-- 生日 -->
          <div class="am-input-group">
            <span class="am-input-group-label">{$fieldsinfo[$vo]['title']}</span>
            <input type="text" class="am-form-field datepicker" name="{$vo}" value="" readonly placeholder="{$fieldsinfo[$vo]['placeholder']}" <in name="vo" value="$fieldsconfig.required_list">required</in>>
          </div>
        <elseif condition="$fieldsinfo[$vo]['type'] eq 'select'" />
          <!-- 选择 -->
          <div class="am-input-group">
            <span class="am-input-group-label">{$fieldsinfo[$vo]['title']}</span>
            <select class="am-form-field" name="sex" <in name="vo" value="$fieldsconfig.required_list">required</in>>
              <foreach name="fieldsinfo[$vo]['options']" item="v" key="k">
                <option value="{$k}">{$v}</option>
              </foreach>
            </select>
          </div>
        </if>
      </volist>
      <button class="am-btn am-btn-primary am-btn-block am-radius submit-ajax" type="submit">提交</button>
    </form>
  </div>
</block>
<block name="script">
  <script>
    $(function () {
      var nowTemp = new Date();
      var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

      //设置日期选择控件
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        onRender: function(date) {
          return date.valueOf() >= now.valueOf() ? 'am-disabled' : '';
        }})
        .on('changeDate.datepicker.amui', function (event) {
          //通过改变生日输入框焦点状态非触发对廖字段的表单验证
          $(this).focus().blur();
      });

      $(document)
              .ajaxStart(function () {
                $(".submit-ajax").html('提交中').addClass('am-disabled');
              })
              .ajaxStop(function () {
                $(".submit-ajax").html('提交').removeClass('am-disabled')
              });
      $("form").validator({
        H5validation: false,
        submit: function () {
          if (this.isFormValid()) {
            var $form = $("form");
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
          } else {
            return false;
          }
        }
      });
    });
  </script>
</block>