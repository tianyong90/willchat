webpackJsonp([1],{

/***/ 207:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(235)
}
var Component = __webpack_require__(42)(
  /* script */
  __webpack_require__(239),
  /* template */
  __webpack_require__(240),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-126bb182",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "D:\\UPUPW_NG7.0\\vhosts\\willchat\\resources\\assets\\js\\user\\components\\menu\\index.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] index.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-126bb182", Component.options)
  } else {
    hotAPI.reload("data-v-126bb182", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 235:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(236);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(41)("5d2caee8", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-126bb182\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./index.vue", function() {
     var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-126bb182\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./index.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 236:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(12)(undefined);
// imports


// module
exports.push([module.i, "\n.right-main[data-v-126bb182] {\n  background-color: #fff;\n}\n.menu-preview[data-v-126bb182] {\n  display: block;\n  overflow: hidden;\n  position: relative;\n  width: 320px;\n  height: 500px;\n  background-color: #fff;\n  margin: 0 auto;\n  border: 1px solid #ddd;\n}\n.menu-preview .header[data-v-126bb182] {\n    display: flex;\n    position: absolute;\n    width: 100%;\n    height: 65px;\n    background-image: url(" + __webpack_require__(237) + ");\n    -webkit-background-size: 100%;\n    background-size: 100%;\n    background-repeat: no-repeat;\n    justify-content: center;\n    align-items: flex-end;\n}\n.menu-preview .header .account-name[data-v-126bb182] {\n      color: #fff;\n      margin-bottom: 10px;\n}\n.menu-preview .footer[data-v-126bb182] {\n    display: block;\n    position: absolute;\n    bottom: 0;\n    left: 0;\n    width: 100%;\n    height: 50px;\n    background-image: url(" + __webpack_require__(238) + ");\n    -webkit-background-size: 100%;\n    background-size: 100%;\n    background-repeat: no-repeat;\n}\n.menu-preview .footer .menu-preview[data-v-126bb182] {\n      display: flex;\n      flex-direction: row;\n      width: 275px;\n      height: 50px;\n      float: right;\n      overflow: visible;\n}\n.menu-preview .footer .menu-preview .active[data-v-126bb182] {\n        border: 2px solid #2196F3 !important;\n}\n.menu-preview .footer .menu-preview .menu-item[data-v-126bb182] {\n        display: block;\n        position: relative;\n        flex: 1;\n        cursor: pointer;\n        text-align: center;\n        line-height: 45px;\n        height: 45px;\n        border: 1px solid #efefef;\n}\n.menu-preview .footer .menu-preview .menu-item .sub-buttons[data-v-126bb182] {\n          display: block;\n          overflow: hidden;\n          background-color: #fff;\n          position: absolute;\n          bottom: 50px;\n          margin: 0;\n          padding: 0;\n          width: 100%;\n}\n.menu-preview .footer .menu-preview .menu-item .sub-buttons .sub-button[data-v-126bb182] {\n            height: 45px;\n            border: 1px solid #dfdfdf;\n}\n.menu-preview .footer .menu-preview .menu-item .sub-buttons .sub-button[data-v-126bb182]:hover {\n              background-color: #efefef;\n}\n.edit-panel[data-v-126bb182] {\n  display: block;\n  overflow: hidden;\n  background-color: #e7e7e7;\n  width: 100%;\n  padding: 1rem;\n  -webkit-border-radius: 5px;\n  -moz-border-radius: 5px;\n  border-radius: 5px;\n  border: 1px solid #eee;\n}\n.edit-panel .header[data-v-126bb182] {\n    padding-bottom: 1rem;\n    border-bottom: 1px solid #d5d5d5;\n}\n.edit-panel .header .btn-delete-menu[data-v-126bb182] {\n      float: right;\n}\n.edit-panel .body[data-v-126bb182] {\n    padding: 1rem;\n}\n.buttons[data-v-126bb182] {\n  margin-top: 30px;\n}\n", ""]);

// exports


/***/ }),

/***/ 237:
/***/ (function(module, exports) {

module.exports = "/js/images/bg_mobile_head.png?25efd07106b64435dc432de872def02a";

/***/ }),

/***/ 238:
/***/ (function(module, exports) {

module.exports = "/js/images/bg_mobile_foot.png?f149cc6ec5c22432551be15a00540ed5";

/***/ }),

/***/ 239:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.default = {
  data: function data() {
    return {
      menus: [],
      menuEdit: {
        id: null,
        name: '',
        type: 'click',
        key: '',
        url: ''
      }
    };
  },
  mounted: function mounted() {
    this.getMenus();
  },


  methods: {
    getMenus: function getMenus() {
      var _this = this;

      this.axios.get('menu/lists').then(function (response) {
        _this.menus = response.data.menus;
      }).catch(function (error) {
        console.log(error);
      });
    },
    storeAndPublish: function storeAndPublish() {
      this.axios.post('menu/store', this.menu).then(function (response) {
        console.log(response);
      }).catch(function (error) {
        console.log(error);
      });
    },
    deleteMenu: function deleteMenu() {
      var _this2 = this;

      this.$confirm('确定要删除此菜单?', '操作确认', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'info'
      }).then(function () {
        if (_this2.menuEdit.id) {
          _this2.axios.post('menu/delete', { id: _this2.menuEdit.id }).then(function () {
            _this2.$message({
              message: '删除成功',
              type: 'success'
            });
          }).catch(function (error) {
            _this2.$message({
              message: error.response.data,
              type: 'error'
            });
          });
        } else {}
      });
    },
    syncMenu: function syncMenu() {
      var _this3 = this;

      this.axios.post('menu/sync').then(function (response) {
        _this3.menus = response.data.menus;
      });
    },
    checkActive: function checkActive(menuItem) {
      if (this.menuEdit.id === menuItem.id) return true;

      return false;
    },
    menuItemClick: function menuItemClick(menuItem) {
      this.menuEdit.id = menuItem.id;
      this.menuEdit.name = menuItem.name;
      this.menuEdit.type = menuItem.type;
      this.menuEdit.key = menuItem.key;
      this.menuEdit.url = menuItem.url;
    }
  }
};

/***/ }),

/***/ 240:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "right-main"
  }, [_c('el-button', {
    attrs: {
      "type": "primary"
    },
    nativeOn: {
      "click": function($event) {
        _vm.syncMenu($event)
      }
    }
  }, [_vm._v("同步")]), _vm._v(" "), _c('el-row', {
    attrs: {
      "gutter": 30
    }
  }, [_c('el-col', {
    attrs: {
      "span": 8
    }
  }, [_c('div', {
    staticClass: "menu-preview"
  }, [_c('div', {
    staticClass: "header"
  }, [_c('div', {
    staticClass: "account-name"
  }, [_vm._v("公众号名")])]), _vm._v(" "), _c('div', {
    staticClass: "footer"
  }, [_c('div', {
    staticClass: "menu-preview"
  }, [_vm._l((_vm.menus), function(menu, index) {
    return _c('div', {
      staticClass: "menu-item",
      class: {
        active: _vm.checkActive(menu)
      },
      on: {
        "click": function($event) {
          $event.stopPropagation();
          $event.preventDefault();
          _vm.menuItemClick(menu)
        }
      }
    }, [_c('span', {
      staticClass: "menu-title",
      domProps: {
        "textContent": _vm._s(menu.name)
      }
    }), _vm._v(" "), (menu.sub_buttons.length) ? _c('ul', {
      staticClass: "sub-buttons"
    }, [_vm._l((menu.sub_buttons), function(sub_button) {
      return _c('li', {
        staticClass: "sub-button",
        class: {
          active: _vm.checkActive(sub_button)
        },
        domProps: {
          "textContent": _vm._s(sub_button.name)
        },
        on: {
          "click": function($event) {
            $event.stopPropagation();
            $event.preventDefault();
            _vm.menuItemClick(sub_button)
          }
        }
      })
    }), _vm._v(" "), (menu.sub_buttons.length <= 4) ? _c('li', {
      staticClass: "sub-button btn-sub-plus",
      on: {
        "click": function($event) {
          $event.stopPropagation();
          $event.preventDefault();
          _vm.btnAddSubClick()
        }
      }
    }, [_vm._v("+")]) : _vm._e()], 2) : _c('ul', {
      staticClass: "sub-buttons"
    }, [_c('li', {
      staticClass: "sub-button btn-add-sub"
    }, [_vm._v("+")])])])
  }), _vm._v(" "), (_vm.menus.length < 3) ? _c('div', {
    staticClass: "menu-item btn-add-top"
  }, [_vm._v("+")]) : _vm._e()], 2)])])]), _vm._v(" "), _c('el-col', {
    attrs: {
      "span": 16
    }
  }, [_c('div', {
    staticClass: "edit-panel"
  }, [_c('div', {
    staticClass: "header"
  }, [_c('span', {
    staticClass: "menu-name"
  }, [_vm._v("菜单名称")]), _vm._v(" "), _c('el-button', {
    staticClass: "btn-delete-menu",
    on: {
      "click": function($event) {
        $event.stopPropagation();
        $event.preventDefault();
        _vm.deleteMenu($event)
      }
    }
  }, [_vm._v("删除菜单")])], 1), _vm._v(" "), _c('div', {
    staticClass: "body"
  }, [_c('el-form', {
    ref: "form",
    attrs: {
      "model": _vm.menuEdit,
      "label-width": "90px"
    }
  }, [_c('el-form-item', {
    attrs: {
      "label": "菜单名称"
    }
  }, [_c('el-input', {
    attrs: {
      "placeholder": "字数不超过4个汉字或8个字母"
    },
    model: {
      value: (_vm.menuEdit.name),
      callback: function($$v) {
        _vm.menuEdit.name = $$v
      },
      expression: "menuEdit.name"
    }
  })], 1), _vm._v(" "), _c('el-form-item', {
    attrs: {
      "label": "菜单内容"
    }
  }, [_c('el-select', {
    attrs: {
      "placeholder": ""
    },
    model: {
      value: (_vm.menuEdit.type),
      callback: function($$v) {
        _vm.menuEdit.type = $$v
      },
      expression: "menuEdit.type"
    }
  }, [_c('el-option', {
    attrs: {
      "label": "点击推事件",
      "value": "click"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "跳转链接",
      "value": "view"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "扫码推事件",
      "value": "scancode_push"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "扫码推事件且提示",
      "value": "scancode_waitmsg"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "弹出系统拍照发图",
      "value": "pic_sysphoto"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "弹出拍照或相册发图",
      "value": "pic_photo_or_album"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "弹出微信相册发图",
      "value": "pic_weixin"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "弹出地理位置选择器",
      "value": "location_slect"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "发送消息",
      "value": "media_id"
    }
  }), _vm._v(" "), _c('el-option', {
    attrs: {
      "label": "跳转图文消息 URL",
      "value": "view_limited"
    }
  })], 1)], 1), _vm._v(" "), _c('el-form-item', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.menuEdit.type === 'click'),
      expression: "menuEdit.type === 'click'"
    }],
    attrs: {
      "label": "关键词"
    }
  }, [_c('el-input', {
    attrs: {
      "placeholder": ""
    },
    model: {
      value: (_vm.menuEdit.key),
      callback: function($$v) {
        _vm.menuEdit.key = $$v
      },
      expression: "menuEdit.key"
    }
  })], 1), _vm._v(" "), _c('el-form-item', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: (_vm.menuEdit.type === 'view'),
      expression: "menuEdit.type === 'view'"
    }],
    attrs: {
      "label": "页面地址"
    }
  }, [_c('el-input', {
    attrs: {
      "placeholder": ""
    },
    model: {
      value: (_vm.menuEdit.url),
      callback: function($$v) {
        _vm.menuEdit.url = $$v
      },
      expression: "menuEdit.url"
    }
  })], 1)], 1)], 1)])])], 1), _vm._v(" "), _c('el-row', {
    staticClass: "buttons",
    attrs: {
      "type": "flex",
      "justify": "center"
    }
  }, [_c('el-col', {
    attrs: {
      "span": 6
    }
  }, [_c('el-button', {
    attrs: {
      "type": "primary"
    },
    nativeOn: {
      "click": function($event) {
        _vm.storeAndPublish($event)
      }
    }
  }, [_vm._v("保存并发布")]), _vm._v(" "), _c('el-button', {
    attrs: {
      "type": "default"
    }
  }, [_vm._v("预览")])], 1)], 1)], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-126bb182", module.exports)
  }
}

/***/ })

});