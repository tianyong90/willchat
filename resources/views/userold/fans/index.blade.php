@extends('user.public.base')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-users"></i> 粉丝列表
      </div>
      <div class="actions">
        <!-- <a href="{{ user_url('/') }}" class="btn default blue-stripe fa fa-plus dialog-popup" target-form="ids">批量移动用户</a> -->
      </div>
    </div>
    <div class="portlet-body">
      <div class="note note-info">
        <h4 class="block">特别提示</h4>

        <p>1、由于微信公众平台接口对于调用获取用户列表、编辑用户备注等接口的频率均有限制，请尽量不要太频繁的进行操作。若系统提示已超出接口调用频率限制，请稍隔一段时间后再试。</p>

        <p>2、各接口调用频率限制详情可<a class="font-red" href="https://mp.weixin.qq.com/cgi-bin/loginpage?t=wxm2-login&lang=zh_CN"
                            target="_new">登录微信公众平台</a>，进入开发者中心在接口权限列表中查看。</p>
      </div>
      <table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
        <tr>
          <!--  <th class="table-checkbox">
               <input type="checkbox" class="group-checkable" data-set="#sample_1 .ids"/>
           </th> -->
          <th>头像</th>
          <th>昵称</th>
          <th>备注</th>
          <th>性别</th>
          <th>分组</th>
          <th>省(直辖市)</th>
          <th>城市</th>
          <th>关注时间</th>
          <th>操作</th>
        </tr>
        </thead>
        <tbody>

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