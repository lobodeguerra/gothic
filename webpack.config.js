const path = require('path');

module.exports = {
    entry: './resources/src/index.js',
    output: {
        filename: 'app.js',
        path: path.resolve(__dirname, 'public', 'dist')
    }
};