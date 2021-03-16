const webpack = require('webpack');

const path = require('path');
const WebpackNotifierPlugin = require('webpack-notifier');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const TerserPlugin = require('terser-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const { WebpackManifestPlugin } = require('webpack-manifest-plugin');

const inProduction = (process.env.NODE_ENV === 'production');

let entries = {
    'app': './resources/src/App.js'
};

module.exports = {
    devtool: !inProduction ? 'source-map' : false,
    entry: entries,
    output: {
        path: __dirname + '/public/assets',
        publicPath: '/assets/',
        filename: inProduction ? '[name].[contenthash].js' : '[name].bundle.js',
        chunkFilename: inProduction ? '[id].[contenthash].js' : '[id].chunk.js',
    },
    module: {
        rules: [
            {
                test: /\.jsx?$/,
                use: ['babel-loader', 'eslint-loader'],
                exclude: /node_modules/,
            },
            {
                test: /\.less$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            modules: {
                                localIdentName: '[name]__[local]--[hash:base64:5]',
                                mode: 'global',
                            },
                            sourceMap: !inProduction,
                        }
                    },
                    {
                        loader: 'less-loader',
                        options: {
                            lessOptions: {
                                paths: [
                                    path.resolve(__dirname, path.resolve(__dirname, "node_modules")),
                                    path.resolve(__dirname, path.resolve(__dirname, "Resources/styles")),
                                ],
                            },
                            sourceMap: !inProduction
                        }
                    }
                ],
            },
            {
                test: /\.css/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            modules: {
                                mode: 'global',
                                localIdentName: '[name]__[local]--[hash:base64:5]',
                            },
                            sourceMap: !inProduction,
                        }
                    }
                ],
            },
            {
                test: [
                    /choices\.js\/.*\.svg/
                ],
                use: {
                    loader: 'svg-url-loader',
                    options: {}
                }
            },
            {
                test: /\.(gif|png|jpe?g|svg)$/i,
                use: [
                    {
                        loader: require.resolve('file-loader'),
                        options: {
                            name: '[name].[hash:8].[ext]',
                            outputPath: 'static',
                            publicPath: '/assets/static'
                        },
                    },
                ],
            }
        ]
    },
    optimization: {
        splitChunks: {
            chunks: 'async',
        },
        concatenateModules: false
    },
    plugins: [
        // TODO: add [chunkhash]
        new MiniCssExtractPlugin({
            filename: inProduction ? "[name].[contenthash].css" : "[name].css",
        }),
        new CleanWebpackPlugin('public/assets', {
            root: __dirname,
            verbose: !inProduction,
        }),
        new WebpackNotifierPlugin({alwaysNotify: true}),
        new WebpackManifestPlugin({
            // basePath: 'public/',
            fileName: __dirname + '/webpack.manifest.json',
            filter: fileDescriptor => !fileDescriptor.path.endsWith('.map'),
        }),
        new webpack.DefinePlugin({
            PRODUCTION: JSON.stringify(inProduction)
        }),
    ],
    resolve: {
        modules: [
            path.resolve(__dirname, 'Resources/js'),
            path.resolve(__dirname, 'Resources/styles'),
            path.resolve(__dirname, 'node_modules'),
            path.resolve(__dirname)
        ]
    },
    // resolveLoader: {
    //     alias: {
    //         'translations': path.resolve(__dirname, './Resources/js/loader/translationsLoader'),
    //     },
    // },
    watchOptions: {
        aggregateTimeout: 500,
        // poll: 1000,
        ignored: ["node_modules"]
    }
};

if (inProduction) {
    module.exports.optimization.minimizer = [new TerserPlugin()];
}
