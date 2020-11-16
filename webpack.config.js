const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

const devMode = process.env.NODE_ENV !== 'production';

const plugins = [
    new MiniCssExtractPlugin({
        // Use cache busting on production.
        filename: devMode ? './../css/[name].css' : './../css/[name].[contenthash].css',
        chunkFilename: devMode ? './../css/[id].css' : './../css/[id].[contenthash].css'
    }),
    new CleanWebpackPlugin({ cleanStaleWebpackAssets: false }),
]

module.exports = {
    entry: './resources/src/index.js',
    output: {
        filename: 'app.js',
        path: path.resolve(__dirname, 'public', 'dist', 'js')
    },
    devtool: 'inline-source-map',
    plugins,
    devServer: {
        index: '',
        host: 'local.gothic.com',
        port: 3000,
        hot: true,
        writeToDisk: true,
        publicPath: '/dist/',
        open: true,
        proxy: {
            '**': {
                target: 'http://local.gothic.com'
            }
        }
    },
    module: {
        rules: [
            {
                test: /\.(sa|sc|c)ss$/i,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            publicPath: './public/dist/'
                        }
                    },
                    'css-loader',
                    'postcss-loader',
                    'sass-loader',
                ],
                exclude: /(node_modules|vendor)/
            }
        ]
    },
    performance: {
        hints: !devMode
    }
};