var path = require('path');
// var themeLocation = './app/wp-content/themes/cannabition';
var themeLocation = './html';

module.exports = {
	entry: themeLocation + "/assets/js/scripts/scripts.js",
	output:{
		path:path.resolve(__dirname,themeLocation + "/assets/js/"),
		filename: "app.js"
	},

  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      }
    ]
  },
  mode: 'development'

	
}