const path = require( "path" );

module.exports = {
	entry: "./src/js/main.js",
	output: { path: path.resolve(__dirname, '../../js'), filename: "cranberry.js" },
	module: {
		loaders: [
			{
				test: /.jsx?$/,
				loader: "babel-loader",
				exclude: /node_modules/,
				query: {
					presets: [ "es2015", "react" ]
				}
			}
		]
	},
	externals: {
		"react": "React",
		"react-dom": "ReactDOM"
	}
};