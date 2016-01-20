@extends('user.public.baseindex')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-users"></i>会员卡列表
      </div>
      <div class="actions">
        <a href="{{ user_url('/') }}" class="btn default blue-stripe btn-xs"><i class="fa fa-plus"></i>添加会员卡</a>
      </div>
    </div>
    <div class="portlet-body">
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th>#</th>
            <th>名称</th>
            <th>徽标</th>
            <th>会员人数</th>
            <th>创建时间</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <notempty name="list">
            <volist name="list" id="card">
              <tr>
                <td>{$i}</td>
                <td>{$card.name}</td>
                <td><img src="__ROOT__{$card.logo}" height="30" width="30" alt=""/></td>
                <td>{$card.id|get_member_count}</td>
                <td>{$card.create_time|date='Y-m-d H:i:s',###}</td>
                <td>
                  <a class="btn btn-primary btn-xs"
                     href="{{ user_url('/') }}">会员管理</a>
                  <a class="btn btn-primary btn-xs"
                     href="{{ user_url('/') }}">设计</a>
                  <a class="btn btn-primary btn-xs dialog-popup"
                     href="{{ user_url('/') }}">卡号规则</a>
                  <a class="btn btn-primary btn-xs dialog-popup"
                     href="{{ user_url('/') }}">注册字段</a>
                  <button class="btn btn-danger btn-xs btn-delete-confirm"
                          data-link="{{ user_url('/') }}">删除
                  </button>
                </td>
              </tr>
            </volist>
            <else/>
            <tr>
              <td colspan="10" class="row-nodata">未设置会员卡</td>
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
  </div>
@stop