@extends('user.layouts.dialogframe')
@section('main')
  <div class="dialog-content form">
    @if(isset($id))
    <form action="{{ user_url('fan_group/edit/'.$id) }}" method="post">
    @else
    <form action="{{ user_url('fan_group/create') }}" method="post">
    @endif
      <div class="form-body">
        <div class="form-group">
          <label>分组名称</label>
          <input type="text" name="name" value="{{ $name or '' }}" class="form-control" placeholder="请输入分组名称">
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-danger btn-closedialog">取消</button>
      </div>
    </form>
  </div>
@endsection