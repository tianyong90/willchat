<template>
  <div class="main main-with-padding">
    <div class="post">
      <h1 class="title">{{ post.title }}</h1>

      <div class="content">
        {{ post.content }}
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        post: {}
      }
    },

    mounted () {
      this.axios.get('document/show/' + this.$route.params.id).then((response) => {
        this.post = response.data.post;
      });
    }
  }
</script>

<style scoped lang="scss">
  .post {
    display: block;
    overflow: hidden;
    padding: 3rem;
    background-color: #fff;

    .title {
      font-size: 20px;
      text-align: center;
    }

    .content {
      display: block;
      font-size: 16px;
      line-height: 1.5em;
    }
  }
</style>