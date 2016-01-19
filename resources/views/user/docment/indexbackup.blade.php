<extend name="Public/baseindex"/>
<block name="profile-content">
  <div class="row">
    <div class="col-md-12">
      <!-- BEGIN PORTLET -->
      <div class="portlet light ">
        <div class="portlet-title">
          <div class="caption caption-md">
            <i class="icon-bar-chart theme-font hide"></i>
            <span class="caption-subject font-blue-madison bold uppercase">帮助中心</span>
          </div>
          <!-- <div class="actions">
              <a href="{{ user_url('/') }}" class="btn default blue-stripe btn-xs"><i class="fa fa-plus"></i>&nbsp;添加公众号</a>
          </div> -->
        </div>
        <div class="portlet-body">
          <div class="row">
            <div class="col-md-3">
              <ul class="ver-inline-menu tabbable margin-bottom-10">
                <li class="active">
                  <a data-toggle="tab" href="#tab_1">
                    <i class="fa fa-briefcase"></i> 常见问题 </a>
                                    <span class="after">
                                    </span>
                </li>
                <li>
                  <a data-toggle="tab" href="#tab_2">
                    <i class="fa fa-group"></i> 专题说明 </a>
                </li>
                <li>
                  <a data-toggle="tab" href="#tab_3">
                    <i class="fa fa-leaf"></i> 其它 </a>
                </li>
              </ul>
            </div>
            <div class="col-md-9">
              <div class="tab-content">
                <div id="tab_1" class="tab-pane active">
                  <div id="accordion1" class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1"
                             href="#accordion1_1">
                            1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                        </h4>
                      </div>
                      <div id="accordion1_1" class="panel-collapse collapse in">
                        <div class="panel-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                          squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                          nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                          single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer
                          labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                          Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                          haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="tab_2" class="tab-pane">
                  <div id="accordion2" class="panel-group">

                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                             href="#accordion2_7">
                            7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
                        </h4>
                      </div>
                      <div id="accordion2_7" class="panel-collapse collapse">
                        <div class="panel-body">
                          3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                          laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                          coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                          anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                          occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                          heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                          Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                          assumenda shoreditch et
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END PORTLET -->
    </div>
  </div>
@stop
@section('script')

@stop