var FormWizard = function () {
    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            var form = $('#goods-form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    //基本信息
                    name: {
                        minlength: 2,
                        maxlength: 25,
                        required: true
                    },
                    category_id: {
                        required: true,
                        min: 1
                    },
                    thumbnail: {
                        required: true
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'name': {
                        required: "请填写公众号名称",
                        minlength: "最少2个字",
                        maxLength: "最多25个字"
                    },
                    'category_id': {
                        min: "请选择商品所属分类"
                    }
                    // 'appid': {
                    //     required: "请填写AppID",
                    //     minlength: "最少10个字",
                    //     maxLength: "最多20个字"
                    // },
                    // 'appsecret': {
                    //     required: "请填写AppSecret",
                    //     minlength: "最少10个字",
                    //     maxLength: "最多50个字"
                    // },
                    // 'encodingaeskey': {
                    //     minlength: "长度应为43个字符",
                    //     maxlength: "长度应为43个字符"
                    // },
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form 
                    success.hide();
                    error.show();
                    Metronic.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function() {
                $('#tab5 .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment[]') {
                        var payment = [];
                        $('[name="payment[]"]:checked', form).each(function(){ 
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set done steps
                jQuery('li', $('#wizard-form')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#wizard-form').find('.button-previous').hide();
                } else {
                    $('#wizard-form').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#wizard-form').find('.button-next').hide();
                    $('#wizard-form').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#wizard-form').find('.button-next').show();
                    $('#wizard-form').find('.button-submit').hide();
                }
                Metronic.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#wizard-form').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    return false;
                    
                    // success.hide();
                    // error.hide();
                    // if (form.valid() == false) {
                    //     return false;
                    // }
                    // handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }

                    //使用AJAX提交表单
                    var url=$(form).attr('action');
                    var postData=$(form).serialize() + '&index='+index;
                    $.post(url, postData, function(data) {
                        if (data.status) {
                            Base.success(data.info);
                            if (data.goodsdata) {
                                //新增商品，第一步提交保存后对页面中ID域赋值
                                $("input[name='id']").val(data.goodsdata.id);
                            };
                        } else {
                            Base.error(data.info);
                            $('#wizard-form').bootstrapWizard('previous');
                        }
                    },'json');
                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();
                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#wizard-form').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                },
                onTabChange: function (tab, navigation, index) {
                    if(index==0 || index==2){
                        //AJAX方式更新属性表格
                        var goodsId = $("input[name='id']").val();
                        var ajaxAttrUrl = Think.U('Goods/getAttrTable','goods_id='+goodsId);
                        $.get(ajaxAttrUrl, function(data) {
                            $(form).find("tbody#tbody-attr").html(data);
                        },'html');
                    }
                    if(index==1 || index==3){
                        //AJAX方式更新价格表格
                        var goodsId = $("input[name='id']").val();
                        var ajaxPriceUrl = Think.U('Goods/getPriceTable','goods_id='+goodsId);
                        console.log(goodsId);
                        console.log(ajaxPriceUrl);
                        $.get(ajaxPriceUrl, function(data) {
                            $(form).find("tbody#tbody-skuprice").html(data);
                        },'html');
                    }
                }
            });

            $('#wizard-form').find('.button-previous').hide();
            $('#wizard-form .button-submit').click(function () {
                success.hide();
                error.hide();
                if (form.valid() == false) {
                    return false;
                }

                //使用AJAX提交表单
                var url=$(form).attr('action');
                var postData=$(form).serialize();
                $.post(url, postData, function(data) {
                    if (data.status) {
                        Base.success(data.info);
                        setTimeout(function(){
                            top.location.reload();
                        }, 2000);
                    } else {
                        Base.error(data.info);
                        return false;
                    }
                },'json');
            }).hide();
        }
    };
}();