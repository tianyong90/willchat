const routes = [
  {
    path: '/',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/dashboard.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: false,
      requiresAuth: false,
      title: '首页'
    }
  },
  {
    path: '/account/add',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/account/form.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: false,
      requiresAuth: true,
      title: '添加公众号'
    }
  },
  {
    path: '/account/edit/:id',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/account/form.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: false,
      requiresAuth: true,
      title: '修改公众号'
    }
  },
  {
    path: '/login',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/auth/login.vue')));
    },
    meta: {
      topmenuVisible: false,
      sidebarVisible: false,
      requiresAuth: false,
      title: '用户登录'
    }
  },
  {
    path: '/manage/:id',
    redirect: '/menu/index'
  },
  {
    path: '/menu/index',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/menu/index.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: true,
      requiresAuth: false,
      title: '自定义菜单'
    }
  },
  {
    path: '/fans/index',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/fans/lists.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: true,
      requiresAuth: false,
      title: '粉丝列表'
    }
  },
  {
    path: '/qrcode/:type',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/qrcode/lists.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: true,
      requiresAuth: false,
      title: '二维码'
    }
  },
  {
    path: '/reply/text',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/reply/text-lists.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: true,
      requiresAuth: false,
      title: '粉丝列表'
    }
  },
  {
    path: '/reply/news',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/reply/news-lists.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: true,
      requiresAuth: false,
      title: '粉丝列表'
    }
  },
  {
    path: '/reply/subscribe',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/reply/subscribe-form.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: true,
      requiresAuth: false,
      title: '关注回复'
    }
  },
  {
    path: '/reply/default',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/reply/default-form.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: true,
      requiresAuth: false,
      title: '粉丝列表'
    }
  },
  {
    path: '/material/image',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/material/image-lists.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: true,
      requiresAuth: false,
      title: '粉丝列表'
    }
  },
  {
    path: '/material/video',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/material/video-lists.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: true,
      requiresAuth: false,
      title: '粉丝列表'
    }
  },
  {
    path: '/material/voice',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/material/voice-lists.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: true,
      requiresAuth: false,
      title: '粉丝列表'
    }
  },
  {
    path: '/document/lists',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/document/index.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: false,
      requiresAuth: false,
      title: '文档列表'
    }
  },
  {
    path: '/document/show/:id',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/document/show.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: false,
      requiresAuth: false,
      title: '文档详情'
    }
  },
  {
    path: '/profile',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/user/profile.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: false,
      requiresAuth: false,
      title: '用户信息'
    }
  },
  {
    path: '/avatar',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/user/avatar.vue')));
    },
    meta: {
      topmenuVisible: true,
      sidebarVisible: false,
      requiresAuth: false,
      title: '头像设置'
    }
  },
  {
    path: '*',
    component: (resolve) => {
      require.ensure([], () => resolve(require('./components/errors/404.vue')));
    },
    meta: {
      title: '404',
      showTopmenu: false
    }
  }
];

export default routes;
