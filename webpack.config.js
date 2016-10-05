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
    devtool: "eval-source-map",
    resolve: {
        extensions: ['', '.js', '.jsx']
    }
}
