var ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
    entry: "./src/js/rijkshuisstijl.js",
    output: {
        path: "./assets",
        publicPath: "/mod/rijkshuisstijl/assets/",
        filename: "rijkshuisstijl.js",
        chunkFilename: "[id].js"
    },
    module: {
        loaders: [
            {
                test: /\.jsx$/,
                loader: 'jsx-loader?insertPragma=React.DOM&harmony'
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
        new ExtractTextPlugin("rijkshuisstijl.css")
    ],
    resolve: {
        extensions: ['', '.js', '.jsx']
    }
}
