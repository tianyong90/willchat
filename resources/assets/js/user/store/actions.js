import userConfig from '../config';

const actions = {
  storeUserToLocal: ({ commit }, user) => {
    localStorage.setItem(userConfig.userKey, JSON.stringify(user));
  }
};

export default actions;
