@extends('user.public.baseindex')
@section('style')
<link rel="stylesheet" href="__CSS__/metronicuser.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('static') }}/metronic/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
@stop
@section('main')
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-credit-card "></i> 创建卡券
        </div>
    </div>
    <div class="portlet-body form">
        <div class="note note-info">
            <h4 class="block">温馨提示：</h4>
            使用些功能，商户必须开通微信卡券功能，如未开通，请在公众平台进行申请。<br />
            卡券创建后需经过微信公众平台审核后才可投放使用。<br />
            受公众平台接口限制，卡券创建后部分信息将无法再修改，请谨慎填写此页面中的数据。<br />
            受微信官方的反盗图机制影响，上传的LOGO预览时提示“图片来源自微信公众平台，未经允许不可引用，此为正常现象，不影响卡券显示效果。<br />
        </div>
        <div class="containet">
            <form class="form-horizontal" role="form" method="post" action="">
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">卡券类型</label>
                        <div class="col-md-9">
                            <select class="form-control input-small" id="card_type" name="card_type"
                                value="GENERAL_COUPON">
                                <foreach name="cardtypelist" item="type" key="key">
                                <option value="{$key}">{$type}</option>
                                </foreach>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">商家名称</label>
                        <div class="col-md-9">
                            <input name="brand_name" type="text" id="brand_name" class="form-control input-large" value="{$card.brand_name}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">客服电话</label>
                        <div class="col-md-9">
                            <input name="service_phone" type="text" id="service_phone" class="form-control input-large" value="{$card.service_phone}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">商家LOGO</label>
                        <div class="col-md-9">
                            <div class="pic-control">
                                <span class="thumbnail">
                                    <img src="./Public/User/images/no_picture.gif" alt="点击预览">
                                </span>
                                <div class="buttons">
                                    <input type="text" class="pic-path" name="logo_url" value="">
                                    <a class="btn btn-sm btn-primary btn-wxuploadimg" data-type="logo"><i class="fa fa-upload"></i>上传</a>
                                </div>
                            </div>
                            <span class="help-block">商家logo,文件大小不超过1M，尺寸为300*300。</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">卡券颜色</label>
                        <div class="col-md-9">
                            <select name="color" id="colorlsit" class="form-control input-small">
                                <foreach name="colors" item="color">
                                    <option class="color" style="background:{$color['value']}">{$color.name}</option>
                                </foreach>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">卡券标题</label>
                        <div class="col-md-9">
                            <input name="title" type="text" id="title" class="form-control input-large" value="{$card.title}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">卡券副标题</label>
                        <div class="col-md-9">
                            <input name="sub_title" type="text" id="sub_title" class="form-control input-large" value="{$card.sub_title}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">使用提醒</label>
                        <div class="col-md-9">
                            <input type="text" name="notice" id="notice" class="form-control input-large" value="{$card.notice}"/>
                            <span class="help-block">使用提醒，12汉字以内，例如：请出示二维码核销卡券</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">CODE展示方式</label>
                        <div class="col-md-9">
                            <select class="form-control input-small" id="code_type" name="code_type">
                                <option value="CODE_TYPE_TEXT">文本</option>
                                <option value="CODE_TYPE_BARCODE">条码和文本</option>
                                <option value="CODE_TYPE_QRCODE">二维码和文本</option>
                                <option value="CODE_TYPE_ONLY_QRCODE">仅二维码</option>
                                <option value="CODE_TYPE_ONLY_BARCODE">仅条码</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">库存</label>
                        <div class="col-md-9">
                            <input type="text" name="quantity" id="quantity" class="form-control input-small" value="{$card.quantity}"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">领券限制</label>
                        <div class="col-md-9">
                            <input type="text" name="get_limit" id="get_limit" class="form-control input-small" value="{$card.get_limit}"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">用券限制</label>
                        <div class="col-md-9">
                            <input type="text" name="use_limit" id="use_limit" class="form-control input-small" value=""/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">有效期</label>
                        <div class="col-md-2">
                            <select name="date_info_type" id="date_info_type" class="form-control input-small">
                                <option value="1">固定日期</option>
                                <option value="2">固定时长</option>
                            </select>
                        </div>
                        <div class="date_info_type1">
                            <div class="col-md-4">
                                <span>日期区间：</span>
                                <div id="reportrange" class="btn default">
                                    <i class="fa fa-calendar"></i>
                                    &nbsp; <span>
                                    </span>
                                    <b class="fa fa-angle-down"></b>
                                </div>
                            </div>
                            <input type="hidden" name="begin_timestamp" id="begin_timestamp" />
                            <input type="hidden" name="end_timestamp" id="end_timestamp" />
                        </div>
                        <div class="date_info_type2 hide">
                            <select name="fixed_begin_term" id="" class="col-md-2 form-control input-small">
                                <option value="0">当天</option>
                                <for start="1" end="91">
                                    <option value="{$i}">{$i}天</option>
                                </for>
                            </select>
                            <span class="inline-block" style="float:left;">生效，有效天数</span>
                            <select name="fixed_term" id="" class="col-md-2 form-control input-small">
                                <option value="0">当天有效</option>
                                <for start="1" end="91">
                                    <option value="{$i}">{$i}天</option>
                                </for>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">互动选项</label>
                        <div class="col-md-9">
                            <div class="checkbox-list">
                                <label class="checkbox-inline">
                                <input name="can_share" type="checkbox" id="" value="1" checked> 可分享 </label>
                                <label class="checkbox-inline">
                                <input name="can_give_friend" type="checkbox" id="" value="1" checked> 可转赠 </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">使用说明</label>
                        <div class="col-md-9">
                            <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                            <span class="help-block">可分行，上限为1000字。</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">自定义跳转入口名称</label>
                        <div class="col-md-9">
                            <input type="text" name="custom_url_name" id="custom_url_name" class="form-control input-large" value="{$card.custom_url_name}"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">自定义跳转入口地址</label>
                        <div class="col-md-9">
                            <input type="text" name="custom_url" id="custom_url" class="form-control input-large" value="{$card.custom_url}"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">自定义跳转入口提示</label>
                        <div class="col-md-9">
                            <input type="text" name="custom_url_sub_title" id="custom_url_sub_title" class="form-control input-large" value="{$card.custom_url_sub_title}"/>
                            <span class="help-block">6个汉字以内</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">营销场景自定义入口名称</label>
                        <div class="col-md-9">
                            <input type="text" name="promotion_url_name" id="promotion_url_name" class="form-control input-large" value="{$card.promotion_url_name}"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">营销场景自定义入口地址</label>
                        <div class="col-md-9">
                            <input type="text" name="promotion_url" id="promotion_url" class="form-control input-large" value="{$card.promotion_url}"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">营销场景自定义入口提示</label>
                        <div class="col-md-9">
                            <input type="text" name="promotion_url_sub_title" id="promotion_url_sub_title" class="form-control input-large" value="{$card.promotion_url_sub_title}"/>
                            <span class="help-block">6个汉字以内</span>
                        </div>
                    </div>
                    <div class="private-field">
                        <div id="GENERAL_COUPON">
                            <div class="form-group">
                                <label class="col-md-2 control-label">通用券描述</label>
                                <div class="col-md-9">
                                    <textarea name="default_detail" id="" cols="30" rows="5" class="form-control"></textarea>
                                    <span class="help-block">可分行，上限为1000字。</span>
                                </div>
                            </div>
                        </div>
                        <div id="GROUPON">
                            <div class="form-group">
                                <label class="col-md-2 control-label">团购详情</label>
                                <div class="col-md-9">
                                    <textarea name="deal_detail" id="" cols="30" rows="5" class="form-control"></textarea>
                                    <span class="help-block">可分行，上限为1000字。</span>
                                </div>
                            </div>
                        </div>
                        <div id="DISCOUNT">
                            <div class="form-group">
                                <label class="col-md-2 control-label">打折额度</label>
                                <div class="col-md-9">
                                    <input type="text" name="discount" class="form-control input-small" />
                                    <span class="help-block">例如填30就是7折。</span>
                                </div>
                            </div>
                        </div>
                        <div id="GIFT">
                            <div class="form-group">
                                <label class="col-md-2 control-label">礼品名</label>
                                <div class="col-md-9">
                                    <input type="text" name="gift" class="form-control input-large" />
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div id="CASH">
                            <div class="form-group">
                                <label class="col-md-2 control-label">起用金额</label>
                                <div class="col-md-9">
                                    <input type="text" name="least_cost" class="form-control input-small" />
                                    <span class="help-block">单位为分</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">减免金额</label>
                                <div class="col-md-9">
                                    <input type="text" name="reduce_cost" class="form-control input-small" />
                                    <span class="help-block">单位为分</span>
                                </div>
                            </div>
                        </div>
                        <div id="MEMBER_CARD">
                            <div class="form-group">
                                <label class="col-md-2 control-label">积分储值功能</label>
                                <div class="col-md-9">
                                    <div class="checkbox-list">
                                        <label class="checkbox-inline">
                                        <input name="supply_bonus" type="checkbox" id="" value="1" checked> 支持积分 </label>
                                        <label class="checkbox-inline">
                                        <input name="supply_balance" type="checkbox" id="" value="1" checked> 支持储值 </label>
                                    </div>
                                </div>
                            </div>   
                            <div class="form-group">
                                <label class="col-md-2 control-label">积分清零规则</label>
                                <div class="col-md-9">
                                    <textarea name="bouns_cleared" class="form-control" cols="30" rows="3"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">积分规则</label>
                                <div class="col-md-9">
                                    <textarea name="bouns_rules" class="form-control" cols="30" rows="3"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-2 control-label">储值规则</label>
                                <div class="col-md-9">
                                    <textarea name="balance_rules" class="form-control" cols="30" rows="3"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-2 control-label">特权说明</label>
                                <div class="col-md-9">
                                    <textarea name="prerogative" class="form-control" cols="30" rows="3"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">绑定旧卡的URL</label>
                                <div class="col-md-9">
                                    <input type="text" name="bind_old_card_url" class="form-control input-large" />
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">激活会员卡的URL</label>
                                <div class="col-md-9">
                                    <input type="text" name="activate_url" class="form-control input-large" />
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">保存</button>
                            <button type="button" class="btn default" onclick="javascript:history.go(-1);">取消
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('script')
<script type="text/javascript" src="{{ asset('static') }}/metronic/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="{{ asset('static') }}/metronic/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script>
    $(function () {
        //切换颜色选项
        $('select#colorlsit').change(function(event) {
            var style = $(this).children('option:selected').attr('style');
            try{
                var color = style.match(/\#[0-9a-fA-F]{6}/)[0];
            }catch(e){
                return fasle;
            }
            if(color){
                $(this).css('background', color);
            }
        });

        //上传文件对话框
        $("a.btn-wxuploadimg").on('click', function () {
            var triggerItem=$(this); //触发弹出层的元素
            var data=triggerItem.data();
            top.dialog({
                id: 'dialog-uplpadfile',
                title: '上传卡券LOGO',
                fixed:true,
                quickClose: true,
                padding: 10,
                data: data,
                zIndex: 99999,
                url: "{:U('User/Dialog/wechatUploadImg',array('token'=>$token))}",
                okValue: '确定',
                cancelValue: '取消',
                ok: function() {
                    if (this.data.filepath) {
                        var picControl=triggerItem.parents('.pic-control');
                        //更新输入框值
                        picControl.find("input.pic-path").val(this.data.filepath);
                        //更新预览图片
                        picControl.find("img").attr("src", this.data.filepath);
                    };
                    this.close().remove();
                },
                cancel: function() {
                }
            })
            .show();
            return false;
        });

        function switchField(type){
            console.log(type);
            var privateItems = $('div.private-field').find('#'+type);
            if (privateItems.length>0) {
                privateItems.show().siblings('div').hide();
            } else{
                $('div.private-field').children('div').hide();
            };


        }
        switchField($('select#card_type').val());

        $('select#card_type').change(function(event) {
           switchField($(this).val());
        });

        $('select#date_info_type').change(function(event) {
            var type=$(this).val();
            if(type==="1"){
                $("div.date_info_type1").removeClass('hide');
                $("div.date_info_type2").addClass('hide');
            }else{
                $("div.date_info_type2").removeClass('hide');
                $("div.date_info_type1").addClass('hide');
            }
        });
    });

    //日期区间选择
    var handleDateRangePickers = function () {
        if (!jQuery().daterangepicker) {
            return;
        }

        $('#reportrange').daterangepicker({
                opens: (Metronic.isRTL() ? 'left' : 'right'),
                startDate: moment(),
                endDate: moment().add(29,'days'),
                minDate: moment(),
                maxDate: moment("20301231","YYYYMMDD"),
                dateLimit: {
                    years: 20
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                // ranges: {
                //     'Today': [moment(), moment()],
                //     'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                //     'Last 7 Days': [moment().subtract('days', 6), moment()],
                //     'Last 30 Days': [moment().subtract('days', 29), moment()],
                //     'This Month': [moment().startOf('month'), moment().endOf('month')],
                //     'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                // },
                buttonClasses: ['btn'],
                applyClass: 'green',
                cancelClass: 'default',
                format: 'YYYY/MM/DD',
                separator: ' 到 ',
                locale: {
                    applyLabel: '应用',
                    cancelLabel: '取消',
                    fromLabel: '从',
                    toLabel: '到',
                    customRangeLabel: '自定义区间',
                    daysOfWeek: ['日', '一', '二', '三', '四', '五', '六'],
                    monthNames: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
                    firstDay: 1
                }
            },
            function (start, end) {
                $('#reportrange span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));

                $("input#begin_timestamp").val(start.format('X'));
                $("input#end_timestamp").val(end.format('X'));
            }
        );
        //Set the initial state of the picker label
        $('#reportrange span').html(moment().format('YYYY/MM/DD') + ' - ' + moment().add(29,'days').format('YYYY/MM/DD'));
        //默认区间为当天至以后30天
        $("input#begin_timestamp").val(moment().format('X'));
        $("input#end_timestamp").val(moment().add(29,'days').format('X'));
    }();
</script>
@stop