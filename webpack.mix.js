let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const path = require('path');
const webpack = require('webpack');

// 此项保证 webpack 能正常加载静态图片等资源
mix.setResourceRoot('/js/');

let plugins = [
  new webpack.optimize.CommonsChunkPlugin({
    name: 'vendor',
    filename: 'vendor.js'
  })
];

if (process.env.NODE_ENV === 'production') {
  // 生产环境中打包时先清理旧的打包文件
  const CleanWebpackPlugin = require('clean-webpack-plugin');
  plugins.push(new CleanWebpackPlugin('js', {
    root: path.join(__dirname, 'public'),
    // exclude:  ['shared.js'],
    verbose: true,
    dry: false
  }));
}

mix.webpackConfig({
  module: {
    rules: [
      {
        enforce: 'pre',
        test: /\.js$/,
        exclude: /(node_modules)/,
        loader: 'eslint-loader'
      }
    ]
  },
  entry: {
    user: './resources/assets/js/user/index.js',
    vendor: ['vue', 'vuex', 'vue-router', 'axios', 'vue-axios', 'element-ui']
  },
  output: {
    path: path.resolve(__dirname, 'public/js'),
    publicPath: '/js/',
    filename: '[name].js',
    chunkFilename: '[name].js'
  },
  plugins: plugins
});

if (process.env.NODE_ENV === 'production') {
  mix.version([
    'public/js/vendor.js',
    'public/js/user.js'
  ]);
}

mix.browserSync({
  proxy: 'localhost:8020/user',
  files: [
    'app/**/*.php',
    'resources/views/**/*.php',
    'public/js/**/*.js',
    'public/css/**/*.css',
  ]
});
