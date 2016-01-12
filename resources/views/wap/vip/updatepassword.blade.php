<extend name="base"/>
<block name="main-content">
  <div class="am-container">
    <form action="__SELF__" class="edit-form">
      <div class="am-input-group">
        <span class="am-input-group-label">原密码</span>
        <input type="password" class="am-form-field" name="oldpassword" id="oldpassword" placeholder="请输入原密码" required>
      </div>
      <div class="am-input-group">
        <span class="am-input-group-label">新密码</span>
        <input type="password" class="am-form-field" name="newpassword" id="newpassword" placeholder="请输入新密码"
               minlength="6"
               maxlength="20" required>
      </div>
      <div class="am-input-group">
        <span class="am-input-group-label">确认密码</span>
        <input type="password" class="am-form-field" name="renewpassword" id="renewpassword" placeholder="请再次输入新密码"
               minlength="6" maxlength="20" required data-equal-to="#newpassword">
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