<extend name="Public/dcontentbase" />
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('static') }}/metronic/global/plugins/select2/select2.css" />
  <style>
        .dialog-content {
            height: 400px;
        }
  </style>
@stop
<block name="content">
  <!-- BEGIN PAGE CONTENT-->
  <div class="dialog-content form">
    <form class="" role="form" action="__SELF__" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>物流公司名</label>
          <select name="logistics_name" class="form-control select2me" data-placeholder="先择物流">
            <foreach name="express" item="item" key="key">
            <option value="{$key}">{$key}</option>
            </foreach>
          </select>
          <span class="help-block">先择物流或快递公司</span>
        </div>
        <div class="form-group">
          <label>物流单号</label>
          <input type="text" name="logistics_number" value="{$info.logistics_number}" class="form-control" placeholder="">
          <span class="help-block">请填写物流单号</span>
        </div>
      </div>
      <div class="form-actions">
        <input type="hidden" name="id" value={$info.id}/>
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-danger btn-closedialog">取消</button>
      </div>
    </form>
  </div>
  <!-- END PAGE CONTENT-->
@stop
@section('script')
  <script type="text/javascript" src="{{ asset('static') }}/metronic/global/plugins/select2/select2.min.js"></script>
  <script>
    $(function(){
      
    })
  </script>
@stop