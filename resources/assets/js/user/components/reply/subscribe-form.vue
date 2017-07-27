<template>
  <div class="right-main">
    <el-form ref="form" :model="reply" label-width="150px">
      <el-form-item label="回复内容">
        <el-input type="textarea" :rows="10" v-model="reply.content"></el-input>
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
        reply: {
          id: '',
          content: '',
          type: 'subscribe'
        }
      }
    },

    mounted () {
      this.axios.get(`reply/subscribe`).then((response) => {
        if (response.data.reply) {
          this.reply = response.data.reply;
        }
      });
    },

    computed: {},

    methods: {
      store () {
        this.axios.post('reply/store', this.reply).then((response) => {
          this.reply = response.data.reply;

          this.$message({
            message: '保存成功',
            type: 'success'
          });
        });
      }
    }
  }
</script>

<style scoped lang="scss">
  .right-main {
    display: block;
    overflow: hidden;
    background-color: #fff;
  }
</style>
