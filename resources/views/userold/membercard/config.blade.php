@extends('user.public.baseindex')
@section('style')
  <link rel="stylesheet" href="{{ asset('css') }}/user/metronicuser.css"/>
  <link rel="stylesheet"
        href="{{ asset('static') }}/metronic/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-credit-card "></i> 会员卡设置
      </div>
    </div>
    <div class="portlet-body form">
      <div class="containet">
        <form class="form-horizontal validate" role="form" method="post" action="__SELF__">
          <div class="form-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-md-2 control-label">会员卡名称</label>

                  <div class="col-md-9">
                    <input name="name" type="text" id="name"
                           class="form-control input-large" value="{$cardinfo.name}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">默认会员等级</label>

                  <div class="col-md-9">
                    <select class="form-control input-large" id="level_id" name="level_id"
                            value="{$cardinfo.level_id}">
                      <volist name="levellist" id="item">
                        <option value="{$item.ID}" score="{$item.NeedPoint|default=0}"
                        <eq name="cardinfo.level_id" value="$item.ID">selected="selected"</eq>
                        >{$item.LevelName}</option>
                      </volist>
                    </select>
                    <span class="help-block">会员通过微信注册后所属的会员等级，必选</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">卡名文字颜色</label>

                  <div class="col-md-9">
                    <input name="namecolor" type="text" data-target="#vipname" id="namecolor"
                           class="colorpicker-default form-control input-small"
                           value="{$cardinfo.namecolor}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">卡号文字颜色</label>

                  <div class="col-md-9">
                    <input name="numbercolor" data-target="#number" type="text" id="numbercolor"
                           class="colorpicker-default form-control input-small"
                           value="{$cardinfo.numbercolor}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">会员卡背景</label>

                  <div class="col-md-9">
                    <select name="bg" id="select-bg" class="form-control input-small">
                      <for start="1" end="26">
                        <option value="{$i}"
                        <eq name="cardinfo.bg" value="$i">selected</eq>
                        >{$i}</option>}
                      </for>
                    </select>
                    <span class="help-block">若要使用内置会员卡背景，请将下方自定义背景输入框留空。</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">自定义背景</label>

                  <div class="col-md-9">
                    {:W('User/piccontrol',array('diybg',$cardinfo['diybg'],'focus',true,true,true))}
                    <span class="help-block">背景图片宽高比5:3，建议上传尺寸300*180像素</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">会员卡图标</label>

                  <div class="col-md-9">
                    {:W('User/piccontrol',array('logo',$cardinfo['logo'],'logo',true,true,true))}
                    <span class="help-block">自定义LOGO建议选择宽高比为1，宽度40-120像素的PNG图片。</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">显示项目</label>

                  <div class="col-md-9">
                    <div class="checkbox-list">
                      <label class="checkbox-inline">
                        <input type="checkbox" name="display_cardname" value="1"
                        <notempty name="cardinfo.display_cardname">checked</notempty>
                        > 会员卡名
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="display_cardnumber" value="1"
                        <notempty name="cardinfo.display_cardnumber">checked</notempty>
                        > 会员卡号
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="display_cardlogo" value="1"
                        <notempty name="cardinfo.display_cardlogo">checked</notempty>
                        > 会员卡图标
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">卡号规则</label>

                  <div class="col-md-9">
                    <a href="{{ user_url('/') }}" class="btn btn-primary btn-sm dialog-popup">点击设置规则</a>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">会员注册字段</label>

                  <div class="col-md-9">
                    <a href="{{ user_url('/') }}" class="btn btn-primary btn-sm dialog-popup">点击设置字段</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <!-- 会员卡预览 -->
                <div id="cardpreview"
                     style="background-image:url(__ROOT__/Public/Wap/images/MemberCard/card_bg/card_bg{$cardinfo.bg|default=1}.png);">
                  <img id="cardlogo" class="logo" src="__ROOT__{$cardinfo.logo}">

                  <h1 id="vipname" style="color:{$cardinfo.namecolor};">{$cardinfo.name}</h1>

                  <div class="pdo verify" id="number" style="color:{$cardinfo.numbercolor}">LUCK888888</div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-md-offset-3 col-md-9">
                <input type="hidden" name="id" value="{$cardinfo.id}"/>
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
  <script
      src="{{ asset('static') }}/metronic/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script src="{{ asset('static') }}/jquery-validation-1.14.0/dist/jquery.validate.min.js"
          type="text/javascript"></script>
  <script src="{{ asset('static') }}/jquery-validation-1.14.0/dist/localization/messages_zh.min.js"
          type="text/javascript"></script>
  <script>
    $(function () {
      //表单验证
      $('form').validate({
        errorElement: 'span',
        errorClass: 'error',
        focusInvalid: true,
        rules: {
          name: {
            required: true,
            rangelength: [2, 25]
          },
          level_id: {
            required: true,
          }

        },

        messages: {
          name: {
            required: "请输会员卡名称"
          }
        },

        onfocusout: function (element) {
          $(element).valid();
        },

        highlight: function (element) {
          $(element)
              .closest('.form-group').addClass('has-error');
        },

        success: function (label) {
          label.closest('.form-group').removeClass('has-error');
          label.remove();
        },

        errorPlacement: function (error, element) {
          if (element.parents(".input-group").length > 0) {
            error.insertAfter(element.closest('.input-group'));
          } else {
            error.insertAfter(element);
          }
        },

        submitHandler: function (form) {
          var formData = $(form).serialize();
          var url = $(form).attr('action');
          $.post(url, formData, function (data, textStatus, xhr) {
            if (data.status) {
              Base.success(data.info);
              if (data.url) {
                setTimeout(function () {
                  top.location.href = data.url
                }, 2000)
              } else {
                setTimeout(function () {
                  top.location.reload();
                }, 2000)
              }
            } else {
              Base.error(data.info);
            }
          }, 'json');
        }
      });
    })

    $(function () {
      //选择卡背景时即时预览
      $('select#select-bg').change(function (event) {
        var bgIndex = $(this).val();
        $('div#cardpreview').css('background-image', 'url(__ROOT__/Public/Wap/images/MemberCard/card_bg/card_bg' + bgIndex + '.png)');
      });

      //颜色选择器功能
      $(".colorpicker-default").colorpicker().on('changeColor', function (event) {
        event.preventDefault();
        var color = event.color.toHex();
        var item = $(this).attr('data-target');
        $(item).css('color', color);
      }).change(function () {
        var item = $(this).attr('data-target');
        $(item).css('color', $(this).val());
      });
    });
  </script>
@stop