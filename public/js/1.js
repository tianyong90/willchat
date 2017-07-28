webpackJsonp([1],{

/***/ 210:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(249)
}
var Component = __webpack_require__(42)(
  /* script */
  __webpack_require__(251),
  /* template */
  __webpack_require__(256),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-00cf82cc",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "D:\\UPUPW_NG7.0\\vhosts\\willchat\\resources\\assets\\js\\user\\components\\reply\\text-lists.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] text-lists.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-00cf82cc", Component.options)
  } else {
    hotAPI.reload("data-v-00cf82cc", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 249:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(250);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(41)("6e9791da", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-00cf82cc\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./text-lists.vue", function() {
     var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-00cf82cc\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./text-lists.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 250:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(12)(undefined);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 251:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _defineProperty2 = __webpack_require__(252);

var _defineProperty3 = _interopRequireDefault(_defineProperty2);

var _methods;

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
  data: function data() {
    return {
      replies: [],
      searchForm: {
        keyword: ''
      },
      dialogFormVisible: false,
      replyFormData: {
        trigger_keywords: '',
        content: '',
        id: null
      }
    };
  },
  mounted: function mounted() {
    this.loadData();
  },


  methods: (_methods = {
    loadData: function loadData() {
      var _this = this;

      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

      this.axios.get('reply/lists?type=text', {
        params: {
          keyword: this.searchForm.keyword,
          sex: this.searchForm.sex,
          page: page
        }
      }).then(function (response) {
        _this.replies = response.data.replies;
      });
    },
    search: function search() {
      this.loadData(1);
    },
    handleCurrentChange: function handleCurrentChange(page) {
      this.loadData(page);
    },
    storeReply: function storeReply() {
      var _this2 = this;

      var postData = this.replyFormData;
      postData.trigger_type = 'keywords';

      this.axios.post('reply/store', postData).then(function (response) {
        _this2.dialogFormVisible = false;
        _this2.replyFormData.trigger_keywords = '';
        _this2.replyFormData.content = '';
        _this2.replyFormData.id = null;

        _this2.$message({
          message: '保存成功',
          type: 'success'
        });

        setTimeout(function () {
          _this2.loadData(_this2.replies.current_page);
        }, 1000);
      }).catch(function (error) {
        _this2.$message({
          message: error.response.data,
          type: 'error'
        });
      });
    },
    showEditDialog: function showEditDialog() {
      this.replyFormData.trigger_keywords = '';
      this.replyFormData.content = '';
      this.replyFormData.id = null;

      this.dialogFormVisible = true;
    }
  }, (0, _defineProperty3.default)(_methods, 'showEditDialog', function showEditDialog(reply) {
    this.replyFormData.trigger_keywords = reply.trigger_keywords;
    this.replyFormData.content = reply.content;
    this.replyFormData.id = reply.id;

    this.dialogFormVisible = true;
  }), (0, _defineProperty3.default)(_methods, 'deleteReply', function deleteReply(id) {
    var _this3 = this;

    this.$confirm('删除后将不可恢复, 是否继续?', '操作确认', {
      confirmButtonText: '确定',
      cancelButtonText: '取消',
      type: 'info'
    }).then(function () {
      _this3.axios.post('reply/delete', { id: id }).then(function (response) {
        _this3.$message({
          message: '删除成功',
          type: 'success'
        });

        setTimeout(function () {
          _this3.loadData(_this3.replies.current_page);
        }, 1000);
      }).catch(function (error) {
        _this3.$message({
          message: error.response.data,
          type: 'error'
        });
      });
    }).catch(function () {
      console.log('canceled');
    });
  }), _methods)
};

/***/ }),

/***/ 252:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


exports.__esModule = true;

var _defineProperty = __webpack_require__(253);

var _defineProperty2 = _interopRequireDefault(_defineProperty);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = function (obj, key, value) {
  if (key in obj) {
    (0, _defineProperty2.default)(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
};

/***/ }),

/***/ 253:
/***/ (function(module, exports, __webpack_require__) {

module.exports = { "default": __webpack_require__(254), __esModule: true };

/***/ }),

/***/ 254:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(255);
var $Object = __webpack_require__(6).Object;
module.exports = function defineProperty(it, key, desc){
  return $Object.defineProperty(it, key, desc);
};

/***/ }),

/***/ 255:
/***/ (function(module, exports, __webpack_require__) {

var $export = __webpack_require__(23);
// 19.1.2.4 / 15.2.3.6 Object.defineProperty(O, P, Attributes)
$export($export.S + $export.F * !__webpack_require__(13), 'Object', {defineProperty: __webpack_require__(17).f});

/***/ }),

/***/ 256:
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
      "placeholder": "按昵称搜索"
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
  })], 1), _vm._v(" "), _c('el-form-item', [_c('el-select', {
    attrs: {
      "placeholder": "性别筛选"
    },
    on: {
      "change": _vm.loadData
    },
    model: {
      value: (_vm.searchForm.sex),
      callback: function($$v) {
        _vm.searchForm.sex = $$v
      },
      expression: "searchForm.sex"
    }
  }, [_c('el-option', {
    attrs: {
      "label": "全部",
      "value": "all"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "男",
      "value": "0"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "女",
      "value": "1"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "其它",
      "value": "2"
    }
  })], 1)], 1), _vm._v(" "), _c('el-form-item', [_c('el-button', {
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
      "click": _vm.showEditDialog
    }
  }, [_vm._v("新增回复规则")])], 1)], 1)], 1), _vm._v(" "), _c('el-table', {
    staticStyle: {
      "width": "100%"
    },
    attrs: {
      "data": _vm.replies.data,
      "border": ""
    }
  }, [_c('el-table-column', {
    attrs: {
      "prop": "trigger_keywords",
      "label": "触发关键词"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "content",
      "label": "回复内容"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "created_at",
      "label": "添加时间"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "updated_at",
      "label": "修改时间"
    }
  }), _vm._v(" "), _c('el-table-column', {
    attrs: {
      "prop": "remark",
      "label": "命中次数"
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
              "type": "primary"
            },
            nativeOn: {
              "click": function($event) {
                _vm.showEditDialog(_vm.row)
              }
            }
          }, [_vm._v("修改")]), _vm._v(" "), _c('el-button', {
            attrs: {
              "size": "small",
              "type": "danger"
            },
            nativeOn: {
              "click": function($event) {
                _vm.deleteReply(_vm.row.id)
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
      "current-page": _vm.replies.current_page,
      "page-size": _vm.replies.per_page,
      "layout": "total, prev, pager, next, jumper",
      "total": _vm.replies.tatal
    },
    on: {
      "current-change": _vm.handleCurrentChange
    }
  })], 1), _vm._v(" "), _c('el-dialog', {
    attrs: {
      "title": "添加文本回复",
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
      "model": _vm.replyFormData
    }
  }, [_c('el-form-item', {
    attrs: {
      "label": "触发关键词",
      "label-width": "120"
    }
  }, [_c('el-input', {
    attrs: {
      "auto-complete": "off",
      "placeholder": "填写触发关键字"
    },
    model: {
      value: (_vm.replyFormData.trigger_keywords),
      callback: function($$v) {
        _vm.replyFormData.trigger_keywords = $$v
      },
      expression: "replyFormData.trigger_keywords"
    }
  })], 1), _vm._v(" "), _c('el-form-item', {
    attrs: {
      "label": "回复内容",
      "label-width": "120"
    }
  }, [_c('el-input', {
    attrs: {
      "type": "textarea",
      "rows": 5,
      "placeholder": "填写回复内容"
    },
    model: {
      value: (_vm.replyFormData.content),
      callback: function($$v) {
        _vm.replyFormData.content = $$v
      },
      expression: "replyFormData.content"
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
      "click": _vm.storeReply
    }
  }, [_vm._v("确 定")])], 1)], 1)], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-00cf82cc", module.exports)
  }
}

/***/ })

});