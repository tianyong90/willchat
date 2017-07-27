<template>
  <div class="main main-with-padding">
    <ul class="post-list">
      <li v-for="post in posts.data">
        <router-link :to="'/document/show/' + post.id">{{ post.title }}</router-link>
      </li>
    </ul>

    <div class="paginator">
      <el-pagination
              @current-change="handleCurrentChange"
              :current-page="posts.current_page"
              :page-size="posts.per_page"
              layout="total, prev, pager, next, jumper"
              :total="posts.tatal">
      </el-pagination>
    </div>

  </div>
</template>

<script>
  export default {
    data () {
      return {
        posts: [],
        searchForm: {
          name: '',
          level: 'all'
        }
      }
    },

    mounted () {
      this.loadData();
    },

    methods: {
      loadData (page = 1) {
        this.axios.get('document/lists', {
          params: {
            name: this.searchForm.name,
            level: this.searchForm.level,
            page: page
          }
        }).then((response) => {
          this.posts = response.data.posts;
        }).catch((error) => {
          this.$message({
            message: error.response.data,
            type: 'error'
          });
        })
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

    .post-list {
      display: block;
      background-color: #fff;
      overflow: hidden;
      padding: 3rem;

      li {
        display: block;
        padding: .2em 0;
        font-size: 16px;
        line-height: 1.5em;

        &:hover {
          background-color: rgba(255, 0, 0, 0.2);
        }

        a {
          display: block;
          color: #555;

          &:visited {
            color: red;
          }
        }
      }
    }
  }
</style>
