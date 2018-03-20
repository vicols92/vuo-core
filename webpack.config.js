var path = require('path');
var webpack = require('webpack');
var BrowserSyncPlugin = require('browser-sync-webpack-plugin');


module.exports = {
  entry: [
    './src/app.js',
  ],
  output: {
    path: __dirname + "/public/",
    // replace "Best Theme" with the name of your theme.
    publicPath: 'wp-content/themes/Best Theme/public/',
    filename: "./bundled.js"
  },

  module: {
    loaders: [
      {
        test: /\.scss$/,
        use: [{
            loader: "style-loader" // creates style nodes from JS strings
        }, {
            loader: "css-loader" // translates CSS into CommonJS
        }, {
            loader: "sass-loader" // compiles Sass to CSS
        }],
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        query: {
            presets: ['es2015']
        }
      },
      {
        test: /\.(png|jpg|gif)$/,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: 8192
            }
          }
        ]
      },
    ] // close loaders
  }, // close module

  devServer: {
    host: 'localhost',
    port: 3000,
    hot: true
  },

  plugins: [
    new BrowserSyncPlugin({
        proxy: 'http://besttheme.test/',
        files: [{
            match: [
                '**/*.php'
            ],
            fn: function(event, file) {
                if (event === "change") {
                    const bs = require('browser-sync').get('bs-webpack-plugin');
                    bs.reload();
                }
            }
        }]
    })
  ],
  // important watch stays here
  watch: true
};
