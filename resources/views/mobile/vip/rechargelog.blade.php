<extend name="base"/>
<block name="main-content">
  <div class="am-container" id="search-box">
    <form action="__SELF__" class="search-form">
      <div class="am-u-sm-10">
        <div class="am-input-group">
          <span class="am-input-group-label">起</span>
          <input type="text" name="startdate" id="startdate" class="am-form-field" placeholder="起始日期" readonly/>
        </div>
        <div class="am-input-group">
          <span class="am-input-group-label">止</span>
          <input type="text" name="enddate" id="enddate" class="am-form-field" placeholder="截止日期" readonly/>
        </div>
      </div>
      <button type="reset" class="am-u-sm-2 am-btn am-btn-danger am-btn-sm">
        <i class="am-icon-undo"></i>
      </button>
      <button type="submit" id="search-btn" class="am-u-sm-2 am-btn am-btn-primary am-btn-sm">
        <i class="am-icon-search"></i>
      </button>
    </form>
  </div>
  <div class="am-container" id="history">
    <notempty name="list">
      <ul class="am-list">
        <volist name="list" id="vo">
          <li>
            <div class="am-container">
              <span class="">{$vo.CreateTime|str_time_format}</span>
            </div>
            <div class="am-g">
                            <span class="am-u-sm-9">
                            <span class="total-money">{$vo.PayMoney}</span>
                            </span>
              <a class="am-u-sm-3 am-badge am-badge-success"
                 href="{:U('rechargedetail',array('token'=>$token,'openid'=>$openid,'id'=>$vo['ID']))}">查看详情</a>
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
  </div>
</block>
<block name="script">
  <script>
    $(function () {
      $(document)
              .ajaxStart(function () {
                $("#search-btn").addClass('am-disabled');
                layer.open({
                  content: "努力查询中……"
                });
              })
              .ajaxStop(function () {
                $("#search-btn").removeClass('am-disabled');
                layer.closeAll();
              });

      var startdata = new Date();
      var enddate = new Date();
      $('#startdate').datepicker().
              on('changeDate.datepicker.amui', function (event) {
                if (event.date.valueOf() > enddate.valueOf()) {
                  alert("开始日期应小于结束日期！");
                } else {
                  startdata = new Date(event.date);
                }
                $(this).datepicker('close');
              });

      $('#enddate').datepicker().
              on('changeDate.datepicker.amui', function (event) {
                if (event.date.valueOf() < startdata.valueOf()) {
                  alert("结束日期应大于开始日期！");
                } else {
                  enddate = new Date(event.date);
                }
                $(this).datepicker('close');
              });

      //查询后更新结果
      $(".search-form").submit(function (event) {
        var $form = $(this);
        var url = $form.attr('action');
        var submitdata = $form.serialize();
        $.post(url, submitdata, function (data) {
          $("#history").html(data);
        }, 'html');
        return false;
      });

    });

  </script>
</block>