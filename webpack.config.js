const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

const devMode = process.env.NODE_ENV !== 'production';

const plugins = [
  new MiniCssExtractPlugin({
    // Use cache busting on production.
    filename: devMode ? './../css/[name].css' : './../css/[name].[contenthash].css',
    chunkFilename: devMode ? './../css/[id].css' : './../css/[id].[contenthash].css',
  }),
  new CleanWebpackPlugin({ cleanStaleWebpackAssets: false }),
];

module.exports = {
  mode: devMode ? 'development' : 'production',
  entry: './src/views/assets/js/index.js',
  output: {
    filename: 'app.js',
    path: path.resolve(__dirname, 'public', 'dist', 'js'),
  },
  devtool: 'inline-source-map',
  plugins,
  devServer: {
    compress: true,
    devMiddleware: {
      index: false,
      writeToDisk: true,
    },
    host: 'local.gothic.com',
    hot: true,
    open: true,
    port: 3000,
    proxy: {
      context: () => true,
      target: 'http://local.gothic.com',
    },
    static: {
      publicPath: '/public/dist/',
    },
  },
  module: {
    rules: [
      {
        test: /\.(sa|sc|c)ss$/i,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: './public/dist/',
            },
          },
          'css-loader',
          'postcss-loader',
          'sass-loader',
        ],
        exclude: /(node_modules|vendor)/,
      },
    ],
  },
  performance: {
    hints: !devMode,
  },
};
