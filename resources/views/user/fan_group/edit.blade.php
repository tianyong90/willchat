@extends('user.public.dialogframe')
@section('style')

@stop
@section('content')
  <div class="dialog-content form">
    <form action="" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>分组名称</label>
          <input type="text" name="name" value="" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-danger btn-closedialog">取消</button>
      </div>
    </form>
  </div>
@stop