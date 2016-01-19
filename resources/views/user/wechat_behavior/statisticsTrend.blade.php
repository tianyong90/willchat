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
        <li>
          <a href="{{ user_url('/') }}">七日行为分析</a>
        </li>
        <li class="active">
          <a href="{{ user_url('/') }}">行为趋势分析</a>
        </li>
      </ul>
    </div>
    <div class="portlet-body">
      <div id="chartmain" class="chart" style="height:400px">
      </div>
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <tr>
            <th>模块</th>
            <th>上一周期</th>
            <th>本周期</th>
            <th>趋势</th>
          </tr>
          <pigcmslist array="list" foreach="list">
            <tr>
              <td>{$list.name}</td>
              <td align="center">{$list.lastcount}</td>
              <td align="center">{$list.count}</td>
              <td align="center">
                <?php if ($list['count'] > $list['lastcount']) {
                  echo '<span style="color:#f30;font-size:14px;font-weight:bold">↑</span>';
                } elseif ($list['count'] < $list['lastcount']) {
                  echo '<span style="color:green;font-size:14px;font-weight:bold">↓</span>';
                } else {
                  echo '-';
                }
                ?>
              </td>
            </tr>
          </pigcmslist>
        </table>
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
          'echarts/chart/bar'
        ],
        function (ec) {
          // 基于准备好的dom，初始化echarts图表
          var myChart = ec.init(document.getElementById('chartmain'), 'macarons');

          //后台获取的数据JSON客串解析为对象
          var lastWeek = {$jsonLastweek} || {};
          var thisWeek = {$jsonThisweek} || {};

          var option = {
            theme: "macarons",
            tooltip: {
              show: true
            },
            legend: {
              data: ['上周', '本周']
            },
            toolbox: {
              show: true,
              feature: {
                mark: {show: false},
                dataView: {show: false, readOnly: false},
                magicType: {show: true, type: ['bar']},
                restore: {show: true},
                saveAsImage: {show: true}
              }
            },
            xAxis: [
              {
                type: 'category',
                data: [
                  '相册',
                  '文本请求',
                  '帮助请求',
                  '图文请求',
                  '会员卡',
                  '主页访问'
                ]
              }
            ],
            yAxis: [
              {
                type: 'value'
              }
            ],
            series: [
              {
                "name": "上周",
                "type": "bar",
                "data": [lastWeek.album, lastWeek.text, lastWeek.help, lastWeek.img, lastWeek.member_card_set, lastWeek.home]
              },
              {
                "name": "本周",
                "type": "bar",
                "data": [thisWeek.album, thisWeek.text, thisWeek.help, thisWeek.img, thisWeek.member_card_set, thisWeek.home]
              }
            ]
          };

          // 为echarts对象加载数据
          myChart.setOption(option);
        }
    );
  </script>
@stop