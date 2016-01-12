@extends('user.public.baseindex')
@section('style')
@stop
@section('main')
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cube"></i>内容分类管理
            </div>
            <div class="actions">
                <a href="{:U('addCategory',array('token'=>$token))}" class="btn default blue-stripe fa fa-plus dialog-popup">添加</a>
                <button url="{:U('setStatus',array('Model'=>'WapHomeCategory','status'=>1))}" class="btn default green-stripe btn-xs ajax-post" target-form="ids"><i class="fa fa-check"></i>&nbsp;启用</button>
                <button url="{:U('setStatus',array('Model'=>'WapHomeCategory','status'=>0))}" class="btn default yellow-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-times"></i>&nbsp;禁用</button>
                <!-- <button url="{:U('setStatus',array('Model'=>'WapHomeCategory','status'=>-1))}" class="btn default red-stripe btn-xs ajax-post confirm" target-form="ids"><i class="fa fa-trash-o"></i>&nbsp;删除</button> -->
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
                            <th>描述</th>
                            <th>排序</th>
                            <th>分类图片</th>
                            <th>外链/模块</th>
                            <th>首页显示</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <notempty name="catetree">
                            <volist name="catetree" id="vo">
                            <tr>
                                <td><input class="ids" type="checkbox" value="{$vo['id']}" name="ids[]"></td>
                                <td>{$vo.name}</td>
                                <td>{$vo.description}</td>
                                <td>{$vo.sort}</td>
                                <td><img class="preview-small" src="__ROOT__{$vo.pic_path}"/></td>
                                <td><span title="{$vo.url}">{$vo.url|substr=0,30}</span></td>
                                <td>
                                    <eq name="vo.home_display" value="1">
                                    <div class="badge badge-primary">显示</div>
                                    <else/>
                                    <div class="badge badge-danger">不显示</div>
                                    </eq>
                                </td>
                                <td>
                                    <eq name="vo.status" value="1">
                                    <div class="badge badge-primary">正常</div>
                                    <else/>
                                    <div class="badge badge-danger">禁用</div>
                                    </eq>
                                </td>
                                <td>
                                    <a class="btn blue btn-xs dialog-popup" href="{:U('editCategory',array('id'=>$vo['id'],'token'=>$token))}">修改</a>
                                    <button class="btn red btn-xs btn-delete-confirm" data-link="{:U('deleteCategory',array('id'=>$vo['id'],'token'=>$token))}">删除</button>
                                </td>
                            </tr>
                            <notempty name="vo.subcate">
                            <volist name="vo.subcate" id="vo_sub">
                            <tr>
                                <td><input class="ids" type="checkbox" value="{$vo_sub['id']}" name="ids[]"></td>
                                <td>&nbsp;&nbsp;|---{$vo_sub.name}</td>
                                <td>{$vo_sub.description}</td>
                                <td>{$vo_sub.sort}</td>
                                <td><img class="preview-small" src="__ROOT__{$vo_sub.pic_url}"/></td>
                                <td><span title="{$vo.url}">{$vo.url|substr=0,30}</span></td>
                                <td>
                                    <eq name="vo_sub.home_display" value="1">
                                    <div class="badge badge-primary">显示</div>
                                    <else/>
                                    <div class="badge badge-danger">不显示</div>
                                    </eq>
                                </td>
                                <td>
                                    <eq name="vo_sub.status" value="1">
                                    <div class="badge badge-primary">正常</div>
                                    <else/>
                                    <div class="badge badge-danger">禁用</div>
                                    </eq>
                                </td>
                                <td>
                                    <a class="btn blue btn-xs dialog-popup" href="{:U('editCategory',array('id'=>$vo_sub['id'],'token'=>$token))}">修改</a>
                                    <button class="btn red btn-xs btn-delete-confirm" data-link="{:U('deleteCategory',array('id'=>$vo_sub['id'],'token'=>$token))}">删除</button>
                                </td>
                            </tr>
                            </volist>
                            </notempty>
                            </volist>
                        <else/>
                            <tr>
                                <td colspan="10" class="row-nodata">斩无分类</td>
                            </tr>
                        </notempty>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop