<extend name="base"/>
<block name="style">
<style>
    body,html {
        background: #fff;
    }
    body {
      padding: 20px 15px;
    }
    .notice-title {
      font-size: 17px;
      text-align: center;
      margin-bottom: 10px;
    }
    .notice-time {
      text-align: center;
      font-size: 13px;
      color: #777;
    }
    .notice-content {
      font-size: 14px;
    }
</style>
</block>
<block name="main-content">
    <h3 class="notice-title">{$info.title}</h3>
    <h6 class="notice-time">{$info.create_time|date='Y-m-d',###}</h6>
    <div class="notice-content">{$info.content}</div>
</block>