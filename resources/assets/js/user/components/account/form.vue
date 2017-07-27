<template>
  <div class="main main-with-padding">
    <el-form ref="form" :model="account" label-width="150px">
      <el-form-item label="公众号名称">
        <el-input v-model="account.name"></el-input>
      </el-form-item>
      <el-form-item label="类型">
        <el-select v-model="account.type" placeholder="">
          <el-option label="订阅号" value="1"></el-option>
          <el-option label="认证订阅号" value="2"></el-option>
          <el-option label="服务号" value="3"></el-option>
          <el-option label="认证服务号" value="4"></el-option>
        </el-select>
      </el-form-item>
      <el-form-item label="AppId">
        <el-input v-model="account.app_id"></el-input>
      </el-form-item>
      <el-form-item label="AppSecret">
        <el-input v-model="account.app_secret"></el-input>
      </el-form-item>
      <el-form-item label="AesKey">
        <el-input v-model="account.aes_key"></el-input>
      </el-form-item>
      <el-form-item label="备注">
        <el-input type="textarea" v-model="account.remark"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="store">保存</el-button>
        <el-button @click.native="$router.back()">取消</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        account: {
          id: '',
          name: '',
          type: '订阅号',
          app_id: '',
          app_secret: '',
          aes_key: '',
          merchant_id: '',
          merchant_key: '',
          cert_path: '',
          key_path: '',
          remark: '',
        }
      }
    },

    mounted () {
      const accountId = this.$route.params.id;

      if (accountId) {
        this.axios.get(`account/show/${accountId}`).then((response) => {
          this.account = response.data.account;
        });
      }
    },

    computed: {},

    methods: {
      store () {
        this.axios.post('account/store', this.account).then((response) => {
          this.$message({
            message: '添加成功',
            type: 'success'
          });

          setTimeout(() => {
            this.$router.push('/');
          }, 1000);
        });
      }
    },

    watch: {
      // 改变省时重置选择的市和区
      'formData.province': function (val, oldVal) {
        this.formData.city = this.cityList[0];
      },

      // 改变市时重置选择的县
      'formData.city': function (val, oldVal) {
        this.formData.area = this.areaList[0];
      }
    }
  }
</script>

<style scoped lang="scss">
</style>
