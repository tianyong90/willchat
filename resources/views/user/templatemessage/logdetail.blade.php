<extend name="Public/dcontentbase"/>
@section('style')
  <style type="text/css">
    .dialog-content {
      width: 600px;
      font-family: "微软雅黑";
    }

    ul, li {
      list-style: none;
      display: block;
      padding: 5px;
      margin: 0;
    }

    li .title {
      color: #00f;
    }

    .preview {
      font-size: 16px;
      color: #444;
    }
  </style>
@stop
<block name="content">
  <div class="dialog-content">
    <ul>
      <li><span class="title">接收者昵称：</span>{$info.nickname}</li>
      <li><span class="title">发送时间：</span>{$info.creatre_time|time_format}</li>
      <li><span class="title">消息类型：</span>{$msgtype[$info['msg_type']]}</li>
      <li><span class="title">模板ID：</span>{$info.tpl_id}</li>
      <li><span class="title">发送结果：</span>
        <eq name="info.result" value="1">发送成功
          <else/>
          发送失败
        </eq>
      </li>
      <eq name="info.result" value="0">
        <li><span class="title">错误信息：</span><span class="font-red">{$info.remark}</span></li>
      </eq>
      <li>
        <h4>消息内容</h4>

        <div class="preview">{$previewinfo}</div>
      </li>
    </ul>

  </div>
@stop