var debug = false;
var webpack = require('webpack');
var path = require('path');

module.exports = {
  context: __dirname + "/js/src",
  devtool: debug ? "inline-sourcemap" : null,
  entry: "./app.js",
  module: {
    loaders: [
      {
        test: /\.js?$/,
        exclude: /(node_modules|bower_components|js\/dist)/,
        loader: 'babel-loader',
        query: {
          presets: ['react', 'es2015', 'stage-0'],
          plugins: ['react-html-attrs', 'transform-class-properties', 'transform-decorators-legacy'],
        }
      }
    ]
  },
  output: {
    path: __dirname + "/js/dist/",
    filename: "app.min.js"
  },
  plugins: debug ? [] : [
    new webpack.optimize.DedupePlugin(),
    new webpack.optimize.OccurenceOrderPlugin(),
    new webpack.optimize.UglifyJsPlugin({
        mangle: false,
        sourcemap: false,
        compress: {
            warnings: false,
            drop_console: true
        }
    }),
  ],
  resolve: {
    root: __dirname + "/js/src/"
    // root: [
      // path.resolve('./src/js'),
    // ]
  }
};