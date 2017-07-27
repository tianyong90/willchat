<template>
  <div class="right-main">
    <div class="table-tools">
      <el-form :inline="true" :model="searchForm" class="demo-form-inline">
        <el-form-item>
          <el-input v-model="searchForm.keyword" placeholder="按昵称搜索" @keyup.enter.native="loadData"></el-input>
        </el-form-item>
        <el-form-item>
          <el-select v-model="searchForm.sex" placeholder="性别筛选" @change="loadData">
            <el-option label="全部" value="all"></el-option>
            <el-option label="男" value="0"></el-option>
            <el-option label="女" value="1"></el-option>
            <el-option label="其它" value="2"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" icon="search" @click="search">搜索</el-button>
          <el-button type="success" icon="plus" @click="showEditDialog">新增回复规则</el-button>
        </el-form-item>
      </el-form>
    </div>

    <el-table :data="replies.data" border style="width: 100%">
      <el-table-column prop="trigger_keywords" label="触发关键词">
      </el-table-column>
      <el-table-column prop="content" label="回复内容">
      </el-table-column>
      <el-table-column prop="created_at" label="添加时间">
      </el-table-column>
      <el-table-column prop="updated_at" label="修改时间">
      </el-table-column>
      <el-table-column prop="remark" label="命中次数">
      </el-table-column>
      <el-table-column label="操作" inline-template>
        <div>
          <el-button size="small" type="primary" @click.native="showEditDialog(row)">修改</el-button>
          <el-button size="small" type="danger" @click.native="deleteReply(row.id)">删除</el-button>
        </div>
      </el-table-column>
    </el-table>

    <div class="paginator">
      <el-pagination
              @current-change="handleCurrentChange"
              :current-page="replies.current_page"
              :page-size="replies.per_page"
              layout="total, prev, pager, next, jumper"
              :total="replies.tatal">
      </el-pagination>
    </div>

    <el-dialog title="添加文本回复" v-model="dialogFormVisible" :modal="false">
      <el-form :model="replyFormData">
        <el-form-item label="触发关键词" label-width="120">
          <el-input v-model="replyFormData.trigger_keywords" auto-complete="off" placeholder="填写触发关键字"></el-input>
        </el-form-item>
        <el-form-item label="回复内容" label-width="120">
          <el-input type="textarea" :rows="5" v-model="replyFormData.content" placeholder="填写回复内容"></el-input>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible = false">取 消</el-button>
        <el-button type="primary" @click="storeReply">确 定</el-button>
      </div>
    </el-dialog>
  </div>
</template>

<script>
  export default {
    data () {
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
      }
    },

    mounted () {
      this.loadData();
    },

    methods: {
      loadData (page = 1) {
        this.axios.get('reply/lists?type=text', {
          params: {
            keyword: this.searchForm.keyword,
            sex: this.searchForm.sex,
            page: page
          }
        }).then((response) => {
          this.replies = response.data.replies;
        });
      },

      // 搜索
      search () {
        this.loadData(1);
      },

      handleCurrentChange (page) {
        this.loadData(page);
      },

      // 保存
      storeReply () {
        let postData = this.replyFormData
        postData.trigger_type = 'keywords'

        this.axios.post('reply/store', postData).then(response => {
          this.dialogFormVisible = false;
          this.replyFormData.trigger_keywords = '';
          this.replyFormData.content = '';
          this.replyFormData.id = null;

          this.$message({
            message: '保存成功',
            type: 'success'
          });

          setTimeout(() => {
            this.loadData(this.replies.current_page);
          }, 1000);
        }).catch(error => {
          this.$message({
            message: error.response.data,
            type: 'error'
          });
        })
      },

      // 新增
      showEditDialog () {
        this.replyFormData.trigger_keywords = ''
        this.replyFormData.content = ''
        this.replyFormData.id = null

        this.dialogFormVisible = true
      },

      // 修改
      showEditDialog (reply) {
        this.replyFormData.trigger_keywords = reply.trigger_keywords
        this.replyFormData.content = reply.content
        this.replyFormData.id = reply.id

        this.dialogFormVisible = true
      },

      // 删除
      deleteReply (id) {
        this.$confirm('删除后将不可恢复, 是否继续?', '操作确认', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'info'
        }).then(() => {
          this.axios.post('reply/delete', { id: id }).then(response => {
            this.$message({
              message: '删除成功',
              type: 'success'
            });

            setTimeout(() => {
              this.loadData(this.replies.current_page);
            }, 1000);
          }).catch((error) => {
            this.$message({
              message: error.response.data,
              type: 'error'
            });
          })
        }).catch(() => {
          console.log('canceled');
        })
      }
    }
  }
</script>

<style scoped lang="scss">
</style>