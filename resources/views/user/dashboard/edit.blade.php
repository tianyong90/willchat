@extends('user.public.baseindex')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="portlet light" id="wizard-form">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-edit"></i> 公众号设置
          </div>
        </div>
        <div class="portlet-body form">
          <form action="{{url()}}" class="form-horizontal" id="submit_form" method="POST">
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
                                    <i class="fa fa-check"></i>对接公众平台</span>
                    </a>
                  </li>
                  <li>
                    <a href="#tab3" data-toggle="tab" class="step active">
                                    <span class="number">
                                    3 </span>
                                    <span class="desc">
                                    <i class="fa fa-check"></i>对接会员系统</span>
                    </a>
                  </li>
                  <li>
                    <a href="#tab4" data-toggle="tab" class="step">
                                    <span class="number">
                                    4 </span>
                                    <span class="desc">
                                    <i class="fa fa-check"></i>完成</span>
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
                    <h3 class="block">填写公众号基本信息</h3>
                    <input type="hidden" name="id" value="{$info.id}"/>

                    <div class="form-group">
                      <label class="control-label col-md-3">公众号名称<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="wxname" value="{$info.wxname}"/>
                        <span class="help-block">请填写公众号名称</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">公众号类型<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <select id="type" name="type" class="form-control">
                          <option value="1"
                          <eq name="info.type" value="1">selected</eq>
                          >订阅号</option>
                          <option value="2"
                          <eq name="info.type" value="2">selected</eq>
                          >认证订阅号</option>
                          <option value="3"
                          <eq name="info.type" value="3">selected</eq>
                          >服务号</option>
                          <option value="4"
                          <eq name="info.type" value="4">selected</eq>
                          >认证服务号</option>
                        </select>
                        <span class="help-block">选择公众号类型</span>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab2">
                    <h3 class="block">对接公众平台</h3>
                    <blockquote class="note note-info">
                      <p>请登录微信公众平台,进入开发者中心页面，填写URL及Token，并将开发都中心显示的AppID、AppSecret以及EncodingAesKey填入下面的表单中。</p>

                      <p>
                        URL(服务器地址):<span class="font-blue wx-url-display">http://{$Think.server.HTTP_HOST}/index.php/token/{$info.token}</span>
                      </p>

                      <p>
                        Token(令牌):<span class="font-blue wx-token-display">{$info.token}</span>
                      </p>
                    </blockquote>
                    <div class="form-group">
                      <label class="control-label col-md-3">token<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="token" value="{$info.token}" readonly/>
                        <span class="help-block">token由系统随机生成</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">AppID<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="appid" value="{$info.appid}"/>
                        <span class="help-block">请填写公众号AppID</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">AppSecret<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="appsecret" value="{$info.appsecret}"/>
                        <span class="help-block">请填写公众号AppSecret</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">EncodingAESKey<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="encodingaeskey" value="{$info.encodingaeskey}"/>
                        <span class="help-block">请填写公众号EncodingAesKey</span>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab3">
                    <h3 class="block">对接会员系统</h3>
                    <blockquote class="note note-info">
                      <p>如需对接会员系统,请填下面的表单中所有参数。同时登录对应的会员系统平台，在全局参数设置界面设置信息接口参数。</p>

                      <p>
                        接口地址：<span class="font-blue">http://wx.600vip.cn</span>
                      </p>

                      <p>
                        Token：<span class="font-blue wx-token-display">{$info.token}</span>
                      </p>
                    </blockquote>
                    <div class="form-group">
                      <label class="control-label col-md-3">会员系统版本<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <select id="luckversion" name="luckversion" class="form-control" value="{$info.luckversion}"
                                onchange="versionchange(this)" disabled readonly>
                          <option value="NAKE_JD"
                          <eq name="info.luckversion" value="NAKE_JD">selected</eq>
                          >经典版</option>
                          <option value="NAKE_SM"
                          <eq name="info.luckversion" value="NAKE_SM">selected</eq>
                          >商盟基础版</option>
                          <option value="NAKE_SM_ULTIMATE"
                          <eq name="info.luckversion" value="NAKE_SM_ULTIMATE">selected</eq>
                          >商盟旗舰版</option>
                          <option value="NAKE_QY"
                          <eq name="info.luckversion" value="NAKE_QY">selected</eq>
                          >企业版</option>
                        </select>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">接口地址<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="luckinterface" value="" readonly/>
                        <span class="help-block">请填写要对接的会员系统地址</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">接口密钥<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="luckkey" value="" readonly/>
                        <span class="help-block">请填写对接的会员系统接口密钥</span>
                      </div>
                    </div>
                    <div class="form-group" id="code-set">
                      <label class="control-label col-md-3">企业号<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="enterprisecode" value="" readonly/>
                        <span class="help-block">填写企业代码，对接企业版什么系统必填</span>
                      </div>
                    </div>
                    <div class="form-group" id="shopid-set">
                      <label class="control-label col-md-3">店铺号<span class="required">
                                        * </span>
                      </label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="shopid" value="" readonly/>
                        <span class="help-block">请填写店铺号，对接商盟旗舰版必填</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <span class="col-md-3"></span>
                      <a href="javascript:;" class="btn btn-primary" id="testinterface">测试接口</a>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab4">
                    <h3 class="block">公众号配置信息</h3>
                    <blockquote class="note note-info">
                      <p>请确认如下信息,如有错误可返回修改.</p>
                    </blockquote>
                    <h4 class="form-section">基本信息</h4>

                    <div class="form-group">
                      <label class="control-label col-md-3">公众号名称:</label>

                      <div class="col-md-4">
                        <p class="form-control-static" data-display="wxname">
                        </p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">公众号类型:</label>

                      <div class="col-md-4">
                        <p class="form-control-static" data-display="type">
                        </p>
                      </div>
                    </div>
                    <h4 class="form-section">公众平台对接参数</h4>

                    <div class="form-group">
                      <label class="control-label col-md-3">URL:</label>

                      <div class="col-md-4">
                        <p class="form-control-static wx-url-display">
                          http://{$Think.server.HTTP_HOST}/index.php/token/{$info.token}
                        </p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">token:</label>

                      <div class="col-md-4">
                        <p class="form-control-static" data-display="token">
                        </p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">EncodingAESKey:</label>

                      <div class="col-md-4">
                        <p class="form-control-static" data-display="encodingaeskey">
                        </p>
                      </div>
                    </div>
                    <h4 class="form-section">会员系统对接参数</h4>

                    <div class="form-group">
                      <label class="control-label col-md-3">接口地址:</label>

                      <div class="col-md-4">
                        <p class="form-control-static" data-display="luckinterface">
                        </p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">接口密钥:</label>

                      <div class="col-md-4">
                        <p class="form-control-static" data-display="luckkey">
                        </p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">会员系统版本:</label>

                      <div class="col-md-4">
                        <p class="form-control-static" data-display="luckversion">
                        </p>
                      </div>
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
      </div>
    </div>
  </div>
  @stop
  @section('script')
      <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script type="text/javascript"
          src="{{ asset('static') }}/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
  <script type="text/javascript"
          src="{{ asset('static') }}/metronic/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
  <script type="text/javascript"
          src="{{ asset('static') }}/metronic/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('js/user') }}/wxedit.js"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
  <script>
    //测试纳客接口
    var testLuckInterface = function () {
      var interfaceUrl = $("input[name=luckinterface]").val();
      var token = $("input[name=token]").val();
      var enterprisecode = $("input[name=enterprisecode]").val();
      var luckversion = $("select[name=luckversion]").val();
      var luckkey = $("input[name=luckkey]").val();
      var shopid = $("input[name=shopid]").val();
      if (interfaceUrl === '') {
        Base.error('请先填写接口地址');
        return;
      }
      if (luckkey === '') {
        Base.error('请先填写接口密钥');
        return;
      }
      //如果对接的是企业版则要求填写企业代码
      if (luckversion === 'NAKE_QY' && enterprisecode === '') {
        Base.error('请先填写企业代码');
        return;
      }
      //如果对接的是企业版则要求填写企业代码
      if (luckversion === 'NAKE_SM_ULTIMATE' && shopid === '') {
        Base.error('请先填写店铺号');
        return;
      }
      var data = {
        "token": token,
        "url": interfaceUrl,
        "luckversion": luckversion,
        "luckkey": luckkey,
        "enterprisecode": enterprisecode,
        "shopid": shopid
      }
      //接口测试
      $.ajax({
        type: "get",
        url: "{{ user_url('/') }}",
        dataType: "json",
        data: data,
        success: function (response) {
          if (response.status) {
            Base.success(response.info);
          } else {
            Base.error(response.info);
          }
          ;
        },
        error: function (response) {
          Base.error("接口对接测试失败");
        }
      });
    };
    function versionchange(e) {
      if ($(e).val() === 'NAKE_QY') {
        $("#code-set").show();
      } else {
        $("#code-set").hide();
      }
      if ($(e).val() === 'NAKE_SM_ULTIMATE') {
        $("#shopid-set").show();
      } else {
        $("#shopid-set").hide();
      }
    }
    $(function () {
      FormWizard.init();
      $('a#testinterface').click(function (event) {
        testLuckInterface();
      });

      if ($("#luckversion").val() === 'NAKE_QY') {
        $("#code-set").show();
      } else {
        $("#code-set").hide();
      }
      if ($("#luckversion").val() === 'NAKE_SM_ULTIMATE') {
        $("#shopid-set").show();
      } else {
        $("#shopid-set").hide();
      }
    });
  </script>
@stop