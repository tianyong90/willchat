@extends('user.public.baseindex')
@section('main')
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-comment"></i> 消息模板列表
      </div>
      <div class="actions">
        <!-- <a href="#modal-industry" data-toggle="modal" class="btn circle grey btn-xs">
            <i class="fa fa-cog"></i>&nbsp;所属行业设置</a> -->
        <a href="{{ user_url('/') }}" class="btn default blue-stripe btn-xs dialog-popup"><i
              class="fa fa-plus"></i>&nbsp;添加消息模板</a>
      </div>
    </div>
    <div class="portlet-body">
      <div class="note note-info">
        <h4 class="block">使用提示</h4>

        <p>1.使用模板消息推送需要先在微信公众平台申请开通模板消息功能模块。</p>

        <p>1.模板消息推送仅适用于对接了会员系统的公众号。</p>

        <p>2.必须先正确设置AppId和AppSecret.</p>

        <p>3.在会员系统进行消费、充值等操作时将会向对应会员的微信推送模板消息。</p>
      </div>
      <div class="table-scrollable">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th>#</th>
            <th>模板类型</th>
            <th>模板ID</th>
            <th>更新时间</th>
            <th>使用次数</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <notempty name="msg_tmpls">
            <volist name="msg_tmpls" id="vo">
              <tr>
                <td>{$i}</td>
                <td>{$msgtmpl_type[$vo['type']]}</td>
                <td>{$vo.tmpl_id}</td>
                <td>{$vo.update_time|time_format}</td>
                <td>{$vo.useage}</td>
                <td>
                  <a class="btn blue btn-xs dialog-popup"
                     href="{{ user_url('/') }}">修改</a>
                  <button class="btn red btn-xs btn-delete-confirm"
                          data-link="{{ user_url('/') }}">删除
                  </button>
                </td>
              </tr>
            </volist>
            <else/>
            <tr>
              <td colspan="20" class="row-nodata">暂无模板</td>
            </tr>
          </notempty>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop
@section('script')
  <script>
    $(document).ready(function () {

      // var industryObj={$industryJson};

      // //行业二级联动下拉
      // $('#select1').change(function(event) {
      //     // console.log($(this).val());
      //     var id=$(this).val();

      //     var index=$(this)[0].selectedIndex;
      //     var sub=industryObj[index].childrens;

      //     //二级下拉清空
      //     $subSelect=$('#select2');
      //     $subSelect.children('option').remove();
      //     $.each(sub, function(index1, val1) {
      //         var $option=$('<option>');
      //         $option.prop('value', val1.id);
      //         $option.html(val1.name);
      //         $subSelect.append($option);
      //     });
      //     return;
      // });

      // $('button.modalbtn-save').click(function(){
      //     $(this).parents(".modal-dialog").find('form').submit();
      // });

      // //含有表单的modal隐藏时重置表单
      // $('.modal').has('form').on('hide.bs.modal', function(event) {
      //      $(this).find('form')[0].reset();
      // });

      // //弹出新增弹窗时先重置其中的表单
      // $('.modal').has('form').on('show.bs.modal', function(event) {
      //     var trigger=event.relatedTarget;
      //     //如果由添加按钮唤出，则青工为添加
      //     if($(trigger).hasClass('addbtn')){
      //         $(this).find('.modal-title').html('添加消息模板');
      //         $(this).find('form')[0].reset();
      //     }
      // });

      // //编辑
      // $('a.edit-text').click(function (event) {
      //     event.preventDefault();
      //     var url = $(this).data('url');
      //     $.post(url, null, function (data, textStatus, xhr) {
      //         if (data) {
      //             var $editModal = $("#modal-edit");
      //             $editModal.find('.modal-title').html('编辑消息模板');
      //             $editModal.find('input[name=id]').val(data.id);
      //             $editModal.find('input[name=tmpl_id]').val(data.tmpl_id);
      //             $editModal.find('textarea[name=description]').val(data.description);
      //             $editModal.find('textarea[name=parameter_map]').val(data.pmap_str);
      //             $editModal.find('select[name=type]').children('option[value='+data.type+']').first().attr('selected', 'selected');

      //             $editModal.modal('show');
      //         }
      //     }, "json");
      // });
    });
  </script>
@stop