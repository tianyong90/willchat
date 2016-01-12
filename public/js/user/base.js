var Base=function(){
    var initConfirmation=function(){
        //数据表格中删除按钮的弹出确认
        $('.btn-delete-confirm').confirmation({
            "title":"确定删除？",
            "singleton": true,
            "popout": true,
            "btnOkClass": "btn-xs btn-danger",
            "btnOkLabel": "是",
            "btnCancelClass": "btn-xs btn-default",
            "btnCancelLabel": "否",
            "onConfirm": function() {
                var url=$(this).data('link');
                $.get(url, function(data) {
                    if (data.status) {
                        Base.success(data.info);
                        setTimeout(function(){location.href=data.url}, 1000);
                    }else{
                        Base.error(data.info);
                    }
                },'json');
            }
        });
    };

    var initAjaxForm=function(){
        //表单默认以AJAX提交并提示处理结果，提升用户体验，如果不要AJAX提交则在form添加no-ajax类
        $("form").not('.validate').submit(function (event) {
            var url = $(this).attr('action');
            var submitData = $(this).serialize();
            $.post(url, submitData, function (data, textStatus, xhr) {
                if (data.status) {
                    Base.success(data.info);
                    if(data.url){
                        setTimeout(function(){top.location.href=data.url}, 2000);
                    }else{
                        setTimeout(function(){top.location.reload()}, 2000);
                    }
                } else {
                    Base.error(data.info);
                }
            }, 'json');
            return false;
        });
    };

    //图片弹出预览
    var initImgpreview = function(){
        $('img.preview-small,.thumbnail img').click(function(event) {
            var imgSrc=$(this).attr('src');
            var imgItem="<img src='"+imgSrc+"' height='300'/>";
            layer.open({
                type : 1,
                title : false,
                fix : false,
                shadeClose: true,
                offset:['150px' , ''],
                area: ['auto', 'auto'],
                content : imgItem
            });
        });
    };

    var initCheckAll = function() {
        //全选的实现
        $(".group-checkable").click(function(){
            $(".ids").prop("checked", this.checked);
            $('.group-checkable,.ids').uniform()
        });
        $(".ids").click(function(){
            var option = $(".ids");
            option.each(function(i){
                if(!this.checked){
                    $(".group-checkable").prop("checked", false);
                    $('.group-checkable,.ids').uniform()
                    return false;
                }else{
                    $(".group-checkable").prop("checked", true);
                    $('.group-checkable,.ids').uniform()
                }
            });
        });
    };

    //ajax get请求
    $('.ajax-get').click(function(){
        var target;
        var that = this;
        if ( $(this).hasClass('confirm') ) {
            if(!confirm('确认要执行该操作吗?')){
                return false;
            }
        }
        if ( (target = $(this).attr('href')) || (target = $(this).attr('url')) ) {
            $.get(target).success(function(data){
                if (data.status==1) {
                    if (data.url) {
                        Base.success(data.info + ' 页面即将自动跳转~');
                    }else{
                        Base.success(data.info);
                    }
                    setTimeout(function(){
                        if (data.url) {
                            location.href=data.url;
                        }else{
                            location.reload();
                        }
                    },1500);
                }else{
                    Base.error(data.info);
                    setTimeout(function(){
                        if (data.url) {
                            location.href=data.url;
                        }
                    },1500);
                }
            });
        }
        return false;
    });

    //ajax post submit请求
    $('.ajax-post').click(function(){
        var target,query,form;
        var target_form = $(this).attr('target-form');
        var that = this;
        var nead_confirm=false;
        if( ($(this).attr('type')=='submit') || (target = $(this).attr('href')) || (target = $(this).attr('url')) ){
            form = $('.'+target_form);

            if ($(this).attr('hide-data') === 'true'){//无数据时也可以使用的功能
                form = $('.hide-data');
                query = form.serialize();
            }else if (form.get(0)==undefined){
                return false;
            }else if ( form.get(0).nodeName=='FORM' ){
                if ( $(this).hasClass('confirm') ) {
                    if(!confirm('确认要执行该操作吗?')){
                        return false;
                    }
                }
                if($(this).attr('url') !== undefined){
                    target = $(this).attr('url');
                }else{
                    target = form.get(0).action;
                }
                query = form.serialize();
            }else if( form.get(0).nodeName=='INPUT' || form.get(0).nodeName=='SELECT' || form.get(0).nodeName=='TEXTAREA') {
                form.each(function(k,v){
                    if(v.type=='checkbox' && v.checked==true){
                        nead_confirm = true;
                    }
                })
                if ( nead_confirm && $(this).hasClass('confirm') ) {
                    if(!confirm('确认要执行该操作吗?')){
                        return false;
                    }
                }
                query = form.serialize();
            }else{
                if ( $(this).hasClass('confirm') ) {
                    if(!confirm('确认要执行该操作吗?')){
                        return false;
                    }
                }
                query = form.find('input,select,textarea').serialize();
            }
            $(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
            $.post(target,query).success(function(data){
                if (data.status==1) {
                    if (data.url) {
                        Base.success(data.info + ' 页面即将自动跳转~');
                    }else{
                        Base.success(data.info);
                    }
                    setTimeout(function(){
                        $(that).removeClass('disabled').prop('disabled',false);
                        if (data.url) {
                            location.href=data.url;
                        }else{
                            location.reload();
                        }
                    },1500);
                }else{
                    Base.error(data.info);
                    setTimeout(function(){
                        $(that).removeClass('disabled').prop('disabled',false);
                        if (data.url) {
                            location.href=data.url;
                        }
                    },1500);
                }
            });
        }
        return false;
    });

    // //侧栏高亮,rewrite URL模式匹配
    // var highlightSidebar = function(){
    //     //侧栏菜单中的全部有链接菜单项
    //     var sidebarLinks = $("#page-sidebar-menu").find('a');
    //     if(sidebarLinks.length > 0){
    //         //当前页面URL
    //         var url = document.URL;
    //         var flagMatched = false;
    //         sidebarLinks.each(function (index, el) {
    //             var href = $(el).attr('href');
    //             if (url.match(href) !== null) {
    //                 //设置当前高亮菜单项
    //                 Layout.setSidebarMenuActiveLink('click', $(this));
    //                 //保存当前活动菜单项索引至cookie便于在未匹配的情况下使用
    //                 $.cookie("menuindex", index, {expires:7, path:'/'});
    //                 flagMatched = true;
    //                 return false;
    //             }
    //         });
    //         //如果未找到与当前URL匹配的菜单项，则高亮上一次被高亮的菜单项
    //         if(!flagMatched){
    //             var menuindex = $.cookie("menuindex");
    //             Layout.setSidebarMenuActiveLink('click', sidebarLinks.eq(menuindex));
    //         }
    //     }
    // }

        //侧栏高亮,普通 URL模式匹配
    var highlightSidebar = function(){
        //侧栏菜单中的全部有链接菜单项
        var sidebarLinks = $("#page-sidebar-menu").find('a');
        if(sidebarLinks.length > 0){
            //当前页面URL
            var url = document.URL;
            var flagMatched = false;
            var reg = /g\=.*$/i;

            var address;
            try {
                //当前地址中的模块和操作部分
                address = url.match(reg)[0] || '';  //
            } catch (e) {
                // console.log(e);
            }
            if (address) {
                sidebarLinks.each(function (index, el) {
                    var href = $(el).attr('href');
                    if (href.match(reg) && href.match(reg)[0] == address) {
                        //设置当前高亮菜单项
                        Layout.setSidebarMenuActiveLink('click', $(this));
                        //保存当前活动菜单项索引至cookie便于在未匹配的情况下使用
                        $.cookie("menuindex", index, {expires:7, path:'/'});
                        flagMatched = true;
                        return false;
                    }
                });
            }
            
            //如果未找到与当前URL匹配的菜单项，则高亮上一次被高亮的菜单项
            if(!flagMatched){
                var menuindex = $.cookie("menuindex");
                Layout.setSidebarMenuActiveLink('click', sidebarLinks.eq(menuindex));
            }
        }
    }

    // //侧栏高亮，兼容URL模式匹配
    // var highlightSidebar = function(menuid){
    //     if (menuid==="auto_highlight") {
    //         var url = document.URL;

    //         var reg = /s\=\/([\w\/]*)/i;
    //         var address;
    //         try {
    //             address = url.match(reg)[1] || '';  //当前地址中的模块和操作部分
    //         } catch (e) {
    //             console.log(e);
    //         }
    //         if (address) {
    //             var href = "";
    //             $("#page-sidebar-menu").find('a').each(function (index, el) {
    //                 href = $(el).attr('href');
    //                 if (address && href.search(address) != -1) {
    //                     //设置当前高亮菜单项
    //                     Layout.setSidebarMenuActiveLink('click', $(this));
    //                     return false;
    //                 }
    //             });
    //         }
    //     } else {
    //         var menu=$("#page-sidebar-menu").find('a#'+menuid);
    //         //设置当前高亮菜单项
    //         Layout.setSidebarMenuActiveLink('click', menu);
    //     };
    // }

    //操作结果提示
    var success=function(msg){
        top.layer.msg(msg,{icon:1});
    }
    var error=function(msg){
        top.layer.msg(msg,{icon:2,shift:6});
    }
    var info=function(msg){
        top.layer.msg(msg);
    }

    return {
        initNormalPage:function(){
            initConfirmation();
            initAjaxForm();
            initImgpreview();
            initCheckAll();
            highlightSidebar();
        },
        initDialogPage:function(){
            initConfirmation();
            initAjaxForm();
            initCheckAll();
        },
        initConfirmation:initConfirmation,

        success:success,
        error:error,
        info:info
    }
}();
    