webpackJsonp([3],{

/***/ 219:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(285)
}
var Component = __webpack_require__(42)(
  /* script */
  __webpack_require__(287),
  /* template */
  __webpack_require__(288),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-59f6fd45",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "D:\\UPUPW_NG7.0\\vhosts\\willchat\\resources\\assets\\js\\user\\components\\user\\profile.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] profile.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-59f6fd45", Component.options)
  } else {
    hotAPI.reload("data-v-59f6fd45", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 285:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(286);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(41)("e7ff879c", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-59f6fd45\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./profile.vue", function() {
     var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-59f6fd45\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./profile.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 286:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(12)(undefined);
// imports


// module
exports.push([module.i, "\n.avatar[data-v-59f6fd45] {\n  display: block;\n  width: 250px;\n  height: 250px;\n  overflow: hidden;\n  margin: 0 auto;\n}\n.user-profile[data-v-59f6fd45] {\n  display: block;\n  overflow: hidden;\n  background-color: #fff;\n  padding: 20px 25px;\n}\n", ""]);

// exports


/***/ }),

/***/ 287:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _extends2 = __webpack_require__(43);

var _extends3 = _interopRequireDefault(_extends2);

var _vuex = __webpack_require__(15);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
  data: function data() {
    return {};
  },


  computed: (0, _extends3.default)({}, (0, _vuex.mapGetters)(['user'])),

  methods: (0, _extends3.default)({}, (0, _vuex.mapActions)(['storeUserToLocal']), {
    save: function save() {
      var _this = this;

      this.axios.post('/user/profile', this.user).then(function (response) {
        _this.storeUserToLocal(response.data.user);

        _this.$root.success('保存成功');
      });
    }
  })
};

/***/ }),

/***/ 288:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "main main-with-padding"
  }, [_c('el-row', {
    attrs: {
      "gutter": 20
    }
  }, [_c('el-col', {
    attrs: {
      "span": 8
    }
  }, [_c('router-link', {
    attrs: {
      "to": "/avatar"
    }
  }, [_c('img', {
    staticClass: "avatar",
    attrs: {
      "src": _vm.user.avatar,
      "alt": ""
    }
  })])], 1), _vm._v(" "), _c('el-col', {
    attrs: {
      "span": 16
    }
  }, [_c('div', {
    staticClass: "user-profile"
  }, [_c('el-form', {
    attrs: {
      "label-position": "top",
      "label-width": "120px",
      "model": _vm.user
    }
  }, [_c('el-row', {
    attrs: {
      "gutter": 20
    }
  }, [_c('el-col', {
    attrs: {
      "span": 12
    }
  }, [_c('el-form-item', {
    attrs: {
      "label": "用户名"
    }
  }, [_c('el-input', {
    attrs: {
      "readonly": ""
    },
    model: {
      value: (_vm.user.name),
      callback: function($$v) {
        _vm.user.name = $$v
      },
      expression: "user.name"
    }
  })], 1)], 1), _vm._v(" "), _c('el-col', {
    attrs: {
      "span": 12
    }
  }, [_c('el-form-item', {
    attrs: {
      "label": "昵称"
    }
  }, [_c('el-input', {
    model: {
      value: (_vm.user.nickname),
      callback: function($$v) {
        _vm.user.nickname = $$v
      },
      expression: "user.nickname"
    }
  })], 1)], 1), _vm._v(" "), _c('el-col', {
    attrs: {
      "span": 12
    }
  }, [_c('el-form-item', {
    attrs: {
      "label": "Email"
    }
  }, [_c('el-input', {
    attrs: {
      "readonly": ""
    },
    model: {
      value: (_vm.user.email),
      callback: function($$v) {
        _vm.user.email = $$v
      },
      expression: "user.email"
    }
  })], 1)], 1), _vm._v(" "), _c('el-col', {
    attrs: {
      "span": 12
    }
  }, [_c('el-form-item', {
    attrs: {
      "label": "手机"
    }
  }, [_c('el-input', {
    model: {
      value: (_vm.user.mobile),
      callback: function($$v) {
        _vm.user.mobile = $$v
      },
      expression: "user.mobile"
    }
  })], 1)], 1), _vm._v(" "), _c('el-col', {
    attrs: {
      "span": 12
    }
  }, [_c('el-form-item', {
    attrs: {
      "label": "QQ"
    }
  }, [_c('el-input', {
    model: {
      value: (_vm.user.qq),
      callback: function($$v) {
        _vm.user.qq = $$v
      },
      expression: "user.qq"
    }
  })], 1)], 1), _vm._v(" "), _c('el-col', {
    attrs: {
      "span": 12
    }
  }, [_c('el-form-item', {
    attrs: {
      "label": "最后登录时间"
    }
  }, [_c('el-input', {
    model: {
      value: (_vm.user.last_login_at),
      callback: function($$v) {
        _vm.user.last_login_at = $$v
      },
      expression: "user.last_login_at"
    }
  })], 1)], 1)], 1), _vm._v(" "), _c('el-row', {
    attrs: {
      "type": "flex",
      "justify": "center"
    }
  }, [_c('el-button', {
    attrs: {
      "type": "primary"
    },
    nativeOn: {
      "click": function($event) {
        _vm.save($event)
      }
    }
  }, [_vm._v("保存")]), _vm._v(" "), _c('el-button', {
    attrs: {
      "type": "default"
    },
    nativeOn: {
      "click": function($event) {
        _vm.$router.back()
      }
    }
  }, [_vm._v("取消")])], 1)], 1)], 1)])], 1)], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-59f6fd45", module.exports)
  }
}

/***/ })

});