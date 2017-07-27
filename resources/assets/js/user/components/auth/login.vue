<template>
  <div class="login">
    <div class="login-form">
      <h1 class="title">WillChat</h1>
      <el-input type="text" placeholder="请输入用户名" v-model="formData.name" @keyup.native.enter="login"></el-input>
      <el-input type="password" placeholder="请输入登录密码" v-model="formData.password" @keyup.native.enter="login"></el-input>
      <el-button class="btn-submit" type="primary" @click.native="login" :disabled="false">登录</el-button>
    </div>
  </div>
</template>

<script>
  import userConfig from '../../config';
  import {mapActions} from 'vuex';

  export default {
    data () {
      return {
        formData: {
          name: '',
          password: ''
        }
      }
    },

    methods: {
      ...mapActions([
        'storeUserToLocal'
      ]),

      login () {
        this.axios.post('login', this.formData).then((response) => {
          localStorage.setItem(userConfig.jwtTokenKey, response.data.token);

          this.storeUserToLocal(response.data.user);

          this.$router.push('/');
        }).catch((error) => {
          this.$message({
            message: error.response.data,
            type: 'error'
          });
        })
      }
    }
  }
</script>

<style scoped lang="scss">
  .login {
    position: fixed;
    display: flex;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    justify-content: center;
    align-items: center;
    background-image: url("../../../../img/login-bg.jpg");
    background-size: cover;

    .login-form {
      display: block;
      width: 360px;
      background-color: rgba(0, 0, 0, .6);
      padding: 40px;
      border-radius: 10px;

      .title {
        color: #fff;
        font-size: 2rem;
        line-height: 2rem;
        text-align: center;
        font-family: 'Microsoft Yahei';
        font-weight: 400;
        margin-bottom: 1.5em;
      }

      .el-input {
        display: block;
        margin: 1rem 0;
      }

      .btn-submit {
        display: block;
        overflow: hidden;
        width: 100%;
        margin-top: 3rem;
      }
    }
  }
</style>
