<extend name="Public/dcontentbase"/>
@section('style')
  <link rel="stylesheet" type="text/css"
        href="{{ asset('static') }}/metronic/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
@stop
<block name="content">
  <!-- BEGIN PAGE CONTENT-->
  <div class="dialog-content form">
    <form action="__SELF__" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>标题</label>
          <input type="text" name="title" value="{$info.title}" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>通知内容</label>
          <textarea name="content" id="" cols="30" rows="5" class="form-control">{$info.content}</textarea>
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>截止日期</label>

          <div class="input-group input-medium" id="deadline">
            <input type="text" name="deadline" value="{$info.deadline|date='Y-m-d',###}" class="form-control" readonly>
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
          </div><!--
                    <input type="text" name="deadline" value="{$info.deadline}" class="form-control" placeholder=""> -->
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>排序</label>
          <input type="text" name="sort" value="{$info.sort}" class="form-control input-small" placeholder="">
          <span class="help-block">值越大越靠前</span>
        </div>
        <div class="form-group">
          <label>启用状态</label>

          <div class="radio-list">
            <label class="radio-inline">
              <input type="radio" name="status" value="1" checked> 正常 </label>
            <label class="radio-inline">
              <input type="radio" name="status" value="0"
              <eq name="info.status" value="0">checked</eq>
              > 禁用 </label>
          </div>
        </div>
      </div>
      <div class="form-actions">
        <input type="hidden" name="id" value="{$info.id}"/>
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-danger btn-closedialog">取消</button>
      </div>
    </form>
  </div>
  <!-- END PAGE CONTENT-->
  @stop
  @section('script')
    <script type="text/javascript"
            src="{{ asset('static') }}/metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script>
      $(function () {
        $('input[name="deadline"]').datepicker({
          format: 'yyyy-mm-dd',
          weekStart: 1,
          autoclose: true,
          todayBtn: 'linked',
          language: 'zh-CN',
          startDate: '0d'
        });
      })
    </script>
@stop