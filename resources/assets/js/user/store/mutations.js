const mutations = {
  UPDATE_USER (state, value) {
    state.user = value;
  },

  UPDATE_LOADING (state, value) {
    state.isLoading = value;
  },

  UPDATE_TOPMENU_VISIBLE (state, value) {
    state.topmenuVisible = value;
  },

  UPDATE_SIDEBAR_VISIBLE (state, value) {
    state.sidebarVisible = value;
  },

  UPDATE_ACCOUNTS (state, value) {
    state.accounts = value;
  }
};

export default mutations;
