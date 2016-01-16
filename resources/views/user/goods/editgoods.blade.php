<extend name="Public/dcontentbase" />
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css') }}/user/editgoods.css">
<style>
    .dialog-content {
        height: auto;
        width: 950px;
        max-height: 450px;
        overflow-x: hidden;
    }
</style>
@stop
<block name="content">
<!-- BEGIN PAGE CONTENT-->
<div class="dialog-content form"  id="wizard-form">
    <form class="validate" id="goods-form" action="__SELF__" method="post">
        <div class="form-wizard">
            <div class="form-body">
                <ul class="nav nav-pills nav-justified steps">
                    <li>
                        <a href="#tab1" data-toggle="tab" class="step">
                        <span class="number">
                        1 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i>基本信息</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab" class="step">
                        <span class="number">
                        2 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i>属性</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab" class="step active">
                        <span class="number">
                        3 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i>价格/库存</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab4" data-toggle="tab" class="step">
                        <span class="number">
                        4 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i>图片展示</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab5" data-toggle="tab" class="step">
                        <span class="number">
                        4 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i>图文详情</span>
                        </a>
                    </li>
                </ul>
                <div id="bar" class="progress progress-striped" role="progressbar">
                    <div class="progress-bar progress-bar-success">
                    </div>
                </div>
                <div class="tab-content">
                    <div class="alert alert-danger display-none">
                        <button class="close" data-dismiss="alert"></button>
                        表单验证错误,请检查您填写的参数.
                    </div>
                    <div class="alert alert-success display-none">
                        <button class="close" data-dismiss="alert"></button>
                        表单数据验证通过
                    </div>
                    <div class="tab-pane active" id="tab1">
                        <input type="hidden" name="id" value="{$info.id}" />
                        <table>
                            <tr>
                                <td colspan="2">
                                    <label>名称</label>
                                    <input type="text" name="name" value="{$info.name}" class="form-control input-large" placeholder="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>分类</label>
                                    <select name="category_id" id="category_id" class="form-control input-small">
                                        <option selected="selected" value="0">--请选商品分类--</option>
                                        <volist name="categorylist" id="cate">
                                        <option value="{$cate.id}" <eq name="info.category_id" value="$cate['id']">selected</eq>>{$cate.name}</option>
                                        </volist>
                                    </select>
                                </td>
                                <td>
                                    <label>商品代码</label>
                                    <input type="text" name="code" value="{$info.code}" class="form-control input-small" placeholder="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>关键词</label>
                                    <input type="text" name="keyword" value="{$info.keyword}" class="form-control input-small" placeholder="">
                                </td>
                                <td>
                                    <label>排序</label>
                                    <input type="text" name="sort" value="{$info.sort}" class="form-control input-small" placeholder="">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="table-scrollable">
                            <table class="table table-striped table-hover" id="attr-table">
                                <thead>
                                    <tr>
                                        <th>属性</th>
                                        <th>属性值</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-attr">
                                   <!-- 属性项使用AJAX加载 -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <table>
                            <tr>
                                <td>
                                    <label>邮费</label>
                                    <input type="text" name="freight" value="{$info.freight}" class="form-control input-small" placeholder="">
                                </td>
                                <td>
                                    <label>库存</label>
                                    <input type="text" name="stock" value="{$info.stock}" class="form-control input-small" placeholder="">
                                </td>
                                <td>
                                    <label>支持邮费到付</label>
                                    <input type="checkbox" name="freight_buyerpay" value="1" class="form-control input-small block" <notempty name="info.freight_buyerpay">checked</notempty>>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>展示价格</label>
                                    <input type="text" name="price_display" value="{$info.price_display}" class="form-control input-small" placeholder="">
                                </td>
                                <td>
                                    <label>原价</label>
                                    <input type="text" name="original_price" value="{$info.original_price}" class="form-control input-small" placeholder="">
                                </td>
                                <td>
                                    <label>价格区间</label>
                                    <div>
                                        <input type="text" name="price_range_min" value="{$info.price_range_min}" class="form-control input-small fl" placeholder="">
                                        <span class="fl">到</span>
                                        <input type="text" name="price_range_max" value="{$info.price_range_max}" class="form-control input-small fl" placeholder="">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <div class="table-scrollable">
                            <table class="table table-striped table-hover" id="attr-table">
                                <thead>
                                    <tr>
                                        <th>属性组合</th>
                                        <th>销售价</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-skuprice">
                                   <!-- SKU价格项使用AJAX加载 -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4">
                        <div class="form-group">
                            <label class="col-md-3 control-label">缩略预览</label>
                            {:W('User/piccontrol',array('thumbnail',$info['thumbnail'],'focus',true,false,true))}
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">轮播展示图片</label>
                            <div style="display:block;overflow:hidden;">
                                {:W('User/piccontrol',array('image_list[]',$info['image_list'][0],'focus',true,false,true,'fl'))}
                                {:W('User/piccontrol',array('image_list[]',$info['image_list'][1],'focus',true,false,true,'fl'))}
                                {:W('User/piccontrol',array('image_list[]',$info['image_list'][2],'focus',true,false,true,'fl'))}
                                {:W('User/piccontrol',array('image_list[]',$info['image_list'][3],'focus',true,false,true,'fl'))}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                        <div class="form-group">
                            <textarea class="editor" id="details" name="details" rows="5">{$info.details}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="javascript:;" class="btn default button-previous">
                        <i class="m-icon-swapleft"></i> 上一步 </a>
                        <a href="javascript:;" class="btn blue button-next">
                        下一步 <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                        <a href="javascript:;" class="btn green button-submit">
                        完成 <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- END PAGE CONTENT-->
@stop
@section('script')
<script type="text/javascript" charset="utf-8" src="{{ asset('static') }}/ueditor/ueditor-front.config.js"></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('static') }}/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="{{ asset('static') }}/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{ asset('static') }}/metronic/global/plugins/jquery-validation/js/localization/messages_zh.min.js" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('static') }}/metronic/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="__JS__/goodsedit.js"></script>
<script>
    $(function () {
        var editors=$('textarea.editor');
        $.each(editors, function(index, val) {
            UE.getEditor($(val).attr('id'));
        });

        FormWizard.init();

        $('input.goods_attr').each(function(index, el) {
          $(el).rules("add",{required:true});
        });

        //删除商品属性标签动作
        $("#attr-table").on('click', 'span.btn-delete-attr', function(event) {
            event.preventDefault();
            $(this).parent('.attr-control').remove();
        });

        //添加商品属性标签动作
        $("#attr-table").on('click', 'span.btn-add-attr', function(event) {
            var key =  $(this).parents('tr').data('key');
            var randIndex = parseInt(Math.random()*8);  //生成随机数作为下标
            var controlHtml = "<div class='attr-control'><input type='hidden' name='goods_attr["+key+"]["+randIndex+"][id]'><input type='text' name='goods_attr["+key+"]["+randIndex+"][value]'><span class='btn-delete-attr fa fa-times'></span></div>";
            $(controlHtml).prependTo($(this).parent('td'));

            $('input.goods_attr').each(function(index, el) {
              $(el).rules("add",{required:true});
            });
        });
    });
</script>
@stop