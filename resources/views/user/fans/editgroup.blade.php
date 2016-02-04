@extends('user.public.base')
@section('style')
  <style>
    .dialog-content {
      width: 400px;
    }
  </style>
@stop
@section('main')
  <div class="dialog-content form">
    <form action="__SELF__" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>分组名称</label>
          <input type="text" name="name" value="{$Think.get.name}" class="form-control" placeholder="">
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