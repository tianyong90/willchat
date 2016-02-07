@extends('user.public.dialogframe')
@section('style')
  <style>
  </style>
@stop
@section('main')
  <div class="dialog-content form">
    <form action="" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>粉丝备注</label>
          <input type="text" name="remark" value="{{ $remark }}" class="form-control" placeholder="请输入备注">
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-danger btn-closedialog">取消</button>
      </div>
    </form>
  </div>
@endsection