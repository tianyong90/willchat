<extend name="base"/>
<block name="main-content">
  <div id="sign-banner">
    <img src="{$toppic}" alt=""/>

    <div id="sign-msg">
    </div>
    <neq name="todaySigned" value="1">
      <a href="javascript:void(0);" class="am-btn am-btn-primary am-round" id="sign-btn">点击这里签到赚积分</a>
      <else/>
      <a href="javascript:void(0);" class="am-btn am-btn-danger am-round" id="sign-btn">今天您已经签到过了</a>
    </neq>
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
      $("#sign-btn").click(function () {
        $.post('{:U("Wap/Card/addSign",array("token"=>$token,"wecha_id"=>$wecha_id,"cardid"=>$thisCard["id"]))}', null,
                function (data) {
                  if (data.status) {
                    showMsg(data.info);
                    setTimeout('refresh()', 2000);
                    return;
                  } else {
                    showMsg(data.info);
                    return;
                  }
                },
                "json");
      });
    });
    function showMsg(msg) {
      $("#sign-msg").html(msg).stop().fadeIn(100, function () {
        var _self = $(this);
        setTimeout(function () {
          _self.hide(100)
        }, 1500);
      });
    }
    function refresh() {
      location.reload();
    }
  </script>
</block>