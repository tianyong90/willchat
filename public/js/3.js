webpackJsonp([3],{

/***/ 206:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(230)
}
var Component = __webpack_require__(42)(
  /* script */
  __webpack_require__(233),
  /* template */
  __webpack_require__(234),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-6729d4bc",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "D:\\UPUPW_NG7.0\\vhosts\\willchat\\resources\\assets\\js\\user\\components\\auth\\login.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] login.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6729d4bc", Component.options)
  } else {
    hotAPI.reload("data-v-6729d4bc", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 230:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(231);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(41)("2b487c18", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6729d4bc\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./login.vue", function() {
     var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6729d4bc\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./login.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 231:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(12)(undefined);
// imports


// module
exports.push([module.i, "\n.login[data-v-6729d4bc] {\n  position: fixed;\n  display: flex;\n  left: 0;\n  right: 0;\n  top: 0;\n  bottom: 0;\n  justify-content: center;\n  align-items: center;\n  background-image: url(" + __webpack_require__(232) + ");\n  background-size: cover;\n}\n.login .login-form[data-v-6729d4bc] {\n    display: block;\n    width: 360px;\n    background-color: rgba(0, 0, 0, 0.6);\n    padding: 40px;\n    border-radius: 10px;\n}\n.login .login-form .title[data-v-6729d4bc] {\n      color: #fff;\n      font-size: 2rem;\n      line-height: 2rem;\n      text-align: center;\n      font-family: 'Microsoft Yahei';\n      font-weight: 400;\n      margin-bottom: 1.5em;\n}\n.login .login-form .el-input[data-v-6729d4bc] {\n      display: block;\n      margin: 1rem 0;\n}\n.login .login-form .btn-submit[data-v-6729d4bc] {\n      display: block;\n      overflow: hidden;\n      width: 100%;\n      margin-top: 3rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 232:
/***/ (function(module, exports) {

module.exports = "/js/images/login-bg.jpg?ad14e70958975567eee5a3ea1d4b8c0e";

/***/ }),

/***/ 233:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _extends2 = __webpack_require__(43);

var _extends3 = _interopRequireDefault(_extends2);

var _config = __webpack_require__(16);

var _config2 = _interopRequireDefault(_config);

var _vuex = __webpack_require__(15);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
  data: function data() {
    return {
      formData: {
        name: '',
        password: ''
      }
    };
  },


  methods: (0, _extends3.default)({}, (0, _vuex.mapActions)(['storeUserToLocal']), {
    login: function login() {
      var _this = this;

      this.axios.post('login', this.formData).then(function (response) {
        localStorage.setItem(_config2.default.jwtTokenKey, response.data.token);

        _this.storeUserToLocal(response.data.user);

        _this.$router.push('/');
      }).catch(function (error) {
        _this.$message({
          message: error.response.data,
          type: 'error'
        });
      });
    }
  })
};

/***/ }),

/***/ 234:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "login"
  }, [_c('div', {
    staticClass: "login-form"
  }, [_c('h1', {
    staticClass: "title"
  }, [_vm._v("WillChat")]), _vm._v(" "), _c('el-input', {
    attrs: {
      "type": "text",
      "placeholder": "请输入用户名"
    },
    nativeOn: {
      "keyup": function($event) {
        if (!('button' in $event) && _vm._k($event.keyCode, "enter", 13)) { return null; }
        _vm.login($event)
      }
    },
    model: {
      value: (_vm.formData.name),
      callback: function($$v) {
        _vm.formData.name = $$v
      },
      expression: "formData.name"
    }
  }), _vm._v(" "), _c('el-input', {
    attrs: {
      "type": "password",
      "placeholder": "请输入登录密码"
    },
    nativeOn: {
      "keyup": function($event) {
        if (!('button' in $event) && _vm._k($event.keyCode, "enter", 13)) { return null; }
        _vm.login($event)
      }
    },
    model: {
      value: (_vm.formData.password),
      callback: function($$v) {
        _vm.formData.password = $$v
      },
      expression: "formData.password"
    }
  }), _vm._v(" "), _c('el-button', {
    staticClass: "btn-submit",
    attrs: {
      "type": "primary",
      "disabled": false
    },
    nativeOn: {
      "click": function($event) {
        _vm.login($event)
      }
    }
  }, [_vm._v("登录")])], 1)])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-6729d4bc", module.exports)
  }
}

/***/ })

});