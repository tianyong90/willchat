<template>
  <div class="right-main">
    <div class="table-tools">
      <el-form :inline="true" :model="searchForm" class="demo-form-inline">
        <el-form-item>
          <el-input v-model="searchForm.keyword" placeholder="按昵称搜索" @keyup.enter.native="loadData"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" icon="search" @click="search">搜索</el-button>
          <el-button type="primary" icon="plus" @click="dialogFormVisible = true">上传图片素材</el-button>
          <el-button type="primary" icon="upload" @click="syncImage">从微信同步图片素材数据</el-button>
        </el-form-item>
      </el-form>
    </div>

    <el-table :data="materials.data" border style="width: 100%">
      <el-table-column prop="media_id" label="MEDIA_ID" align="center">
      </el-table-column>
      <el-table-column label="图片" inline-template>
          <img class="material-img" :src="row.url + '?type=fuck'" alt="">
      </el-table-column>
      <el-table-column prop="name" label="标题">
      </el-table-column>
      <el-table-column prop="description" label="描述">
      </el-table-column>
      <el-table-column prop="created_at" label="创建时间" align="center" width="170">
      </el-table-column>
      <el-table-column prop="updated_at" label="更新时间" align="center" width="170">
      </el-table-column>
      <el-table-column label="操作" inline-template align="center" width="120">
        <el-button size="small" type="danger" @click.native="deleteMaterial(row)">删除</el-button>
      </el-table-column>
    </el-table>

    <div class="paginator">
      <el-pagination
              @current-change="handleCurrentChange"
              :current-page="materials.current_page"
              :page-sizes="[20, 30, 40, 50]"
              :page-size="materials.per_page"
              layout="total, prev, pager, next, jumper"
              :total="materials.total">
      </el-pagination>
    </div>

    <el-dialog title="上传素材" v-model="dialogFormVisible" :modal="false">
      <el-form :model="uploadFormData">
        <el-form-item label="图片文件" label-width="120">
          <el-input type="file" ref="imageFileInput" auto-complete="off"></el-input>
        </el-form-item>
        <el-form-item label="图片说明" label-width="120">
          <el-input v-model="uploadFormData.description" auto-complete="off"></el-input>
        </el-form-item>
      </el-form>
      <div class="tips">支持 bmp/jpg/jpeg/png/gif 格式，大小在 2MB 以内</div>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible = false">取 消</el-button>
        <el-button type="primary" @click="uploadImage">确 定</el-button>
      </div>
    </el-dialog>
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
        this.axios.get('material/lists?type=image', {
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

      // 上传图片素材
      uploadImage () {
        let imageFile = this.$refs.imageFileInput.$el.children[0].files[0];

        if (typeof imageFile === 'undefined') {
          this.$message({
            message: '未选择上传的图片',
            type: 'error'
          });
          return;
        }

        let myForm = new FormData();
        myForm.append('file', imageFile);
        myForm.append('description', this.uploadFormData.description);

        // 上传
        this.axios.post('material/upload?type=image', myForm, {timeout: 20000}).then((response) => {
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

      syncImage () {
        this.axios.get('material/sync?type=image', {timeout: 200000}).then((response) => {
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
  .main {
    .material-img {
      display: inline-block;
      width: 200px;
    }
  }
</style>