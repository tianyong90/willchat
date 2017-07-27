webpackJsonp([9],{

/***/ 209:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(245)
}
var Component = __webpack_require__(42)(
  /* script */
  __webpack_require__(247),
  /* template */
  __webpack_require__(248),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-70e9ff98",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "D:\\UPUPW_NG7.0\\vhosts\\willchat\\resources\\assets\\js\\user\\components\\qrcode\\lists.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] lists.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-70e9ff98", Component.options)
  } else {
    hotAPI.reload("data-v-70e9ff98", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 245:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(246);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(41)("39b0d07f", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-70e9ff98\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./lists.vue", function() {
     var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-70e9ff98\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./lists.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 246:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(12)(undefined);
// imports


// module
exports.push([module.i, "\n.preview[data-v-70e9ff98] {\n  display: block;\n  overflow: hidden;\n  margin: 10px 0;\n  width: 100px;\n  height: 100px;\n}\n", ""]);

// exports


/***/ }),

/***/ 247:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _assign = __webpack_require__(75);

var _assign2 = _interopRequireDefault(_assign);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
  data: function data() {
    return {
      qrcodes: [],
      searchForm: {
        name: ''
      },
      dialogFormVisible: false,
      type: '',
      qrcodeFormData: {
        keyword: '',
        remark: '',
        expir: ''
      }
    };
  },
  mounted: function mounted() {
    this.type = this.$route.params.type || 'temporary';
    this.loadData();
  },


  methods: {
    loadData: function loadData() {
      var _this = this;

      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

      this.axios.get('qrcode/lists', {
        params: {
          keyword: this.searchForm.keyword,
          type: this.type,
          page: page
        }
      }).then(function (response) {
        _this.qrcodes = response.data.qrcodes;
      });
    },
    createQrcode: function createQrcode() {
      var _this2 = this;

      var postData = {
        type: this.type
      };

      (0, _assign2.default)(postData, this.qrcodeFormData);

      this.axios.post('qrcode/create', postData).then(function (response) {
        _this2.dialogFormVisible = false;
        _this2.qrcodeFormData = {
          keyword: '',
          remark: '',
          expir: ''
        };

        _this2.$message({
          message: '创建成功',
          type: 'success'
        });

        setTimeout(function () {
          _this2.loadData();
        }, 1000);
      }).catch(function (error) {
        _this2.$message({
          message: error.response.data,
          type: 'error'
        });
      });
    },
    search: function search() {
      this.loadData(1);
    },
    handleCurrentChange: function handleCurrentChange(page) {
      this.loadData(page);
    }
  },

  watch: {
    '$route.params.type': function $routeParamsType(val) {
      this.type = val;
      this.loadData();
    }
  }
};

/***/ }),

/***/ 248:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "right-main"
  }, [_c('div', {
    staticClass: "table-tools"
  }, [_c('el-form', {
    staticClass: "demo-form-inline",
    attrs: {
      "inline": true,
      "model": _vm.searchForm
    }
  }, [_c('el-form-item', [_c('el-input', {
    attrs: {
      "placeholder": "按备注搜索"
    },
    nativeOn: {
      "keyup": function($event) {
        if (!('button' in $event) && _vm._k($event.keyCode, "enter", 13)) { return null; }
        _vm.loadData($event)
      }
    },
    model: {
      value: (_vm.searchForm.keyword),
      callback: function($$v) {
        _vm.searchForm.keyword = $$v
      },
      expression: "searchForm.keyword"
    }
  })], 1), _vm._v(" "), _c('el-form-item', [_c('el-button', {
    attrs: {
      "type": "primary",
      "icon": "search"
    },
    on: {
      "click": _vm.search
    }
  }, [_vm._v("搜索")]), _vm._v(" "), _c('el-button', {
    attrs: {
      "type": "success",
      "icon": "plus"
    },
    on: {
      "click": function($event) {
        _vm.dialogFormVisible = true
      }
    }
  }, [_vm._v("创建二维码")])], 1)], 1)], 1), _vm._v(" "), _c('el-table', {
    staticStyle: {
      "width": "100%"
    },
    attrs: {
      "data": _vm.qrcodes.data,
      "border": ""
    }
  }, [_c('el-table-column', {
    attrs: {
      "label": "预览"
    },
    inlineTemplate: {
      render: function() {
        var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
          return _c('img', {
            staticClass: "preview",
            attrs: {
              "src": 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' + _vm.row.ticket,
              "alt": ""
            }
          })
        
      },
      staticRenderFns: []
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "keyword",
      "label": "二维码参数"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "remark",
      "label": "备注"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "created_at",
      "label": "创建时间"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "scaned_times",
      "label": "被扫次数"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "label": "操作"
    },
    inlineTemplate: {
      render: function() {
        var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
          return _c('div', [_c('el-button', {
            attrs: {
              "size": "small",
              "type": "danger"
            },
            nativeOn: {
              "click": function($event) {
                _vm.charge(_vm.row.id)
              }
            }
          }, [_vm._v("删除")])], 1)
        
      },
      staticRenderFns: []
    }
  })], 1), _vm._v(" "), _c('div', {
    staticClass: "paginator"
  }, [_c('el-pagination', {
    attrs: {
      "current-page": _vm.qrcodes.current_page,
      "page-size": _vm.qrcodes.per_page,
      "layout": "total, prev, pager, next, jumper",
      "total": _vm.qrcodes.tatal
    },
    on: {
      "current-change": _vm.handleCurrentChange
    }
  })], 1), _vm._v(" "), _c('el-dialog', {
    attrs: {
      "title": "创建二维码",
      "modal": false
    },
    model: {
      value: (_vm.dialogFormVisible),
      callback: function($$v) {
        _vm.dialogFormVisible = $$v
      },
      expression: "dialogFormVisible"
    }
  }, [_c('el-form', {
    attrs: {
      "model": _vm.qrcodeFormData
    }
  }, [_c('el-form-item', {
    attrs: {
      "label": "二维码参数",
      "label-width": "120"
    }
  }, [_c('el-input', {
    attrs: {
      "auto-complete": "off",
      "placeholder": "填写二维码参数"
    },
    model: {
      value: (_vm.qrcodeFormData.keyword),
      callback: function($$v) {
        _vm.qrcodeFormData.keyword = $$v
      },
      expression: "qrcodeFormData.keyword"
    }
  })], 1), _vm._v(" "), (_vm.type === 'temporary') ? _c('el-form-item', {
    attrs: {
      "label": "有效期",
      "label-width": "120"
    }
  }, [_c('el-input', {
    attrs: {
      "auto-complete": "off",
      "placeholder": "临时二维码的有效期，单位为秒"
    },
    model: {
      value: (_vm.qrcodeFormData.expir),
      callback: function($$v) {
        _vm.qrcodeFormData.expir = $$v
      },
      expression: "qrcodeFormData.expir"
    }
  })], 1) : _vm._e(), _vm._v(" "), _c('el-form-item', {
    attrs: {
      "label": "备注",
      "label-width": "120"
    }
  }, [_c('el-input', {
    attrs: {
      "auto-complete": "off",
      "placeholder": "填写备注，便于后期区分"
    },
    model: {
      value: (_vm.qrcodeFormData.remark),
      callback: function($$v) {
        _vm.qrcodeFormData.remark = $$v
      },
      expression: "qrcodeFormData.remark"
    }
  })], 1)], 1), _vm._v(" "), _c('div', {
    staticClass: "dialog-footer",
    slot: "footer"
  }, [_c('el-button', {
    on: {
      "click": function($event) {
        _vm.dialogFormVisible = false
      }
    }
  }, [_vm._v("取 消")]), _vm._v(" "), _c('el-button', {
    attrs: {
      "type": "primary"
    },
    on: {
      "click": _vm.createQrcode
    }
  }, [_vm._v("确 定")])], 1)], 1)], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-70e9ff98", module.exports)
  }
}

/***/ })

});