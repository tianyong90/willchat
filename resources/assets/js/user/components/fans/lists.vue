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
          <el-button type="primary" icon="upload" @click="syncWechatFans">从服务器粉丝数据</el-button>
        </el-form-item>
      </el-form>
    </div>

    <el-table :data="fans.data" border style="width: 100%">
      <el-table-column label="头像" inline-template>
        <img class="avatar" :src="row.headimgurl" alt=""/>
      </el-table-column>
      <el-table-column prop="nickname" label="昵称">
      </el-table-column>
      <el-table-column prop="sex" label="性别">
      </el-table-column>
      <el-table-column prop="location" label="地区">
      </el-table-column>
      <el-table-column prop="tagid_list" label="标签">
      </el-table-column>
      <el-table-column prop="subscribe_time" label="关注时间">
      </el-table-column>
      <el-table-column prop="remark" label="备注">
      </el-table-column>
      <el-table-column label="操作" inline-template>
        <div>
          <el-button size="small" type="primary" @click.native="charge(row.id)">test</el-button>
        </div>
      </el-table-column>
    </el-table>

    <div class="paginator">
      <el-pagination
              @current-change="handleCurrentChange"
              :current-page="fans.current_page"
              :page-size="fans.per_page"
              layout="total, prev, pager, next, jumper"
              :total="fans.tatal">
      </el-pagination>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        fans: [],
        searchForm: {
          name: '',
          sex: 'all'
        }
      }
    },

    mounted () {
      this.loadData();
    },

    methods: {
      loadData (page = 1) {
        this.axios.get('fans/lists', {
          params: {
            keyword: this.searchForm.keyword,
            sex: this.searchForm.sex,
            page: page
          }
        }).then((response) => {
          this.fans = response.data.fans;
        });
      },

      syncWechatFans () {
        // 同步粉丝数据
        this.axios.post('fans/sync', null, { timeout: 60000 }).then((response) => {
          this.loadData(1);
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
  .avatar {
    display: block;
    overflow: hidden;
    margin: 10px 0;
    width: 80px;
    height: 80px;
  }
</style>