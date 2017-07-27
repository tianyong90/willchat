import userConfig from '../config';

const getters = {
  accounts: (state) => {
    let temp = window.localStorage.getItem(userConfig.accountsKey);

    return temp ? JSON.parse(temp) : [];
  },

  user: (state) => {
    let temp = window.localStorage.getItem(userConfig.userKey);

    return temp ? JSON.parse(temp) : {};
  }
};

export default getters;
