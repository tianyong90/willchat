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
        </el-form-item>
      </el-form>
    </div>

    <el-table :data="fans.data" border style="width: 100%">
      <el-table-column prop="nickname" label="触发关键词">
      </el-table-column>
      <el-table-column prop="sex" label="回复内容">
      </el-table-column>
      <el-table-column prop="location" label="添加时间">
      </el-table-column>
      <el-table-column prop="tagid_list" label="修改时间">
      </el-table-column>
      <el-table-column prop="remark" label="命中次数">
      </el-table-column>
      <el-table-column label="操作" inline-template>
        <div>
          <el-button size="small" type="primary" @click.native="charge(row.id)">修改</el-button>
          <el-button size="small" type="danger" @click.native="charge(row.id)">删除</el-button>
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
        this.axios.get('reply/lists?type=text', {
          params: {
            keyword: this.searchForm.keyword,
            sex: this.searchForm.sex,
            page: page
          }
        }).then((response) => {
          this.fans = response.data.fans;
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