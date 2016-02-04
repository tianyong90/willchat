@extends('user.public.base')
@section('style')
  <style>
    #cardqrcode {
      display: block;
      width: 300px;
      margin: 0 auto;
    }

    .dialog-content {
      width: 400px;
    }
  </style>
@stop
@section('main')
  <!-- BEGIN PAGE CONTENT-->
  <div class="dialog-content form">
    <img src="{$qrurl}" id="cardqrcode" alt=""/>
  </div>
  <!-- END PAGE CONTENT-->
  @stop
  @section('js')
    <script>
      $(function () {

      })
    </script>
@stop