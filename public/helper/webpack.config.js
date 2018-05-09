const path = require('path');

module.exports = {
    mode:'development',
    context: __dirname,
    devtool: "source-map",
    entry: "./src/js/form.js",
    output: {
        path: path.resolve(__dirname, "dist"),
        filename: "bundle.js"
    },
    resolve: {
        modules: ['node_modules']
    },
    module:{
        rules: [
            {
                test: /\.js/,
                loader: 'babel-loader',
                exclude: /(node_modules|bower_components)/
            },
            {test : /\.css$/, loader: 'style-loader!css-loader'}
        ]
    }
};