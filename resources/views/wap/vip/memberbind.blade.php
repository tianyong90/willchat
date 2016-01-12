<extend name="base"/>
<block name="main-content">
  <div class="am-container">
    <form action="__SELF__" class="edit-form">
      <div class="am-input-group">
        <span class="am-input-group-label">绑定卡号</span>
        <input type="text" class="am-form-field" name="cardnumber" id="cardnumber" placeholder="请输入要绑定的卡号" required>
      </div>
      <div class="am-input-group">
        <span class="am-input-group-label">登录密码</span>
        <input type="password" class="am-form-field" name="luckpwd" id="luckpwd" placeholder="请输入登录密码" required>
      </div>
      <button class="am-btn am-btn-primary am-btn-block am-radius submit-ajax" type="submit">提交</button>
    </form>
  </div>
</block>
<block name="script">
  <script>
    $(function () {
      $(document)
              .ajaxStart(function () {
                $(".submit-ajax").html('提交中').addClass('am-disabled');
              })
              .ajaxStop(function () {
                $(".submit-ajax").html('提交').removeClass('am-disabled')
              });
      $("form").validator({
        // 是否使用 H5 原生表单验证，不支持浏览器会自动退化到 JS 验证
        H5validation: false,
        patternClassPrefix: 'js-pattern-',
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