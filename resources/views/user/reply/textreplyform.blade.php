@extends('user.layouts.base')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-comment"></i> 文本回复规则
      </div>
      <div class="actions">
      </div>
    </div>
    <div class="portlet-body form">
      <form action="" method="post" class="form-horizontal" role="form">
        <div class="form-body">
          <div class="form-group">
            <label class="col-md-2 control-label">匹配关键词</label>
            <div class="col-md-6">
              <input type="text" name="keywords" class="form-control" placeholder="输入匹配的关键词" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">匹配模式</label>
            <div class="col-md-6">
              <div class="radio-list">
                <label class="radio-inline">
                  <div class="radio"><span class=""><input type="radio" name="optionsRadios" value="option1" checked=""></span></div> 精确匹配 </label>
                <label class="radio-inline">
                  <div class="radio"><span class="checked"><input type="radio" name="optionsRadios" value="option2" checked=""></span></div> 模糊匹配 </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">回复内容</label>
            <div class="col-md-6">
              <textarea class="form-control" name="content" rows="5" placeholder="输入回复内容"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">排序</label>
            <div class="col-md-6">
              <input type="text" name="sort" class="form-control input-small" placeholder="值越大优先级越大" />
            </div>
          </div>
        </div>
        <div class="form-actions">
          <div class="row">
            <div class="col-md-offset-2 col-md-6">
              <button type="submit" class="btn green">保存</button>
              <a href="javascript:history.go(-1);" class="btn default">
                取消 </a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('js')
  <script>
    $(function () {

    })
  </script>
@endsection