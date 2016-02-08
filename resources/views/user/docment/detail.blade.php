@extends('user.public.baseindex')
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/user/document.css">
@endsection
@section('main')
  <div class="row">
    <div class="col-md-12">
      <!-- BEGIN PORTLET -->
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
          <div id="article-main">
            <h2 class="title">{{ $article->title }}</h2>
              <span class="article-info">
                <span> 发表于 {{ $article->published_at }}</span>
                <span> 最后更新 {{ $article->updated_at }}</span>
              </span>
            <div id="contents">{{ $article->content }}</div>
            <span class="return-list">
              <a href="{{ user_url('document') }}">返回文档列表</a>
            </span>
            <span class="pagination">
              <article:prev name="prev" info="info">
                <a href="{{ user_url('document/detail/'.$prevId) }}">上一篇</a>
              </article:prev>
              <article:next name="next" info="info">
                <a href="{{ user_url('document/detail/'.$nextId) }}">下一篇</a>
              </article:next>
            </span>
          </div>
        </div>
      </div>
      <!-- END PORTLET -->
    </div>
  </div>
@endsection
@section('js')

@endsection