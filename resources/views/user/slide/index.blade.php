@extends('user.public.baseindex')
@section('style')
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-photo">
          幻灯片列表
        </i>
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
            <th>图片预览</th>
            <th>备注</th>
            <th>外链/关联功能</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <notempty name="list">
            <volist name="list" id="item">
              <tr>
                <td><input class="ids" type="checkbox" value="{$item['id']}" name="ids[]"></td>
                <td><img src="__ROOT__{$item.pic_path}" class="preview-small"/></td>
                <td>{$item.info}</td>
                <td>
                  <notempty name="item.keyword">
                    {$item.keyword}
                    <else/>
                    {$item.url}
                  </notempty>
                </td>
                <td>
                  <eq name="item.status" value="1">
                    <span class="badge badge-primary">启用</span>
                    <else/>
                    <span class="badge badge-danger">禁用</span>
                  </eq>
                </td>
                <td>
                  <a class="btn blue btn-xs dialog-popup"
                     href="{{ user_url('/') }}">编辑</a>
                  <button class="btn red btn-xs btn-delete-confirm"
                          data-link="{{ user_url('/') }}">删除
                  </button>
                </td>
              </tr>
            </volist>
            <else/>
            <tr>
              <td colspan="10" class="row-nodata">暂无图片</td>
            </tr>
          </notempty>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop