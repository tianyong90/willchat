<extend name="Public/dcontentbase"/>
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
<block name="content">
  <!-- BEGIN PAGE CONTENT-->
  <div class="dialog-content form">
    <img src="{$qrurl}" id="cardqrcode" alt=""/>
  </div>
  <!-- END PAGE CONTENT-->
  @stop
  @section('script')
    <script>
      $(function () {

      })
    </script>
@stop