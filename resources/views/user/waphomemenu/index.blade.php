@extends('user.public.baseindex')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-list"></i>微网站导航菜单
      </div>
      <div class="actions">
        <a href="{{ user_url('/') }}" class="btn default blue-stripe btn-xs dialog-popup"><i
              class="fa fa-plus"></i>添加菜单</a>
        <button url="{{ user_url('/') }}"
                class="btn default green-stripe btn-xs ajax-post" target-form="ids"><i class="fa fa-check"></i>启用
        </button>
        <button url="{{ user_url('/') }}"
                class="btn default yellow-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-times"></i>禁用
        </button>
        <button url="{{ user_url('/') }}"
                class="btn default red-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-trash-o"></i>删除
        </button>
      </div>
    </div>
    <div class="portlet-body">
      <div class="note note-info">
        <h4 class="block">使用提示：</h4>

        <p>
          1、顶级菜单最多只能添加4个<br>
          2、每个顶级菜单下最多能添加5个子菜单
        </p>
      </div>
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th class="table-checkbox">
              <input type="checkbox" class="group-checkable" data-set="#sample_1 .ids"/>
            </th>
            <th>菜单名称</th>
            <th>菜单图标</th>
            <th>关键词/链接</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <volist name="menutree" id="class">
            <tr>
              <td><input class="ids" type="checkbox" value="{$class['id']}" name="ids[]"></td>
              <td>{$class.name}</td>
              <td><span class="fa fa-{$class.icon}"></span></td>
              <td>
                <eq name="class.type" value="click">
                  {$class.key}
                  <else/>
                  {$class.url}
                </eq>
              </td>
              <td>
                <eq name="class.status" value="1">
                  <span class="badge badge-primary">启用</span>
                  <else/>
                  <span class="badge badge-danger">禁用</span>
                </eq>
              </td>
              <td>
                <a class="btn blue btn-xs dialog-popup"
                   href="{{ user_url('/') }}">修改</a>
                <button class="btn red btn-xs btn-delete-confirm"
                        data-link="{{ user_url('/') }}">删除
                </button>
              </td>
            </tr>
            <volist name="class['submenu']" id="class1">
              <tr>
                <td><input class="ids" type="checkbox" value="{$class1['id']}" name="ids[]"></td>
                <td>└──{$class1.name}</td>
                <td><span class="fa fa-{$class1.icon}"></span></td>
                <td>
                  <eq name="class1.type" value="click">
                    {$class1.key}
                    <else/>
                    {$class1.url}
                  </eq>
                </td>
                <td>
                  <eq name="class1.status" value="1">
                    <span class="badge badge-primary">启用</span>
                    <else/>
                    <span class="badge badge-danger">禁用</span>
                  </eq>
                </td>
                <td>
                  <a class="btn blue btn-xs dialog-popup"
                     href="{{ user_url('/') }}">修改</a>
                  <button class="btn red btn-xs btn-delete-confirm"
                          data-link="{{ user_url('/') }}">删除
                  </button>
                </td>
              </tr>
            </volist>
          </volist>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop