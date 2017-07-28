<template>
  <div class="main main-with-padding">
    <el-row :gutter="20" type="flex" justify="center">
      <el-col :span="6" v-for="account in accounts" :key="account.id" v-if="accounts.length > 0">
          <el-card class="box-card" @click.native="toManage(account.id)">
            <div slot="header" class="clearfix">
              <span style="line-height: 36px;">{{ account.name }}</span>
              <i class="setting-icon el-icon-edit" style="float: right;" @click.stop.prevent="toEdit(account.id)"></i>
            </div>
            <ul class="account-info">
              <li><span class="label">类型</span> {{ account.type }}</li>
              <li><span class="label">粉丝数</span> {{ account.fans_count }}</li>
              <li><span class="label">添加时间</span> {{ account.created_at }}</li>
            </ul>
          </el-card>
      </el-col>
      <el-col :span="6">
        <router-link to="/account/add" class="plus-card el-card"><i class="el-icon-plus"></i></router-link>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  import userConfig from '../config';

  export default {
    data () {
      return {
        accounts: []
      };
    },

    mounted () {
      this.axios.get('account/lists').then((response) => {
        this.accounts = response.data.accounts;
        window.localStorage.setItem(userConfig.accountsKey, JSON.stringify(response.data.accounts));
      }).catch((error) => {
        console.log(error);
      })
    },

    methods: {
      toManage (id) {
        window.localStorage.setItem('willchat_account_id', id);

        this.$router.push(`manage/${id}`);
      },

      toEdit (id) {
        this.$router.push(`account/edit/${id}`);
      }
    }
  }
</script>

<style scoped lang="scss">
  .setting-icon {
    color: #777;
    cursor: pointer;
  }

  .account-info {
    padding: 0;
    margin: 0;

    li {
      margin: .5em 0;
      color: #444;
    }

    .label {
      color: #000;
      display: block;
      float: left;
      width: 4em;
      text-align-last: justify;
      margin-right: 1em;
    }
  }
  
  .plus-card {
    display: block;
    overflow: hidden;
    background-color: #fff;
    height: 100%;
    position: relative;

    i {
      position: absolute;
      font-size: 3rem;
      color: lightgray;
      top: 50%;
      left: 50%;
      margin-top: -1.5rem;
      margin-left: -1.5rem;
    }
  }
</style>
