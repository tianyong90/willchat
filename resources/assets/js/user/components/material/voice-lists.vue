<template>
  <div class="right-main">
    <div class="table-tools">
      <el-form :inline="true" :model="searchForm" class="demo-form-inline">
        <el-form-item>
          <el-input v-model="searchForm.keyword" placeholder="按昵称搜索" @keyup.enter.native="loadData"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" icon="search" @click="search">搜索</el-button>
          <el-button type="primary" icon="plus" @click="dialogFormVisible = true">上传语音素材</el-button>
          <el-button type="primary" icon="upload" @click="sync">同步语音素材</el-button>
        </el-form-item>
      </el-form>
    </div>

    <el-table :data="materials.data" border style="width: 100%">
      <el-table-column prop="media_id" label="MEDIA_ID" align="center">
      </el-table-column>
      <el-table-column prop="name" label="标题" align="center">
      </el-table-column>
      <el-table-column prop="description" label="描述" align="center">
      </el-table-column>
      <el-table-column prop="created_at" label="创建时间" align="center" width="170">
      </el-table-column>
      <el-table-column prop="updated_at" label="更新时间" align="center" width="170">
      </el-table-column>
      <el-table-column label="操作" inline-template align="center" width="120">
        <div>
          <el-button size="small" type="danger" @click.native="deleteMaterial(row)">删除</el-button>
        </div>
      </el-table-column>
    </el-table>

    <div class="paginator">
      <el-pagination
              @current-change="handleCurrentChange"
              :current-page="materials.current_page"
              :page-size="materials.per_page"
              layout="total, prev, pager, next, jumper"
              :total="materials.tatal">
      </el-pagination>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        searchForm: {
          keyword: ''
        },
        materials: [],
        dialogFormVisible: false,
        uploadFormData: {
          description: ''
        }
      }
    },

    mounted () {
      this.loadData();
    },

    methods: {
      loadData (page = 1) {
        this.axios.get('material/lists?type=mpvoice', {
          params: {
            keyword: this.searchForm.keyword,
            page: page
          }
        }).then((response) => {
          this.materials = response.data.materials;
        }).catch((error) => {
          this.$message({
            message: error.response.data,
            type: 'error'
          });
        })
      },

      // 上传素材
      uploadMpvoice () {
        let mpvoiceFile = this.$refs.mpvoiceFileInput.$el.children[0].files[0];

        if (typeof mpvoiceFile === 'undefined') {
          this.$message({
            message: '未选择上传的语音',
            type: 'error'
          });
          return;
        }

        let myForm = new FormData();
        myForm.append('file', mpvoiceFile);
        myForm.append('description', this.uploadFormData.description);

        // 上传
        this.axios.post('material/upload?type=mpvoice', myForm, {timeout: 20000}).then((response) => {
          this.dialogFormVisible = false;
          this.uploadFormData.description = '';

          this.$message({
            message: '上传成功',
            type: 'success'
          });

          setTimeout(() => {
            this.loadData(this.materials.current_page);
          }, 1000);
        }).catch((error) => {
          this.$message({
            message: error.response.data,
            type: 'error'
          });
        })
      },

      sync () {
        this.axios.get('material/sync?type=mpvoice', {timeout: 200000}).then((response) => {
          this.loadData(1);
        });
      },

      // 删除素材
      deleteMaterial (material) {
        this.$confirm('删除素材后将不可恢复, 是否继续?', '操作确认', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'info'
        }).then(() => {
          this.axios.post('material/delete', material, {timeout: 20000}).then((response) => {
            this.$message({
              message: '删除成功',
              type: 'success'
            });

            setTimeout(() => {
              this.loadData(this.materials.current_page);
            }, 1000);
          }).catch((error) => {
            this.$message({
              message: error.response.data,
              type: 'error'
            });
          })
        }).catch(() => {
          console.log('canceled');
        });
      },

      // 搜索
      search () {
        this.loadData(1);
      },

      handleCurrentChange (page) {
        this.loadData(page);
      }
    }
  }
</script>

<style scoped lang="scss">
</style>