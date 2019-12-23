const path = require('path'),
    webpack = require('webpack');

const TimestampWebpackPlugin = require('timestamp-webpack-plugin');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;


module.exports = {
    entry: {
        app: [
            './public/tsx/App.tsx'// ,
            // 'webpack-hot-middleware/client'
        ],
        vendor: ['react', 'react-dom']
    },
    output: {
        path: path.resolve(__dirname, 'public/dist'),
        filename: 'js/[name].bundle.js'
    },
    devtool: 'source-map',
    resolve: {
        extensions: ['.js', '.jsx', '.json', '.ts', '.tsx']
    },
    module: {
        rules: [
            {
                test: /\.(ts|tsx)$/,
                loader: 'ts-loader'
            },
            { enforce: "pre", test: /\.js$/, loader: "source-map-loader" }
        ]
    },
    plugins: [
        // new HtmlWebpackPlugin({ template: path.resolve(__dirname, 'src', 'app', 'index.html') }),
        // new webpack.HotModuleReplacementPlugin()
        new TimestampWebpackPlugin({
            path: path.join(__dirname, 'public/dist'),
            // default output is timestamp.json
            filename: 'timestamp.json'
        }),
        new BundleAnalyzerPlugin({
            analyzerHost: "0.0.0.0",
            openAnalyzer: false
        })
    ],
    // // When importing a module whose path matches one of the following, just
    // // assume a corresponding global variable exists and use that instead.
    // // This is important because it allows us to avoid bundling all of our
    // // dependencies, which allows browsers to cache those libraries between builds.
    // externals: {
    //     "react": "React",
    //     "react-dom": "ReactDOM"
    // }
}