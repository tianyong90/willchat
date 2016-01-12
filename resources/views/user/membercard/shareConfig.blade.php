@extends('user.public.baseindex')
@section('main')
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-share"></i> 分享设置
        </div>
    </div>
    <div class="portlet-body form">
        <div class="note note-info">
            <h4 class="block">使用提示：</h4>
            <p>
                社交分享是一种有效的推广手段，本系统为您提供灵活设置来个性化用户分享的内容<br>
                <span class="font-red">请注意：</span><br>
                1、由于微信公众平台对“网页授权”权限的限制以及本系统业务逻辑需要，仅认证服务号能使用分享功能。<br />
                2、本系统的分享与所对接的会员系统会员推荐功能相结合，当已注册会员的粉丝将链接分享给他人，其它人通过分享的链接注册会员时，分享者将成为新注册会员的推荐人。
                2、您可以选择仅允许已注册会员分享，或将分享权限开放给全部访客。<span class="font-red">（未注册会员时分享的链接仅具有推广作用，不包含推荐人数据）</span><br>
            </p>
        </div>
        <form class="form-horizontal" method="post" action="__SELF__" role="form">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-2 control-label">分享权限</label>
                    <div class="col-md-9">
                        <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="member_only" value="0" checked> 全部访客 </label>
                            <label class="radio-inline">
                                <input type="radio" name="member_only" value="1" <eq name="info.member_only" value="1">checked</eq>> 仅会员
                            </label>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">分享标题</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="title" value="{$info.title}" placeholder="">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">会员回复图片</label>
                    <div class="col-md-9">
                        {:W('User/piccontrol',array('logo',$info['logo'],'logo'))}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">分享描述</label>
                    <div class="col-md-9">
                        <textarea name="description" class="form-control" rows="3">{$info.description}</textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <input type="hidden" name="id" value="{$info.id}" />
                        <button type="submit" class="btn green">确定</button>
                        <button type="button" class="btn default">取消</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop