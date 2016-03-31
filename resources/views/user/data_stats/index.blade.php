@extends('user.layouts.base')
@section('style')
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-list"></i> 粉丝增减
      </div>
      <div class="actions">
        <!-- <a href="{{ user_url('menu/create') }}" class="btn default blue-stripe btn-xs dialog-popup dialog-medium"><i class="fa fa-plus"></i>添加菜单</a>
        <a href="javascript:;" id="create-wxmenu" class="btn default green-stripe btn-xa"><i class="fa fa-save"></i>重新生成</a>
        <a href="javascript:;" class="btn default red-stripe btn-xa" id="clear-all"><i class="fa fa-trash-o"></i>清除菜单</a> -->
      </div>
    </div>
    <div class="portlet-body">
      <div class="table-scrollable">

      </div>
    </div>
  </div>
@stop
@section('js')
  <script>
    $(document).ready(function () {


    });
  </script>
@stop