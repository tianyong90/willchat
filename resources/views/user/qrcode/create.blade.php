@extends('user.layouts.base')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-qrcode"></i> 创建二维码
      </div>
      <div class="actions">
      </div>
    </div>
    <div class="portlet-body form">
      <form action="" method="post">
        <div class="form-body">
          <div class="form-group">
            <label>二维码类型</label>
            <select name="type" id="type" class="form-control">
              <option value="1">永久二维码</option>
              <option value="0">临时二维码</option>
            </select>
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label>二维码参数</label>
            <input type="text" name="keyword" value="" class="form-control" placeholder="">
            <span class="help-block"></span>
          </div>
          <div class="form-group" id="expr">
            <label>有效期</label>
            <input type="text" name="expire" value="" class="form-control" placeholder="">
            <span class="help-block">临时二维码的有效期，单位为秒</span>
          </div>
          <div class="form-group">
            <label>备注</label>
            <input type="text" name="description" value="" class="form-control" placeholder="">
            <span class="help-block"></span>
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">保存</button>
          <button type="button" class="btn btn-danger btn-closedialog">取消</button>
        </div>
      </form>
    </div>
  </div>
  @endsection
  @section('js')
    <script>
      $(function () {
        //根据菜单类型显示或隐藏相应的输入项
        var changeFields = function (type) {
          if (type === '1') {
            $('div#expr').hide();
          } else {
            $('div#expr').show();
          }
          ;
        };
        //初始时根据类型显示或隐藏相应输入项
        changeFields($('select#type').val());
        //类型改变时根据类型显示或隐藏相应输入项
        $('select#type').change(function (event) {
          changeFields($(this).val());
        });
      })
    </script>
@stop