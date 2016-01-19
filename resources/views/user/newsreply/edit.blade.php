<extend name="Public/dcontentbase"/>
@section('style')
@stop
<block name="content">
  <!-- BEGIN PAGE CONTENT-->
  <div class="dialog-content form">
    <form class="validate" action="__SELF__" method="post">
      <div class="form-body">
        <div class="form-group">
          <label>关键词</label>
          <input type="text" name="keyword" value="{$info.keyword}" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>标题</label>
          <input type="text" name="title" value="{$info.title}" class="form-control" placeholder="">
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>简介</label>
          <textarea name="description" id="" cols="30" rows="3" class="form-control">{$info.description}</textarea>
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>文章所属分类</label>
          <select name="cate_id" id="" class="form-control">
            <option value="0">***不关联分类***</option>
            <volist name="catetree" id="treeitem">
              <option value="{$treeitem.id}"
              <eq name="info.cate_id" value="$treeitem.id">selected</eq>
              >{$treeitem.name}</option>
              <notempty name="treeitem._child">
                <volist name="treeitem._child" id="child">
                  <option value="{$child.id}"
                  <eq name="info.cate_id" value="$child.id">selected</eq>
                  >&nbsp;┕──{$child.name}</option>
                </volist>
              </notempty>
            </volist>
          </select>
        </div>
        <div class="form-group">
          <label>封面图片地址</label>
          {:W('User/piccontrol',array('pic_path',$info['pic_path'],'focus'))}
        </div>
        <div class="form-group">
          <label>图文详细内容</label>
          <textarea class="editor" id="content" name="content" rows="5">{$info.content}</textarea>
        </div>
        <div class="form-group">
          <label>外链地址</label>

          <div class="input-group">
            <input type="text" name="url" value="{$info.url}" id="url" class="form-control" placeholder="手动输入或从功能模块选择">
            <span class="input-group-btn"><a class="btn green" data-toggle="modal" data-target="#linkselect"
                                             href="{:U('User/Link/insert',array('targetid'=>'url'))}"><i
                    class="fa fa-link"></i></a></span>
          </div>
          <span class="help-block">如果填写了图文详细内容，这里请留空，不要设置！</span>
        </div>
        <div class="form-group">
          <label>排序</label>
          <input type="text" name="sort" value="{$info.sort}" class="form-control" placeholder="">
          <span class="help-block">值越大越靠前</span>
        </div>
        <div class="form-group">
          <label>启用状态</label>

          <div class="radio-list">
            <label class="radio-inline">
              <input type="radio" name="status" value="1" checked> 正常 </label>
            <label class="radio-inline">
              <input type="radio" name="status" value="0"
              <eq name="info.status" value="0">checked</eq>
              > 禁用 </label>
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
    <script type="text/javascript" charset="utf-8" src="{{ asset('static') }}/ueditor/ueditor-front.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('static') }}/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('static') }}/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script src="{{ asset('static') }}/jquery-validation-1.14.0/dist/jquery.validate.min.js"
            type="text/javascript"></script>
    <script src="{{ asset('static') }}/jquery-validation-1.14.0/dist/localization/messages_zh.min.js"
            type="text/javascript"></script>
    <script>
      var editors = $('textarea.editor');
      $.each(editors, function (index, val) {
        UE.getEditor($(val).attr('id'));
      });

      $(function () {
        //表单验证
        $('form').validate({
          errorElement: 'span',
          errorClass: 'error',
          focusInvalid: true,
          rules: {
            title: {
              required: true,
              rangelength: [2, 25]
            },
            telephone: {
              rangelength: [2, 25]
            },
            mobile: {
              required: true,
              rangelength: [6, 40]
            },
            address: {
              required: true,
              maxlength: 50
            },
            logourl: {
              required: true
            }

          },

          messages: {
            name: {
              required: "请填写标题"
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
                top.Base.success(data.info);
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