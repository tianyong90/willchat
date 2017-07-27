const state = {
};

const getters = {
};

const actions = {
};

const mutations = {
  UPDATE_ORDER (state, value) {
    state.order[value.key] = value.value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations
};
