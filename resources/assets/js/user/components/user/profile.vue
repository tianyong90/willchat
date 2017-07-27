<template>
  <div class="main main-with-padding">
    <el-row :gutter="20">
      <el-col :span="8">
        <router-link to="/avatar">
          <img :src="user.avatar" class="avatar" alt=""/>
        </router-link>
      </el-col>
      <el-col :span="16">
        <div class="user-profile">
          <el-form label-position="top" label-width="120px" :model="user">
            <el-row :gutter="20">
              <el-col :span="12">
                <el-form-item label="用户名">
                  <el-input v-model="user.name" readonly></el-input>
                </el-form-item>
              </el-col>
              <el-col :span="12">
                <el-form-item label="昵称">
                  <el-input v-model="user.nickname"></el-input>
                </el-form-item>
              </el-col>
              <el-col :span="12">
                <el-form-item label="Email">
                  <el-input v-model="user.email" readonly></el-input>
                </el-form-item>
              </el-col>
              <el-col :span="12">
                <el-form-item label="手机">
                  <el-input v-model="user.mobile"></el-input>
                </el-form-item>
              </el-col>
              <el-col :span="12">
                <el-form-item label="QQ">
                  <el-input v-model="user.qq"></el-input>
                </el-form-item>
              </el-col>
              <el-col :span="12">
                <el-form-item label="最后登录时间">
                  <el-input v-model="user.last_login_at"></el-input>
                </el-form-item>
              </el-col>
            </el-row>
            <el-row type="flex" justify="center">
                <el-button type="primary" @click.native="save">保存</el-button>
                <el-button type="default" @click.native="$router.back()">取消</el-button>
            </el-row>
          </el-form>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  import {mapGetters, mapActions} from 'vuex';

  export default {
    data () {
      return {
      };
    },

    computed: {
      ...mapGetters([
        'user'
      ])
    },

    methods: {
      ...mapActions([
        'storeUserToLocal'
      ]),

      save () {
        this.axios.post('/user/profile', this.user).then(response => {
          this.storeUserToLocal(response.data.user);

          this.$root.success('保存成功');
        });
      }
    }
  }
</script>

<style scoped lang="scss">
  .avatar {
    display: block;
    width: 250px;
    height: 250px;
    overflow: hidden;
    margin: 0 auto;
  }
  
  .user-profile {
    display: block;
    overflow: hidden;
    background-color: #fff;
    padding: 20px 25px;
  }
</style>
