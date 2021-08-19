const path = require('path');
const webpack = require('webpack');
const CompressionPlugin = require('compression-webpack-plugin');

const optionDefinitions = [
    { name: 'verbose', alias: 'v', type: Boolean },
    { name: 'src', type: String, multiple: true, defaultOption: true },
    { name: 'timeout', alias: 't', type: Number },
    { name: 'mode', type: String, defaultOption: 'unknown' },
    { name: 'analyze', type: Boolean, defaultOption: false },
    { name: 'watch', type: Boolean},
];


const commandLineArgs = require('command-line-args');
const options = commandLineArgs(
  optionDefinitions,
  {partial: false}
);

const TimestampWebpackPlugin = require('timestamp-webpack-plugin');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

module.exports = {
    devtool: 'source-map',
    entry: {
        app: [
            './public/tsx/bootstrap.tsx',
        ]
        // ,
        // vendor: [
        //   'react',
        //   'react-dom'
        // ]
    },
    module: {
        rules: [
            {
                test: /\.(ts|tsx)$/,
                loader: 'ts-loader'
            },
            {
                test: /\.css$/i,
                use: ['style-loader', 'css-loader'],
            },
            {
                enforce: "pre",
                test: /\.js$/,
                loader: "source-map-loader"
            }
        ]
    },
    optimization: {
        splitChunks: {
            cacheGroups: {
                default: false,
                vendors: false,
            }
        }
    },
    output: {
        path: path.resolve(__dirname, 'public/js'),
        filename: '[name].bundle.js'
    },
    performance: {
        hints: false,
        // hints: process.env.NODE_ENV === 'production' ? "warning" : false
    },
    plugins: [
        // new HtmlWebpackPlugin({ template: path.resolve(__dirname, 'src', 'app', 'index.html') }),
        // new webpack.HotModuleReplacementPlugin()
        // new TimestampWebpackPlugin({
        //     path: path.join(__dirname, 'public/dist'),
        //     // default output is timestamp.json
        //     filename: 'timestamp.json'
        // }),
        // new BundleAnalyzerPlugin({
        //     analyzerHost: "0.0.0.0",
        //     analyzerMode: options.analyze === "enabled" ? 'static': "server",
        //     openAnalyzer: false
        // })

        new CompressionPlugin(),


        new webpack.optimize.LimitChunkCountPlugin({
            maxChunks: 1,
        }),

        // new webpack.ProvidePlugin({
        //     $: "jquery",
        //     jQuery: "jquery",
        //     "window.jQuery": "jquery"
        // })
    ],
    resolve: {
        extensions: ['.js', '.jsx', '.json', '.ts', '.tsx'],
        "alias": {
            "react": "preact/compat",
            "react-dom/test-utils": "preact/test-utils",
            "react-dom": "preact/compat",

            // 'react-dom': __dirname + '/node_modules/preact-compat',
            'react-addons-css-transition-group': __dirname + '/node_modules/rc-css-transition-group',
            'react-addons-shallow-compare': __dirname + '/node_modules/preact-shallow-compare',
            'react-color': __dirname + '/node_modules/react-color',
            // 'react': __dirname + '/node_modules/preact-compat',

        }
    },
    // // When importing a module whose path matches one of the following, just
    // // assume a corresponding global variable exists and use that instead.
    // // This is important because it allows us to avoid bundling all of our
    // // dependencies, which allows browsers to cache those libraries between builds.
    // externals: {
    //     "react": "React",
    //     "react-dom": "ReactDOM"
    // }
};