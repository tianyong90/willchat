webpackJsonp([0],{

/***/ 226:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(227);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(41)("7ac2e1ca", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-c42af674\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./form.vue", function() {
     var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-c42af674\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./form.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 227:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(12)(undefined);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 228:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.default = {
  data: function data() {
    return {
      account: {
        id: '',
        name: '',
        type: '订阅号',
        app_id: '',
        app_secret: '',
        aes_key: '',
        merchant_id: '',
        merchant_key: '',
        cert_path: '',
        key_path: '',
        remark: ''
      }
    };
  },
  mounted: function mounted() {
    var _this = this;

    var accountId = this.$route.params.id;

    if (accountId) {
      this.axios.get('account/show/' + accountId).then(function (response) {
        _this.account = response.data.account;
      });
    }
  },


  computed: {},

  methods: {
    store: function store() {
      var _this2 = this;

      this.axios.post('account/store', this.account).then(function (response) {
        _this2.$message({
          message: '添加成功',
          type: 'success'
        });

        setTimeout(function () {
          _this2.$router.push('/');
        }, 1000);
      });
    }
  },

  watch: {
    'formData.province': function formDataProvince(val, oldVal) {
      this.formData.city = this.cityList[0];
    },

    'formData.city': function formDataCity(val, oldVal) {
      this.formData.area = this.areaList[0];
    }
  }
};

/***/ }),

/***/ 229:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "main main-with-padding"
  }, [_c('el-form', {
    ref: "form",
    attrs: {
      "model": _vm.account,
      "label-width": "150px"
    }
  }, [_c('el-form-item', {
    attrs: {
      "label": "公众号名称"
    }
  }, [_c('el-input', {
    model: {
      value: (_vm.account.name),
      callback: function($$v) {
        _vm.account.name = $$v
      },
      expression: "account.name"
    }
  })], 1), _vm._v(" "), _c('el-form-item', {
    attrs: {
      "label": "类型"
    }
  }, [_c('el-select', {
    attrs: {
      "placeholder": ""
    },
    model: {
      value: (_vm.account.type),
      callback: function($$v) {
        _vm.account.type = $$v
      },
      expression: "account.type"
    }
  }, [_c('el-option', {
    attrs: {
      "label": "订阅号",
      "value": "1"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "认证订阅号",
      "value": "2"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "服务号",
      "value": "3"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "认证服务号",
      "value": "4"
    }
  })], 1)], 1), _vm._v(" "), _c('el-form-item', {
    attrs: {
      "label": "AppId"
    }
  }, [_c('el-input', {
    model: {
      value: (_vm.account.app_id),
      callback: function($$v) {
        _vm.account.app_id = $$v
      },
      expression: "account.app_id"
    }
  })], 1), _vm._v(" "), _c('el-form-item', {
    attrs: {
      "label": "AppSecret"
    }
  }, [_c('el-input', {
    model: {
      value: (_vm.account.app_secret),
      callback: function($$v) {
        _vm.account.app_secret = $$v
      },
      expression: "account.app_secret"
    }
  })], 1), _vm._v(" "), _c('el-form-item', {
    attrs: {
      "label": "AesKey"
    }
  }, [_c('el-input', {
    model: {
      value: (_vm.account.aes_key),
      callback: function($$v) {
        _vm.account.aes_key = $$v
      },
      expression: "account.aes_key"
    }
  })], 1), _vm._v(" "), _c('el-form-item', {
    attrs: {
      "label": "备注"
    }
  }, [_c('el-input', {
    attrs: {
      "type": "textarea"
    },
    model: {
      value: (_vm.account.remark),
      callback: function($$v) {
        _vm.account.remark = $$v
      },
      expression: "account.remark"
    }
  })], 1), _vm._v(" "), _c('el-form-item', [_c('el-button', {
    attrs: {
      "type": "primary"
    },
    on: {
      "click": _vm.store
    }
  }, [_vm._v("保存")]), _vm._v(" "), _c('el-button', {
    nativeOn: {
      "click": function($event) {
        _vm.$router.back()
      }
    }
  }, [_vm._v("取消")])], 1)], 1)], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-c42af674", module.exports)
  }
}

/***/ }),

/***/ 77:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(226)
}
var Component = __webpack_require__(42)(
  /* script */
  __webpack_require__(228),
  /* template */
  __webpack_require__(229),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-c42af674",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "D:\\UPUPW_NG7.0\\vhosts\\willchat\\resources\\assets\\js\\user\\components\\account\\form.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] form.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-c42af674", Component.options)
  } else {
    hotAPI.reload("data-v-c42af674", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});