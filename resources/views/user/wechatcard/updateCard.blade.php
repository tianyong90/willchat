@extends('user.public.base')
@section('style')
  <link rel="stylesheet" href="{{ asset('css') }}/user/metronicuser.css"/>
  <link rel="stylesheet" type="text/css"
        href="{{ asset('static') }}/metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-credit-card "></i> 更新卡券
      </div>
    </div>
    <div class="portlet-body form">
      <div class="note note-info">
        <h4 class="block">温馨提示：</h4>
        带<span class="font-red">*</span>符号标注的字段修改后需要重新审核。
      </div>
      <div class="containet">
        <form class="form-horizontal" role="form" method="post" action="__SELF__">
          <div class="form-body">
            <div class="form-group">
              <label class="col-md-2 control-label">商家LOGO <span class="font-red">*</span></label>

              <div class="col-md-9">
                <div class="pic-control">
                                <span class="thumbnail">
                                    <img
                                        src="{$card['base_info']['logo_url']|default='./Public/User/images/no_picture.gif'}"
                                        alt="点击预览">
                                </span>

                  <div class="buttons">
                    <input type="text" class="pic-path" name="logo_url" value="{$card['base_info']['logo_url']}">
                    <a class="btn btn-sm btn-primary btn-wxuploadimg" data-type="logo"><i
                          class="fa fa-upload"></i>上传</a>
                  </div>
                </div>
                <span class="help-block">商家logo,文件大小不超过1M，尺寸为300*300。</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">卡券颜色</label>

              <div class="col-md-9">
                <select name="color" id="colorlsit" class="form-control input-small"
                        style="background:{$card['base_info']['color']}">
                  <foreach name="colors" item="color">
                    <option class="color" style="background:{$color['value']}" value="{$color.name}"
                    <eq name="card['base_info']['color']" value="$color['value']">selected</eq>
                    >{$color.name}</option>
                  </foreach>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">CODE展示方式</label>

              <div class="col-md-9">
                <select class="form-control input-small" id="code_type" name="code_type">
                  <option value="CODE_TYPE_TEXT"
                  <eq name="card['base_info']['code_type']" value="CODE_TYPE_TEXT">selected</eq>
                  >文本</option>
                  <option value="CODE_TYPE_BARCODE"
                  <eq name="card['base_info']['code_type']" value="CODE_TYPE_BARCODE">selected</eq>
                  >条码和文本</option>
                  <option value="CODE_TYPE_QRCODE"
                  <eq name="card['base_info']['code_type']" value="CODE_TYPE_QRCODE">selected</eq>
                  >二维码和文本</option>
                  <option value="CODE_TYPE_ONLY_QRCODE"
                  <eq name="card['base_info']['code_type']" value="CODE_TYPE_ONLY_QRCODE">selected</eq>
                  >仅二维码</option>
                  <option value="CODE_TYPE_ONLY_BARCODE"
                  <eq name="card['base_info']['code_type']" value="CODE_TYPE_ONLY_BARCODE">selected</eq>
                  >仅条码</option>
                </select>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">使用提示 <span class="font-red">*</span></label>

              <div class="col-md-9">
                <input type="text" name="notice" id="notice" class="form-control input-medium"
                       value="{$card['base_info']['notice']}"/>
                <span class="help-block">使用提示，12汉字以内，例如：请出示二维码核销卡券</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">领券限制</label>

              <div class="col-md-9">
                <input type="text" name="get_limit" id="get_limit" class="form-control input-small"
                       value="{$card['base_info']['get_limit']}"/>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">用券限制</label>

              <div class="col-md-9">
                <input type="text" name="use_limit" id="use_limit" class="form-control input-small"
                       value="{$card['base_info']['use_limit']}"/>
                <span class="help-block"></span>
              </div>
            </div>
            <eq name="card['base_info']['date_info']['type']" value="1">
              <!-- 只有原卡券有效期类型是固定日期是才能修改有效期 -->
              <div class="form-group">
                <label class="col-md-2 control-label">有效期 <span class="font-red">*</span></label>

                <div class="col-md-9">
                  <div id="reportrange" class="btn default">
                    <i class="fa fa-calendar"></i>
                     <span>
                                    </span>
                    <b class="fa fa-angle-down"></b>
                  </div>
                  <input type="hidden" name="begin_timestamp" id="begin_timestamp"/>
                  <input type="hidden" name="end_timestamp" id="end_timestamp"/>
                  <span class="help-block">起始时间只允许前推，截止时间只允许后推，即修改后的日期区间应包含修改前区间</span>
                </div>
              </div>
            </eq>
            <div class="form-group">
              <label class="col-md-2 control-label">互动选项</label>

              <div class="col-md-9">
                <div class="checkbox-list">
                  <label class="checkbox-inline">
                    <input name="can_share" type="checkbox" value="1"
                    <eq name="card['base_info']['can_share']" value="true">checked</eq>
                    > 可分享 </label>
                  <label class="checkbox-inline">
                    <input name="can_give_friend" type="checkbox" value="1"
                    <eq name="card['base_info']['can_give_friend']" value="true">checked</eq>
                    > 可转赠 </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">使用说明 <span class="font-red">*</span></label>

              <div class="col-md-9">
                <textarea name="description" id="" cols="30" rows="5" class="form-control">{$card['base_info']['description']}</textarea>
                <span class="help-block">可分行，上限为1000字。</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">自定义跳转入口名称</label>

              <div class="col-md-9">
                <input type="text" name="custom_url_name" id="custom_url_name" class="form-control input-medium"
                       value="{$card['base_info']['custom_url_name']}"/>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">自定义跳转入口地址</label>

              <div class="col-md-9">
                <input type="text" name="custom_url" id="custom_url" class="form-control input-medium"
                       value="{$card['base_info']['custom_url']}"/>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">自定义跳转入口提示</label>

              <div class="col-md-9">
                <input type="text" name="custom_url_sub_title" id="custom_url_sub_title"
                       class="form-control input-medium" value="{$card['base_info']['custom_url_sub_title']}"/>
                <span class="help-block">6个汉字以内</span>
              </div>
            </div>
            <switch name="type">
              <case value="general_coupon">
                <div class="form-group">
                  <label class="col-md-2 control-label">通用券描述</label>

                  <div class="col-md-9">
                    <textarea name="default_detail" id="" cols="30" rows="5" class="form-control">{$card['default_detail']}</textarea>
                    <span class="help-block">可分行，上限为1000字。</span>
                  </div>
                </div>
              </case>
              <case value="member_card">
                <div class="form-group">
                  <label class="col-md-2 control-label">积分清零规则 <span class="font-red">*</span></label>

                  <div class="col-md-9">
                    <textarea name="bonus_cleared" class="form-control" cols="30"
                              rows="3">{$card['bonus_cleared']}</textarea>
                    <span class="help-block">积分清零规则说明，仅对支持积分的卡有效。</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">积分规则 <span class="font-red">*</span></label>

                  <div class="col-md-9">
                    <textarea name="bonus_rules" class="form-control" cols="30"
                              rows="3">{$card['bonus_rules']}</textarea>
                    <span class="help-block">积分规则说明，仅对支持积分的卡有效。</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">储值规则</label>

                  <div class="col-md-9">
                    <textarea name="balance_rules" class="form-control" cols="30"
                              rows="3">{$card['balance_rules']}</textarea>
                    <span class="help-block">储值规则说明，仅对支持储值的卡有效。</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">特权说明</label>

                  <div class="col-md-9">
                    <textarea name="prerogative" class="form-control" cols="30"
                              rows="3">{$card['prerogative']}</textarea>
                    <span class="help-block">会员卡特权说明。</span>
                  </div>
                </div>
              </case>
            </switch>
          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-md-offset-3 col-md-9">
                <input type="hidden" name="card_type" value="{$card_type}"/>
                <button type="submit" class="btn green">保存</button>
                <button type="button" class="btn default" onclick="javascript:history.go(-1);">取消</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop
@section('js')
  <script type="text/javascript"
          src="{{ asset('static') }}/metronic/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript"
          src="{{ asset('static') }}/metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script>
    $(function () {
      //切换颜色选项
      $('select#colorlsit').change(function (event) {
        var style = $(this).children('option:selected').attr('style');
        try {
          var color = style.match(/\#[0-9a-fA-F]{6}/)[0];
        } catch (e) {
          return fasle;
        }
        if (color) {
          $(this).css('background', color);
        }
      });

      //上传文件对话框
      $("a.btn-wxuploadimg").on('click', function () {
        var triggerItem = $(this); //触发弹出层的元素
        var data = triggerItem.data();
        top.dialog({
              id: 'dialog-uplpadfile',
              title: '上传卡券LOGO',
              fixed: true,
              quickClose: true,
              padding: 10,
              data: data,
              zIndex: 99999,
              url: "{{ user_url('/') }}",
              okValue: '确定',
              cancelValue: '取消',
              ok: function () {
                if (this.data.filepath) {
                  var picControl = triggerItem.parents('.pic-control');
                  //更新输入框值
                  picControl.find("input.pic-path").val(this.data.filepath);
                  //更新预览图片
                  picControl.find("img").attr("src", this.data.filepath);
                }
                ;
                this.close().remove();
              },
              cancel: function () {
              }
            })
            .show();
        return false;
      });
    });

    <
    eq
    name = "card['base_info']['date_info']['type']"
    value = "1" >
    //日期区间选择
    var handleDateRangePickers = function () {
      if (!jQuery().daterangepicker) {
        return;
      }

      var begin_timestamp = "{$card['base_info']['date_info']['begin_timestamp']}";
      var end_timestamp = "{$card['base_info']['date_info']['end_timestamp']}";

      //原起止日期
      var begin_date = moment(begin_timestamp, 'X');
      var end_date = moment(end_timestamp, 'X');

      $('#reportrange').daterangepicker({
            opens: (Metronic.isRTL() ? 'left' : 'right'),
            startDate: begin_date,
            endDate: end_date,
            minDate: moment(begin_date, 'X').subtract(30, 'days'),
            maxDate: moment("20301231", "YYYYMMDD"),
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
      $('#reportrange span').html(begin_date.format('YYYY/MM/DD') + ' - ' + end_date.format('YYYY/MM/DD'));
      //默认区间为当天至以后30天
      $("input#begin_timestamp").val(begin_timestamp);
      $("input#end_timestamp").val(end_timestamp);
    }();
    </
    eq >
  </script>
@stop