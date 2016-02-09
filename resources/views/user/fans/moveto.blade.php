@extends('user.layouts.dialogframe')
@section('style')
  <style>
  </style>
@stop
@section('main')
  <div class="dialog-content form">
    <form action="" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>选择目标分组</label>
          <select name="groupid" class="form-control">
            @foreach($groups as $key => $group)
              <option value="{{ $group['id'] }}" >{{ $group['name'] }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-danger btn-closedialog">取消</button>
      </div>
    </form>
  </div>
@endsection