var ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
    entry: {
        rijkshuisstijl: "./src/js/rijkshuisstijl.js",
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
            },
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader")
            },
            {
                test: /\.less$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader!less-loader")
            },
            {
                test: /\.(ttf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
                loader: 'file-loader'
            }
        ]
    },
    devtool: "source-map",
    plugins: [
        new ExtractTextPlugin("[name].css")
    ],
    resolve: {
        extensions: ['', '.js', '.jsx']
    }
}
