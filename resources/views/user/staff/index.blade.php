@extends('user.public.baseindex')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-users"></i>客服列表
      </div>
      <div class="actions">
        <a href="{{ user_url('/') }}" class="btn default blue-stripe btn-xs dialog-popup"><i
              class="fa fa-plus"></i>&nbsp;添加客服</a>
      </div>
    </div>
    <div class="portlet-body">
      <div class="note note-info">
        <h4 class="block">特别提示</h4>

        <p>1、您需要前往公众平台开启多客户功能，仅认证的服务号能开启该功能。</p>

        <p>2、每个公众号最多添加100个客服账号，如有额外需要可<a
              href="http://support.qq.com/cgi-bin/content_new?tid=14120689989637269&num=10&order=0&fid=1048&dispn=1&start=0&pn=1&gb=0"
              target="_blank">申请扩容</a>。</p>

        <p>3、客服账户名一旦设置，将不可更改。</p>

        <p>4、更多信息请<a class="font-red" href="http://dkf.qq.com/" target="_new">查看新手指引</a>。</p></p>
      </div>
      <table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
        <tr>
          <th>工号</th>
          <th>头像</th>
          <th>昵称</th>
          <th>客服账号</th>
          <th>在线状态</th>
          <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <notempty name="list">
          <volist name="list" id="vo">
            <tr>
              <td>{$vo.kf_id}</td>
              <td><img src="{$vo.kf_headimgurl|default='__IMG__/wechatavatar.gif'}" class="preview-small" alt=""></td>
              <td>{$vo.kf_nick}</td>
              <td>{$vo.kf_account}</td>
              <td>
                <in name="vo.kf_id" value="$online_ids">
                  在线
                  <else/>
                  离线
                </in>
              </td>
              <td>
                <a class="btn blue btn-xs dialog-popup"
                   href="{{ user_url('/') }}">修改信息</a>
                <!-- <a class="btn blue btn-xs dialog-popup" href="{{ user_url('/') }}">设置头像</a> -->
                <button class="btn red btn-xs btn-delete-confirm"
                        data-link="{{ user_url('/') }}">删除
                </button>
              </td>
            </tr>
          </volist>
          <else/>
          <tr>
            <td colspan="8" style="text-align:center;">暂无数据</td>
          </tr>
        </notempty>
        </tbody>
      </table>
      <div class="page">
        <div class="pagination pagination-right">
          {$_page|default=''}
        </div>
      </div>
    </div>
  </div>
@stop
@section('script')
  <script>
    $(function () {
    })
  </script>
@stop