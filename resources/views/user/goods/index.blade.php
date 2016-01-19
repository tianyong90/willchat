@extends('user.public.baseindex')
@section('style')
  <link rel="stylesheet" href="{{ asset('css') }}/user/metronicuser.css"/>
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-cubes"></i> 商品列表
      </div>
      <div class="actions">
        <a href="{{ user_url('/') }}"
           class="btn default blue-stripe fa fa-plus dialog-popup">添加</a>
        <button url="{{ user_url('/') }}"
                class="btn default green-stripe btn-xs ajax-post" target-form="ids"><i class="fa fa-check"></i>&nbsp;启用
        </button>
        <button url="{{ user_url('/') }}"
                class="btn default yellow-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-times"></i>&nbsp;禁用
        </button>
        <button url="{{ user_url('/') }}"
                class="btn default red-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-trash-o"></i>&nbsp;删除
        </button>
      </div>
    </div>
    <div class="portlet-body">
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th class="table-checkbox">
              <input type="checkbox" class="group-checkable" data-set="#sample_1 .ids"/>
            </th>
            <th>名称</th>
            <th>所属分类</th>
            <th>销量</th>
            <th>关键词</th>
            <th>更新时间</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <notempty name="list">
            <volist name="list" id="vo">
              <tr>
                <td><input class="ids" type="checkbox" value="{$vo['id']}" name="ids[]"></td>
                <td>{$vo.name}</td>
                <td>{$vo.category_id|get_goods_category}</td>
                <td>{$vo.sales}</td>
                <td>{$vo.keyword}</td>
                <td>{$vo.update_time|time_format}</td>
                <td>
                  <eq name="vo.status" value="1">
                    <span class="badge badge-primary">启用</span>
                    <else/>
                    <span class="badge badge-danger">禁用</span>
                  </eq>
                </td>
                <td>
                  <a class="btn blue btn-xs dialog-popup"
                     href="{{ user_url('/') }}">编辑</a>
                  <!--  <a class="btn btn-primary btn-xs" href="{{ user_url('/') }}">用户评论</a> -->
                  <button class="btn btn-danger btn-xs btn-delete-confirm"
                          data-link="{{ user_url('/') }}">删除
                  </button>
                </td>
              </tr>
            </volist>
            <else/>
            <tr>
              <td colspan="70" style="text-align:center;">暂无数据</td>
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