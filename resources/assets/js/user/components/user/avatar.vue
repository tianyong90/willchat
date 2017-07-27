<template>
  <div class="main main-with-padding">
    <el-row :gutter="20" type="flex" justify="center">
      <el-col :span="8">
        <el-upload
                class="avatar-uploader"
                :multiple="false"
                action="/api/user/avatar-upload"
                :headers="headers"
                name="avatar"
                :show-file-list="false"
                :auto-upload="true"
                :on-success="handleAvatarScucess"
                :before-upload="beforeAvatarUpload">
          <img v-if="imageUrl" :src="imageUrl" class="avatar">
          <i v-else class="el-icon-plus avatar-uploader-icon"></i>
        </el-upload>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  import userConfig from '../../config';
  import {mapGetters, mapActions} from 'vuex';

  export default {
    data () {
      return {
        imageUrl: '',
        headers: {}
      };
    },

    mounted () {
      this.headers = {
        Authorization: 'bearer ' + window.localStorage.getItem(userConfig.jwtTokenKey)
      };
    },

    methods: {
      ...mapActions([
        'storeUserToLocal'
      ]),

      handleAvatarScucess (res, file) {
        localStorage.setItem(userConfig.jwtTokenKey, res.token);

        if (res.user) {
          this.storeUserToLocal(res.user);
        }

        this.headers = {
          Authorization: 'bearer ' + res.token
        };

        this.imageUrl = URL.createObjectURL(file.raw);
      },

      beforeAvatarUpload (file) {
        const isJPG = file.type === 'image/jpeg';
        const isLt2M = file.size / 1024 / 1024 < 2;

        if (!isJPG) {
          this.$message.error('上传头像图片只能是 JPG 格式!');
        }
        if (!isLt2M) {
          this.$message.error('上传头像图片大小不能超过 2MB!');
        }
        return isJPG && isLt2M;
      }
    }
  }
</script>

<style scoped lang="scss">
  .avatar-uploader {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    background-color: #fff;
    text-align: center;
    
    .el-upload {
      background-color: grey;

      &:hover {
        border-color: #20a0ff;
      }
    }
  }
  
  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
  }

  .avatar {
    width: 230px;
    height: 230px;
    display: block;
  }
</style>
