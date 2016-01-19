@extends('user.public.baseindex')
@section('style')
  <link rel="stylesheet" href="{{ asset('static') }}/page/page.css"/>
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-comments"></i> 文本回复列表
      </div>
      <div class="actions">
        <a href="{:U('add',array('token'=>$token))}" class="btn default blue-stripe fa fa-plus dialog-popup">添加</a>
        <button url="{:U('setStatus',array('Model'=>'Text','status'=>1))}"
                class="btn default green-stripe btn-xs ajax-post" target-form="ids"><i class="fa fa-check"></i>&nbsp;启用
        </button>
        <button url="{:U('setStatus',array('Model'=>'Text','status'=>0))}"
                class="btn default yellow-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-times"></i>&nbsp;禁用
        </button>
        <button url="{:U('setStatus',array('Model'=>'Text','status'=>-1))}"
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
            <th>关键词</th>
            <th>回复内容</th>
            <th>使用次数</th>
            <th>添加时间</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <notempty name="list">
            <volist name="list" id="item">
              <tr>
                <td><input class="ids" type="checkbox" value="{$item['id']}" name="ids[]"></td>
                <td>{$item.keyword}</td>
                <td>{$item.content|msubstr=0,10}</td>
                <td>{$item.useage}</td>
                <td>{$item.create_time|time_format}</td>
                <td>
                  <eq name="item.status" value="1">
                    <span class="badge badge-primary">启用</span>
                    <else/>
                    <span class="badge badge-danger">禁用</span>
                  </eq>
                </td>
                <td>
                  <a class="btn blue btn-xs dialog-popup"
                     href="{:U('edit',array('id'=>$item['id'],'token'=>$token))}">编辑</a>
                  <button class="btn red btn-xs btn-delete-confirm"
                          data-link="{:U('deleteReply',array('id'=>$item['id']))}">删除
                  </button>
                </td>
              </tr>
            </volist>
            <else/>
            <tr>
              <td colspan="7" style="text-align:center;">暂无数据</td>
            </tr>
          </notempty>
          </tbody>
        </table>
      </div>
      <div class="page">
        <div class="pagination pagination-right">
          {$_page|default=''}
        </div>
      </div>
    </div>
  </div>
@stop
