const debug = process.env.NODE_ENV !== 'production';

const Config = {
  apiRoot: '/api/user',
  timeout: debug ? 10000 : 15000,
  jwtTokenKey: 'willchat_jwt_token',
  userKey: 'willchat_user',
  accountsKey: 'willchat_accounts',
};

export default Config;
