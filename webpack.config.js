var path = require('path');

module.exports = {
	entry:{
		'app':['./es6/app.js']
	},
		output: {
		path: path.resolve(__dirname, "web/js"),
		filename: '[name].js'
	},
	module: {
		loaders: [
		{
			test: /\.js$/, exclude: /node_modules/, loader: "babel-loader"
		}
		]
	},
	watch: true
};