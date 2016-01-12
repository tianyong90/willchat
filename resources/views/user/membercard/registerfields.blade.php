<extend name="Public/dcontentbase" />
@section('style')
    <style>
        .dialog-content {
            width: 400px;
        }
    </style>
@stop
<block name="content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="dialog-content form">
        <form action="__SELF__" method="post">
            <div class="form-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover" id="attr-table">
                        <thead>
                            <tr>
                                <th>字段名</th>
                                <th>是否显示</th>
                                <th>是否必填</th>
                            </tr>
                        </thead>
                        <tbody>
                            <notempty name="list">
                                <foreach name="list" item="item" key="k">
                                    <tr>
                                        <td>{$item.title}</td>
                                        <td>
                                            <input class="form-control" type="checkbox" name="field_list[]" value="{$k}" <in name="k" value="$info['field_list']">checked</in>>
                                        </td>
                                        <td>
                                            <input class="form-control" type="checkbox" name="required_list[]" value="{$k}" <in name="k" value="$info['required_list']">checked</in>>
                                        </td>
                                    </tr>
                                </foreach>
                            <else/>
                                <tr class="no-data">
                                    <td colspan="70" style="text-align:center;">无可选字段</td>
                                </tr>
                            </notempty>
                        </tbody>
                    </table>
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
<script>
    $(function() {
        
    })
</script>
@stop