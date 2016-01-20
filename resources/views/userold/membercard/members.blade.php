@extends('user.public.baseindex')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-users"></i>会员列表
      </div>
      <div class="actions">
        <a href="{{ user_url('/') }}" class="btn default green-stripe btn-xs"
           target-form="ids"><i class="fa fa-file-excel-o "></i>导出Excel</a>
        <button url="{{ user_url('/') }}"
                class="btn default green-stripe btn-xs ajax-post" target-form="ids"><i class="fa fa-check"></i>启用
        </button>
        <button url="{{ user_url('/') }}"
                class="btn default yellow-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-times"></i>禁用
        </button>
        <!-- <button url="{{ user_url('/') }}" class="btn default red-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-trash-o"></i>删除</button> -->
      </div>
      <!--             <select class="form-control input-small level-select" name="level_id">
                      <option value="0">全部等级</option>
                      <foreach name="levellist" item="level" key="k">
                          <option value="{$k}">{$level.name}</option>
                      </foreach>
                  </select> -->
      <div class="inputs" style="padding:0;">
        <div class="portlet-input input-inline input-sm">
          <div class="input-icon right">
            <i class="icon-magnifier"></i>
            <input class="form-control" id="input-search" value="{$Think.get.keyword}" placeholder="输入卡号/姓名搜索"
                   type="text">
          </div>
        </div>
      </div>
    </div>
    <div class="portlet-body">
      <table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
        <tr>
          <th class="table-checkbox">
            <input type="checkbox" class="group-checkable" data-set="#sample_1 .ids"/>
          </th>
          <th>卡号</th>
          <!-- <th>等级</th> -->
          <th>姓名</th>
          <th>昵称</th>
          <th>性别</th>
          <th>生日</th>
          <th>手机</th>
          <th>QQ</th>
          <th>注册时间</th>
          <th>状态</th>
          <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <notempty name="list">
          <volist name="list" id="member">
            <tr class="odd gradeX">
              <td><input class="ids" type="checkbox" value="{$member['mid']}" name="ids[]"></td>
              <td>{$member.cardnumber}</td>
              <!-- <td>{$levellist[$member['level_id']]['name']|default="未知等级"}</td> -->
              <td>{$member.realname}</td>
              <td>{$member.nickname}</td>
              <td>
                <if condition="$member['sex'] eq 1">
                  男
                  <elseif condition="$member['sex'] eq 0"/>
                  女
                  <else/>
                  保密
                </if>
              </td>
              <td>{$member.birthday}</td>
              <td>{$member.mobile}</td>
              <td>{$member.qq}</td>
              <td>{$member.reg_time|time_format}</td>
              <td>
                <eq name="member.status" value="1">
                  <span class="badge badge-primary">{$member.status|get_status_title}</span>
                  <else/>
                  <span class="badge badge-danger">{$member.status|get_status_title}</span>
                </eq>
              </td>
              <td>
                <a class="btn blue btn-xs dialog-popup"
                   href="{{ user_url('/') }}">发送红包</a>
                <button class="btn red btn-xs btn-delete-confirm"
                        data-link="{{ user_url('/') }}">
                  删除
                </button>
              </td>
            </tr>
          </volist>
          <else/>
          <tr>
            <td colspan="20" class="row-nodata">暂无会员</td>
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
      $('input#input-search').keyup(function (event) {
        if (event.keyCode == 13) {
          var keyword = $(this).val();
          var url = Think.U('MemberCard/members', "token={$token}&cid={$Think.get.cid}&keyword=" + keyword);
          location.href = url;
        }
        ;
      });
    })
  </script>
@stop