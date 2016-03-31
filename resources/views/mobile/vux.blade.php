<!doctype html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <title>vux test</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0"/>
  <link rel="stylesheet" href="{{ asset('static/vux/vux.css') }}"/>
</head>
<body>

<script src="{{ asset('static/vue/vue.js') }}"></script>
<iframe src="https://ghbtns.com/github-btn.html?user=tianyong90&repo=willchat&type=star&count=true" frameborder="0" scrolling="0" width="170px" height="20px"></iframe>
<iframe src="https://ghbtns.com/github-btn.html?user=tianyong90&repo=willchat&type=fork&count=true" frameborder="0" scrolling="0" width="170px" height="20px"></iframe>

<div id="demo">
  <group title="test">
    <datetime title="日期" confirm-text="确定" cancel-text="取消"></datetime>
  </group>

  <group title="abc">
    <number title="数量" :min="0" :max="50" :step="10" :value="20"></number>
  </group>
</div>

<script src="{{ asset('static/jquery-2.0.3.min.js') }}"></script>
<script src="{{ asset('static/vux/vux.js') }}"></script>
<script src="{{ asset('static/vux/components/group/index.js') }}"></script>
<script src="{{ asset('static/vux/components/cell/index.js') }}"></script>
<script src="{{ asset('static/vux/components/switch/index.js') }}"></script>
<script src="{{ asset('static/vux/components/range/index.js') }}"></script>
<script src="{{ asset('static/vux/components/picker/index.js') }}"></script>
<script src="{{ asset('static/vux/components/datetime/index.js') }}"></script>
<script src="{{ asset('static/vux/components/rater/index.js') }}"></script>
<script src="{{ asset('static/vux/components/number/index.js') }}"></script>

<script>
  Vue.component('group', vuxGroup);
  Vue.component('cell', vuxCell);
  Vue.component('switch', vuxSwitch);
  Vue.component('datetime', vuxDatetime);
  Vue.component('rater', vuxRater);
  Vue.component('number', vuxNumber);

  new Vue({
    el: '#demo'
  })
</script>
</body>
</html>