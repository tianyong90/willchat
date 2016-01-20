@extends('user.public.baseindex')
@section('style')
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-list">
          模板消息记录
        </i>
      </div>
      <div class="actions">
        <button url="{{ user_url('/') }}"
                class="btn default red-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-trash-o"></i>删除
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
            <th>消息类型</th>
            <th>模板ID</th>
            <th>发送时间</th>
            <th>发送结果</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <notempty name="list">
            <volist name="list" id="item">
              <tr>
                <td><input class="ids" type="checkbox" value="{$item['id']}" name="ids[]"></td>
                <td>{$msgtype[$item['msg_type']]}</td>
                <td>{$item.tpl_id}</td>
                <td>{$item.create_time|time_format}</td>
                <td>
                  <eq name="item.result" value="1">
                    <span class="badge badge-primary">发送成功</span>
                    <else/>
                    <span class="badge badge-danger">发送失败</span>
                  </eq>
                </td>
                <td>
                  <a class="btn blue btn-xs dialog-popup"
                     href="{{ user_url('/') }}">详情</a>
                  <button class="btn red btn-xs btn-delete-confirm"
                          data-link="{{ user_url('/') }}">删除
                  </button>
                </td>
              </tr>
            </volist>
            <else/>
            <tr>
              <td colspan="10" class="row-nodata">暂无记录</td>
            </tr>
          </notempty>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop