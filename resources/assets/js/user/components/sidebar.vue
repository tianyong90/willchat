<template>
  <div id="sidebar">
    <el-menu default-active="1" theme="dark" :router="true" :unique-opened="true" class="el-menu-vertical-demo">
      <el-submenu :index="index.toString()" v-for="(item, index) in MenuConfig" :key="item.index">
        <template slot="title"><i :class="'el-icon-' + item.icon"></i>{{ item.title }}</template>
        <el-menu-item :index="subItem.route" v-for="subItem in item.subItems" v-text="subItem.title" :key="subItem.index"></el-menu-item>
      </el-submenu>
    </el-menu>
  </div>
</template>

<script>
  const MenuConfig = [
    {
      title: '基本设置',
      icon: 'setting',
      subItems: [
        {
          title: '自定义菜单',
          route: '/menu/index'
        }
      ]
    },
    {
      title: '自动回复',
      icon: 'message',
      subItems: [
        {
          title: '文本回复',
          route: '/reply/text'
        },
        {
          title: '图文回复',
          route: '/reply/news'
        },
        {
          title: '关注回复',
          route: '/reply/subscribe'
        },
        {
          title: '默认回复',
          route: '/reply/default'
        }
      ]
    },
    {
      title: '粉丝管理',
      icon: 'message',
      subItems: [
        {
          title: '粉丝列表',
          route: '/fans/index'
        }
      ]
    },
    {
      title: '二维码管理',
      icon: 'message',
      subItems: [
        {
          title: '临时二维码',
          route: '/qrcode/temporary'
        },
        {
          title: '永久二维码',
          route: '/qrcode/forever'
        },
      ]
    },
    {
      title: '素材管理',
      icon: 'picture',
      subItems: [
        {
          title: '图片',
          route: '/material/image'
        },
        {
          title: '语音',
          route: '/material/voice'
        },
        {
          title: '视频',
          route: '/material/video'
        },
      ]
    }
  ];
  export default {
    data () {
      return {
        MenuConfig
      };
    },

    methods: {
      selected (index, indexPath) {
        console.log(index);
        console.log(indexPath);
      }
    }
  }
</script>

<style scoped lang="scss">
</style>
