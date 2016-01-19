@extends('user.public.baseindex')
@section('style')
@stop
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-users"></i> CODE管理
      </div>
    </div>
    <div class="portlet-body">
      <div class="note note-info">
        <h4 class="block">温馨提示：</h4>
        CODE核销以及设置CODE失败均为不可逆操作，请操作前确认所输入的CODE无误。<br/>
        可使用条码扫描枪进行输入。<br/>
      </div>
      <div class="form">
        <form action="{:U('consumeCode',array('token'=>$token))}" class="form-horizontal" role="form">
          <fieldset>
            <legend>CODE核销</legend>
            <div class="form-body">
              <div class="form-group">
                <div class="col-md-6">
                  <div class="input-group">
                    <div class="input-icon">
                      <i class="fa fa-lock fa-fw"></i>
                      <input id="code" class="form-control" type="text" name="code" placeholder="请输入要核销的CODE"/>
                    </div>
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit"><i
                                                  class="fa fa-arrow-left fa-fw"></i> 核销CODE
                                            </button>
                                        </span>
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
        </form>

        <form action="{:U('unavailableCode',array('token'=>$token))}" class="form-horizontal" role="form">
          <fieldset>
            <legend>设置CODE失效</legend>
            <div class="form-body">
              <div class="form-group">
                <div class="col-md-6">
                  <div class="input-group">
                    <div class="input-icon">
                      <i class="fa fa-lock fa-fw"></i>
                      <input id="code" class="form-control" type="text" name="code" placeholder="请输入要操作的CODE"/>
                    </div>
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit"><i
                                                  class="fa fa-arrow-left fa-fw"></i> 设置CODE失效
                                            </button>
                                        </span>
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
@stop