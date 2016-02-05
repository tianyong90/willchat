@extends('user.public.baseindex')
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/user/document.css">
@stop
@section('main')
  <div class="row">
    <div class="col-md-12">
      <div class="portlet light ">
        <div class="portlet-title">
          <div class="caption caption-md">
            <i class="icon-bar-chart theme-font hide"></i>
            <span class="caption-subject font-blue-madison bold uppercase">帮助中心</span>
          </div>
          <div class="actions">
            <div class="portlet-input input-inline input-small">
              <div class="input-icon right">
                <i class="icon-magnifier"></i>
                <input class="form-control input-circle" placeholder="搜索" type="text">
              </div>
            </div>
          </div>
        </div>
        <div class="portlet-body">
          <ul id="article-list">
            <volist name="list" id="vo">
              <li>
                <a class="title"
                   href="{{ user_url('/') }}"
                   title="{$vo.title}">{$vo.title}</a>
                <span class="time">{$vo.create_time|time_format}</span>
              </li>
            </volist>
          </ul>
          <div class="page">
            <div class="pagination pagination-right">
              {$_page|default=''}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
@section('js')

@stop