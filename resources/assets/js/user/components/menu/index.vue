<template>
  <div class="right-main">
    <el-button type="primary" @click.native="syncMenu">同步</el-button>
    <el-row :gutter="30">
      <el-col :span="8">
        <div class="menu-preview">
          <div class="header">
            <div class="account-name">公众号名</div>
          </div>
          <div class="footer">
            <div class="menu-preview">
              <div class="menu-item" :class="{ active: checkActive(menu) }" v-for="(menu, index) in menus" @click.stop.prevent="menuItemClick(menu)">
                <span class="menu-title" v-text="menu.name"></span>
                <ul class="sub-buttons" v-if="menu.sub_buttons.length">
                  <li class="sub-button" :class="{ active: checkActive(sub_button) }" v-for="sub_button in menu.sub_buttons" v-text="sub_button.name" @click.stop.prevent="menuItemClick(sub_button)"></li>
                  <li class="sub-button btn-sub-plus" v-if="menu.sub_buttons.length <= 4" @click.stop.prevent="btnAddSubClick()">+</li>
                </ul>
                <ul class="sub-buttons" v-else>
                  <li class="sub-button btn-add-sub">+</li>
                </ul>
              </div>
              <div class="menu-item btn-add-top" v-if="menus.length < 3">+</div>
            </div>
          </div>
        </div>
      </el-col>
      <el-col :span="16">
        <div class="edit-panel">
          <div class="header">
            <span class="menu-name">菜单名称</span>
            <el-button class="btn-delete-menu" @click.stop.prevent="deleteMenu">删除菜单</el-button>
          </div>
          <div class="body">
            <el-form ref="form" :model="menuEdit" label-width="90px">
              <el-form-item label="菜单名称">
                <el-input v-model="menuEdit.name" placeholder="字数不超过4个汉字或8个字母"></el-input>
              </el-form-item>
              <el-form-item label="菜单内容">
                <el-select v-model="menuEdit.type" placeholder="">
                  <el-option label="点击推事件" value="click"></el-option>
                  <el-option label="跳转链接" value="view"></el-option>
                  <el-option label="扫码推事件" value="scancode_push"></el-option>
                  <el-option label="扫码推事件且提示" value="scancode_waitmsg"></el-option>
                  <el-option label="弹出系统拍照发图" value="pic_sysphoto"></el-option>
                  <el-option label="弹出拍照或相册发图" value="pic_photo_or_album"></el-option>
                  <el-option label="弹出微信相册发图" value="pic_weixin"></el-option>
                  <el-option label="弹出地理位置选择器" value="location_slect"></el-option>
                  <el-option label="发送消息" value="media_id"></el-option>
                  <el-option label="跳转图文消息 URL" value="view_limited"></el-option>
                </el-select>
              </el-form-item>
              <el-form-item label="关键词" v-show="menuEdit.type === 'click'">
                <el-input v-model="menuEdit.key" placeholder=""></el-input>
              </el-form-item>
              <el-form-item label="页面地址" v-show="menuEdit.type === 'view'">
                <el-input v-model="menuEdit.url" placeholder=""></el-input>
              </el-form-item>

            </el-form>
          </div>
        </div>
      </el-col>
    </el-row>
    <el-row type="flex" justify="center" class="buttons">
      <el-col :span="6">
        <el-button type="primary" @click.native="storeAndPublish">保存并发布</el-button>
        <el-button type="default">预览</el-button>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        menus: [],
        menuEdit: {
          id: null,
          name: '',
          type: 'click',
          key: '',
          url: ''
        }
      }
    },

    mounted () {
      this.getMenus();
    },

    methods: {
      getMenus () {
        this.axios.get('menu/lists').then((response) => {
          this.menus = response.data.menus;
        }).catch(error => {
          console.log(error);
        });
      },

      // 保存菜单数据并发布
      storeAndPublish () {
        this.axios.post('menu/store', this.menu).then((response) => {
          console.log(response);

//          this.menus = response.data.menus;
        }).catch(error => {
          console.log(error);
        });
      },

      deleteMenu () {
        this.$confirm('确定要删除此菜单?', '操作确认', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'info'
        }).then(() => {
          if (this.menuEdit.id) {
            // 要删除的菜单是已经保存过的
            this.axios.post('menu/delete', {id: this.menuEdit.id}).then(() => {
              this.$message({
                message: '删除成功',
                type: 'success'
              });

//              setTimeout(() => {
//                this.loadData(this.articles.current_page);
//              }, 1000);
            }).catch((error) => {
              this.$message({
                message: error.response.data,
                type: 'error'
              });
            })
          } else {
            // 菜单项尚未保存生效
            // TODO:
          }
        });
      },

      // 从微信同步菜单数据
      syncMenu () {
        this.axios.post('menu/sync').then((response) => {
          this.menus = response.data.menus;
        });
      },

      // 指定的菜单项是否正在编辑中
      checkActive (menuItem) {
        if (this.menuEdit.id === menuItem.id) return true;

        return false;
      },

      menuItemClick (menuItem) {
        this.menuEdit.id = menuItem.id;
        this.menuEdit.name = menuItem.name;
        this.menuEdit.type = menuItem.type;
        this.menuEdit.key = menuItem.key;
        this.menuEdit.url = menuItem.url;
      }
    }
  }
</script>

<style scoped lang="scss">
  $footerHeight: 50px;

  .right-main {
    background-color: #fff;
  }

  .menu-preview {
    display: block;
    overflow: hidden;
    position: relative;
    width: 320px;
    height: 500px;
    background-color: #fff;
    margin: 0 auto;
    border: 1px solid #ddd;
    
    .header {
      display: flex;
      position: absolute;
      width: 100%;
      height: 65px;
      background-image: url(../../../../img/bg_mobile_head.png);
      -webkit-background-size: 100%;
      background-size: 100%;
      background-repeat: no-repeat;
      justify-content: center;
      align-items: flex-end;

      .account-name {
        color: #fff;
        margin-bottom: 10px;
      }
    }

    .footer {
      display: block;
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: $footerHeight;
      background-image: url(../../../../img/bg_mobile_foot.png);
      -webkit-background-size: 100%;
      background-size: 100%;
      background-repeat: no-repeat;
      
      .menu-preview {
        display: flex;
        flex-direction: row;
        width: 275px;
        height: $footerHeight;
        float: right;
        overflow: visible;

        .active {
          border: 2px solid #2196F3 !important;
        }
        
        .menu-item {
          display: block;
          position: relative;
          flex: 1;
          cursor: pointer;
          text-align: center;
          line-height: $footerHeight - 5px;
          height: $footerHeight - 5px;
          border: 1px solid #efefef;

          .sub-buttons {
            display: block;
            overflow: hidden;
            background-color: #fff;
            position: absolute;
            bottom: $footerHeight;
            margin: 0;
            padding: 0;
            width: 100%;

            .sub-button {
              height: 45px;
              border: 1px solid #dfdfdf;

              &:hover {
                background-color: #efefef;
              }
            }
          }
        }
      }
    }
  }
  
  .edit-panel {
    display: block;
    overflow: hidden;
    background-color: #e7e7e7;
    width: 100%;
    padding: 1rem;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 1px solid #eee;
    
    .header {
      padding-bottom: 1rem;
      border-bottom: 1px solid #d5d5d5;

      .btn-delete-menu {
        float: right;
      }
    }

    .body {
      padding: 1rem;
    }
  }

  .buttons {
    margin-top: 30px;
  }
</style>