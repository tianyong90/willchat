<extend name="base"/>
<block name="main-content">
  <div data-am-widget="map" class="am-map am-map-default" id="map" data-name="{$businessinfo.name}"
       data-address="{$businessinfo.address}" data-longitude="" data-latitude="" data-scaleControl=""
       data-zoomControl="true" data-setZoom="17" data-icon="http://amuituku.qiniudn.com/mapicon.png">
    <div id="bd-map"></div>
  </div>
</block>
<block name="script">
  <script>
    $(function () {
      resetMapsize();
      $(window).resize(function (event) {
        resetMapsize();
      });
    })
    //重设地图尺寸，使调试自适应屏幕，实现满屏显示
    function resetMapsize() {
      var height = $(window).height() - 50;
      $("#map").css('height', height);
    }
    ;
  </script>
</block>