@extends('user.public.baseindex')
@section('style')
    <link href="{{ asset('static') }}/cropper-master/dist/cropper.min.css" rel="stylesheet">
    <link href="{{ asset('css/user') }}/avatar.css" rel="stylesheet">
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">头像设置</span>
                    </div>
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="{:U('userinfo')}">个人信息设置</a>
                        </li>
                        <li class="active">
                            <a href="{:U('avatar')}">头像设置</a>
                        </li>
                        <li>
                            <a href="{:U('updatepwd')}">修改密码</a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="avatar-body">
                            <div class="avatar-upload">
                                <label for="avatar-file">选择图片</label>
                                <input class="avatar-input" id="avatar-file" name="avatar_file" type="file" accept=".jpg,.jpeg,.png">
                            </div>
                            <!-- Crop and preview -->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="avatar-wrapper">
                                        <img id="avatar" src="" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="avatar-preview preview-lg"></div>
                                    <div class="avatar-preview preview-md"></div>
                                    <div class="avatar-preview preview-sm"></div>
                                </div>
                            </div>
                            <div class="row avatar-btns">
                                <div class="col-sm-5">
                                    <label for="">拖动滑块旋转图片</label>
                                    <div id="rotate-slider" class="slider slider-basic bg-blue">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button id="save-avatar" class="btn btn-primary btn-block" type="button">保存头像</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ asset('static') }}/cropper-master/dist/cropper.min.js"></script>
    <script src="{{ asset('static') }}/uploader-master/dist/uploader.min.js"></script>
    <script type="text/javascript" charset="utf-8">
            $(function(){
                var $avatar = $('img#avatar');
                var $avatarPreview = $('.avatar-preview'); //头像预览
                var $avatarFileInput = $('input#avatar-file'); //文件输入框
                //初始裁剪控件
                $avatar.cropper({
                    aspectRatio: 1,
                    preview: $avatarPreview.selector,
                    strict: true
                });

                var URL = window.URL || window.webkitURL;
                var blobURL;
                if (URL) {
                    $avatarFileInput.change(function () {
                        var files = this.files;
                        var file;
                        if (!$avatar.data('cropper')) {
                            return;
                        }
                        if (files && files.length) {
                            file = files[0];
                            if (/^image\/\w+$/.test(file.type)) {
                                blobURL = URL.createObjectURL(file);
                                $avatar.one('built.cropper', function () {
                                    URL.revokeObjectURL(blobURL); // Revoke when load complete
                                }).cropper('reset').cropper('replace', blobURL);
                            } else {
                                $body.tooltip('Please choose an image file.', 'warning');
                            }
                        }
                    });
                } else {
                    $avatarFileInput.parent().remove();
                }

                //点击保存时执行上传操作
                $('button#save-avatar').click(function(event) {
                    var cropData = $avatar.cropper('getData', true);

                    cropData._token = '{{ csrf_token() }}';
                    //上传
                    $avatarFileInput.uploader({
                        url: '{{ user_url('avatar') }}',
                        dataType: 'json',
                        autoUpload: false,
                        method: 'POST',
                        dropzone: '.avatar-wrapper',
                        data: cropData, //将裁剪相关数据一起提交
                        upload: function (e) {
                            //$logs.empty().append(p('All files uploading'));
                        },
                        start: function (e) {
                            //$logs.append(p('* File ' + (e.index + 1) + ' uploading'));
                        },
                        progress: function (e) {
                            //$logs.append(p('* File ' + (e.index + 1) + ' uploaded: ' + Math.round(e.loaded / e.total * 100) + '%'));
                        },
                        done: function (e, data) {
                            //$logs.append(p('* File ' + (e.index + 1) + ' result: ' + data.result));
                            Base.success(data.info);
                            setTimeout(function(){top.location.reload();},2000);
                        },
                        fail: function (e, textStatus) {
                            //$logs.append(p('* File ' + (e.index + 1) + ' result: ' + textStatus));
                            Base.error(e.info);
                        },
                        end: function (e) {
                            //$logs.append(p('* File ' + (e.index + 1) + ' completed'));
                        },
                        uploaded: function (e) {
                            //$logs.append(p('All files uploaded'));
                        }
                    });
                    $avatarFileInput.uploader('upload');
                });
                
                //图片转动滑块
                $("#rotate-slider").slider({
                    min:0,
                    max:360,
                    step:10,
                    value:0,
                    change:function(event, ui){
                        var data=$avatar.cropper('getData');
                        //之前已经旋转的角度
                        var oldDegree=data.rotate;
                        var rotateDegree=ui.value-oldDegree;
                        $avatar.cropper('rotate', rotateDegree);
                    }
                });
                
            })
    </script>
@stop