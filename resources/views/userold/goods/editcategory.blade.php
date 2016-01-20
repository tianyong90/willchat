<extend name="Public/dcontentbase"/>
@section('style')
  <style>
    .dialog-content {
      height: 400px;
    }
  </style>
@stop
<block name="content">
  <!-- BEGIN PAGE CONTENT-->
  <div class="dialog-content form">
    <form class="validate" action="__SELF__" method="post">
      <div class="form-body">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1_1" data-toggle="tab">基本信息</a></li>
          <li><a href="#tab_1_2" data-toggle="tab">分类属性</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade active in" id="tab_1_1">
            <input type="hidden" name="id"/>

            <div class="form-group">
              <label>分类名称</label>
              <input type="text" name="name" value="{$info.name}" class="form-control input-medium" placeholder="">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label>简介</label>
              <textarea name="description" id="" cols="30" rows="3" class="form-control">{$info.description}</textarea>
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label>排序</label>
              <input type="text" class="form-control input-small" name="sort" value="{$info.sort}"/>
              <span class="help-block">值越大越靠前</span>
            </div>
          </div>
          <div class="tab-pane fade" id="tab_1_2">
            <div class="actions">
              <a href="javascript:;" class="btn default blue-stripe fa fa-plus" id="add-attr">添加属性</a>
            </div>
            <div class="table-scrollable">
              <table class="table table-striped table-hover" id="attr-table">
                <thead>
                <tr>
                  <th>属性名称</th>
                  <!-- <th>是关键属性</th>
                  <th>更新时间</th> -->
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <notempty name="attr_list">
                  <volist name="attr_list" id="vo" key="key">
                    <tr>
                      <td><input type="hidden" name="attr_id[{$key}]" class="form-control" value="{$vo.attr_id}"/><input
                            type="text" name="attr_name[{$key}]" class="form-control" value="{$vo.attr_name}"/></td>
                      <!-- <td><input class="form-control" type="checkbox" name="is_key_attribute[{$key}]" value="1" <eq name="vo.is_key_attribute" value="1">checked</eq>/></td>
                      <td>{$vo.update_time|time_format}</td> -->
                      <td class="norightborder">
                        <span class="btn red btn-xs clear-row">删除</span>
                      </td>
                    </tr>
                  </volist>
                  <else/>
                  <tr class="no-data">
                    <td colspan="70" style="text-align:center;">该分类未添加属性</td>
                  </tr>
                </notempty>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="form-actions">
        <input type="hidden" name="id" value="{$info.id}"/>
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-danger btn-closedialog">取消</button>
      </div>
    </form>
  </div>
  <!-- END PAGE CONTENT-->
  @stop
  @section('script')
    <script src="{{ asset('static') }}/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js"
            type="text/javascript"></script>
    <script src="{{ asset('static') }}/metronic/global/plugins/jquery-validation/js/localization/messages_zh.min.js"
            type="text/javascript"></script>
    <script>
      $(function () {
        $('a#add-attr').click(function (event) {
          //生成随机值作为数组KEY
          var randKey = parseInt(Math.random() * 100000000);
          var rowHtml = "<tr><td><input name='attr_id[" + randKey + "]' type='hidden'/><input name='attr_name[" + randKey + "]' type='text' class='form-control'/></td><td><span class='btn btn-warning btn-xs clear-row'>清除</span></td></tr>";

          // var rowHtml="<tr><td><input name='attr_id["+randKey+"]' type='hidden'/><input name='attr_name["+randKey+"]' type='text' class='form-control'/></td><td><input name='is_key_attribute["+randKey+"]' value='1' type='checkbox' class='form-control'/></td><td></td><td><span class='btn btn-warning btn-xs clear-row'>清除</span></td></tr>";
          //插入新的行
          var tbody = $("table#attr-table").find('tbody');
          tbody.prepend(rowHtml);
          //删除提示暂无数据的行
          tbody.find('tr.no-data').remove();
          //uniform美化手信的checkbox
          $('input:checkbox').uniform();
        });

        //编辑分类属性，删除行
        $('table#attr-table').on('click', 'span.clear-row', function (event) {
          event.preventDefault();
          $(this).parents('tr').remove();
        });

        //表单验证
        $('form').validate({
          errorElement: 'span',
          errorClass: 'error',
          focusInvalid: true,
          rules: {
            name: {
              required: true,
              rangelength: [1, 25]
            }

          },

          messages: {
            name: {
              required: "请填写分类名称"
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
                top.Base.error(data.info);
              }
            }, 'json');
          }
        });
      })
    </script>
@stop