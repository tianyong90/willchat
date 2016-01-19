@extends('user.public.baseindex')
@section('style')
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title tabbable-line">
      <div class="caption">
        <i class="fa fa-line-chart"></i>粉丝行为分析
      </div>
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="{:U('statistics')}">七日行为分析</a>
        </li>
        <li>
          <a href="{:U('statisticsTrend')}">行为趋势分析</a>
        </li>
      </ul>
    </div>
    <div class="portlet-body">
      <div id="chart-seven" class="chart" style="height:500px">
      </div>
    </div>
  </div>
  @stop
  @section('script')
      <!-- ECharts单文件引入 -->
  <script type="text/javascript" src="{{ asset('static') }}/echarts-2.2.0/build/dist/echarts.js"></script>
  <script type="text/javascript">
    $(function () {
    })

    // 路径配置
    require.config({
      paths: {
        echarts: '{{ asset('static') }}/echarts-2.2.0/build/dist'
      }
    });

    // 使用
    require(
        [
          'echarts',
          'echarts/chart/pie'
        ],
        function (ec) {
          // 基于准备好的dom，初始化echarts图表
          var myChart = ec.init(document.getElementById('chart-seven'), 'macarons');

          //后台获取的数据JSON客串解析为对象
          var dataSevenday = {$jsonSevenday} || {};

          option = {
            title: {
              text: '7日粉丝行为分析',
              x: 'center'
            },
            tooltip: {
              trigger: 'item',
              formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
              orient: 'vertical',
              x: 'left',
              data: ['相册访问', '文本请求', '图文请求', '会员卡请求', '微站访问']
            },
            toolbox: {
              show: true,
              feature: {
                dataView: {show: false, readOnly: false},
                magicType: {
                  show: true,
                  type: ['pie']
                },
                restore: {show: true},
                saveAsImage: {show: true}
              }
            },
            calculable: true,
            series: [
              {
                name: '7日粉丝行为',
                type: 'pie',
                radius: '75%',
                center: ['50%', '60%'],
                data: [
                  {value: dataSevenday.album, name: '相册访问'},
                  {value: dataSevenday.text, name: '文本请求'},
                  {value: dataSevenday.img, name: '图文请求'},
                  {value: dataSevenday.member_card_set, name: '会员卡请求'},
                  {value: dataSevenday.home, name: '微站访问'}
                ]
              }
            ]
          };

          // 为echarts对象加载数据
          myChart.setOption(option);
        }
    );
  </script>
@stop