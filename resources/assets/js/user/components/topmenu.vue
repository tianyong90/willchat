<template>
  <el-menu id="topmenu" theme="dark" default-active="/" mode="horizontal" :router="true">
    <span class="logo">WILLCHAT</span>
    <el-menu-item index="/">首页</el-menu-item>
    <el-submenu index="">
      <template slot="title">公众号切换</template>
      <el-menu-item index="" v-for="account in accounts" :key="account.id" @click="changeAccount(account.id)">{{ account.name }}
      </el-menu-item>
    </el-submenu>
    <el-menu-item index="/document/lists">帮助中心</el-menu-item>
    <div id="right-part">
      <router-link to="/profile">
        <img :src="user.avatar" alt="" class="avatar"/>
      </router-link>
      <el-dropdown id="dropdown-menu">
        <span class="el-dropdown-link nickname" v-text="user.name"></span>
        <el-dropdown-menu slot="dropdown">
          <el-dropdown-item @click.native="$router.push('/profile')">用户信息</el-dropdown-item>
          <el-dropdown-item @click.native="logout">退出登录</el-dropdown-item>
        </el-dropdown-menu>
      </el-dropdown>
    </div>
  </el-menu>
</template>

<script>
  import userConfig from '../config';
  import { mapGetters } from 'vuex';

  export default {
    computed: {
      ...mapGetters([
        'accounts',
        'user'
      ])
    },

    methods: {
      changeAccount (accountId) {
        window.localStorage.setItem('willchat_account_id', accountId);

        this.$router.push(`/manage/${accountId}`);
      },

      logout () {
        window.localStorage.removeItem(userConfig.jwtTokenKey);

        this.$router.replace('/login');
      }
    }
  }
</script>

<style scoped lang="scss">
  .logo {
    display: block;
    overflow: hidden;
    float: left;
    width: 115px;
    color: white;
    font-size: 1.2rem;
    font-weight: bold;
    margin: 20px;
  }

  #right-part {
    .avatar {
      display: block;
      float: right;
      width: 40px;
      height: 40px;
      background: red;
      border-radius: 50%;
      margin: 10px 10px 0 20px;
      outline: none;
    }

    #dropdown-menu {
      float: right;
      color: white;
      font-size: 1.1rem;
      margin-top: 20px;
    }
  }
</style>
