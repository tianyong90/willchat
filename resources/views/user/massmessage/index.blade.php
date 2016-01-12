@extends('user.public.baseindex')
@section('style')
@stop
@section('main')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-comments"></i> 高级群发
            </div>
            <div class="actions">
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <button class="btn btn-primary">发送</button>
                
            </div>
            <div class="table-scrollable">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>标题</th>
                        <th>类型</th>
                        <th>成功数量</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <volist id="item" name="list">
                        <tr>
                            <td>{$i}</td>
                            <td>{$item.keyword}</td>
                            <td>{$item.description}</td>
                            <td><a class="single_image" href="{$item.url}"><img src="{$item.url}" height="30" width="30"/></a></td>
                            <td>{$item.createtime|date='Y-m-d H:i:s',###}</td>
                            <td>{$item.scancount}</td>
                            <td>
                                <button class="btn red btn-xs btn-delete-confirm" data-link="{:U('delete',array('token'=>$token,'id'=>$item['id']))}">删除</button>
                            </td>
                        </tr>
                    </volist>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
    $(function(){
        $('#createQrcode').click(function(event) {
            var $inpKeyword=$('#keyword');
            if($inpKeyword.val()){
                var url="{:U('createQrcode')}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {keyword: $inpKeyword.val()}
                })
                .done(function(data) {
                    $('img#qrcode-preview').attr('src', data);
                    $('input#inp-url').val(data);
                })
                .fail(function() {
                    Base.error('error');
                })
                .always(function() {
                });    
            }else{
                Base.error('请先填写关键词');
                $inpKeyword.focus();
            }
        });
    })

    </script>
@stop