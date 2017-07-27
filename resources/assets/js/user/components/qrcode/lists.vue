<template>
  <div class="right-main">
    <div class="table-tools">
      <el-form :inline="true" :model="searchForm" class="demo-form-inline">
        <el-form-item>
          <el-input v-model="searchForm.keyword" placeholder="按备注搜索" @keyup.enter.native="loadData"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" icon="search" @click="search">搜索</el-button>
          <el-button type="success" icon="plus" @click="dialogFormVisible = true">创建二维码</el-button>
        </el-form-item>
      </el-form>
    </div>

    <el-table :data="qrcodes.data" border style="width: 100%">
      <el-table-column label="预览" inline-template>
        <img class="preview" :src="'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' + row.ticket" alt=""/>
      </el-table-column>
      <el-table-column prop="keyword" label="二维码参数">
      </el-table-column>
      <el-table-column prop="remark" label="备注">
      </el-table-column>
      <el-table-column prop="created_at" label="创建时间">
      </el-table-column>
      <el-table-column prop="scaned_times" label="被扫次数">
      </el-table-column>
      <el-table-column label="操作" inline-template>
        <div>
          <!--<a class="el-button el-button&#45;&#45;primary el-button&#45;&#45;small" :href="'/api/user/qrcode/download/' + row.id">下载</a>-->
          <el-button size="small" type="danger" @click.native="charge(row.id)">删除</el-button>
        </div>
      </el-table-column>
    </el-table>

    <div class="paginator">
      <el-pagination
              @current-change="handleCurrentChange"
              :current-page="qrcodes.current_page"
              :page-size="qrcodes.per_page"
              layout="total, prev, pager, next, jumper"
              :total="qrcodes.tatal">
      </el-pagination>
    </div>

    <el-dialog title="创建二维码" v-model="dialogFormVisible" :modal="false">
      <el-form :model="qrcodeFormData">
        <el-form-item label="二维码参数" label-width="120">
          <el-input v-model="qrcodeFormData.keyword" auto-complete="off" placeholder="填写二维码参数"></el-input>
        </el-form-item>
        <el-form-item label="有效期" label-width="120" v-if="type === 'temporary'">
          <el-input v-model="qrcodeFormData.expir" auto-complete="off" placeholder="临时二维码的有效期，单位为秒"></el-input>
        </el-form-item>
        <el-form-item label="备注" label-width="120">
          <el-input v-model="qrcodeFormData.remark" auto-complete="off" placeholder="填写备注，便于后期区分"></el-input>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible = false">取 消</el-button>
        <el-button type="primary" @click="createQrcode">确 定</el-button>
      </div>
    </el-dialog>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        qrcodes: [],
        searchForm: {
          name: ''
        },
        dialogFormVisible: false,
        type: '',
        qrcodeFormData: {
          keyword: '',
          remark: '',
          expir: ''
        }
      }
    },

    mounted () {
      this.type = this.$route.params.type || 'temporary';
      this.loadData();
    },

    methods: {
      loadData (page = 1) {
        this.axios.get('qrcode/lists', {
          params: {
            keyword: this.searchForm.keyword,
            type: this.type,
            page: page
          }
        }).then((response) => {
          this.qrcodes = response.data.qrcodes;
        });
      },

      // 创建二维码
      createQrcode () {
        let postData = {
          type: this.type
        };

        Object.assign(postData, this.qrcodeFormData);

        this.axios.post('qrcode/create', postData).then(response => {
          this.dialogFormVisible = false;
          this.qrcodeFormData = {
            keyword: '',
            remark: '',
            expir: ''
          };

          this.$message({
            message: '创建成功',
            type: 'success'
          });

          setTimeout(() => {
            this.loadData();
          }, 1000);
        }).catch(error => {
          this.$message({
            message: error.response.data,
            type: 'error'
          });
        });
      },

      // 搜索
      search () {
        this.loadData(1);
      },

      handleCurrentChange (page) {
        this.loadData(page);
      }
    },

    watch: {
      '$route.params.type': function (val) {
        this.type = val;
        this.loadData();
      }
    }
  }
</script>

<style scoped lang="scss">
  .preview {
    display: block;
    overflow: hidden;
    margin: 10px 0;
    width: 100px;
    height: 100px;
  }
</style>