var webpack = require("webpack");

module.exports = {
    entry: {
        rijkshuisstijl: "./src/js/rijkshuisstijl.js",
        rijkshuisstijlAdmin: "./src/js/admin.jsx",
        splash: "./src/js/splash.js"
    },
    output: {
        path: "./assets",
        publicPath: "/mod/rijkshuisstijl/assets/",
        filename: "[name].js",
        chunkFilename: "[id].js"
    },
    module: {
        loaders: [
            {
                test: /\.jsx$/,
                loader: 'babel?presets[]=es2015,presets[]=stage-0,presets[]=react'
            }
        ]
    },
    plugins: [
        new webpack.optimize.UglifyJsPlugin({compress: { warnings: false }}),
        new webpack.optimize.DedupePlugin(),
        new webpack.DefinePlugin({
            'process.env': {
                'NODE_ENV': JSON.stringify('production')
            }
        })
    ],
    resolve: {
        extensions: ['', '.js', '.jsx']
    }
}
