var path = require('path');
var webpack = require('webpack');
const autoprefixer      = require('autoprefixer');
const res = p => path.resolve(__dirname, p);
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

let theme = 'vuo-core';

module.exports = {
  entry: [
    './src/app.js',
  ],
  output: {
    path: __dirname + "/public/",
    // replace "theme name" with the name of your theme.
    publicPath: '/wp-content/themes/${theme}/public/',
    filename: "./bundled.js"
  },
    module: {
      loaders: [
				{
					test: /\.scss$/,
					use: ExtractTextPlugin.extract({
						fallback: 'style-loader',
						use: [{
							loader: 'css-loader',
								options: {
									minimize: true
								}
						},
						{
							loader: 'postcss-loader',
							options: {
								sourceMap: 'inline',
								plugins: () => [autoprefixer('last 2 versions', 'IE 10')],
							}
						},
						{
							loader: 'sass-loader',
							options: {
								data: '@import "variables"; @import "mixins"; @import "~foundation-sites/scss/foundation";',
								includePaths: [
									res('node_modules'),
									res('node_modules/foundation-sites/scss'),
									res('src/scss')
								]
							}
						}]
					})
				},
        {
          test: /\.js$/,
          loader: 'babel-loader',
          query: {
              presets: ['es2015']
          }
        },
				{
					test: /\.(png|jpg|gif|ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
					use: [
						{
							loader: 'file-loader',
							options: {
								name: '[name].[ext]'
							}
						}
					]
				},
      ] // close loaders
    }, // close module
    plugins: [
			new ExtractTextPlugin("styles.css"),
			new UglifyJsPlugin()
    ],
  };
