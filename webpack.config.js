// webpack.config.js
const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .enableSingleRuntimeChunk()
    .copyFiles([
        {
            from: './node_modules/bootstrap/dist',
            to: 'bootstrap/[path][name].[ext]'
        },
        {
            from: './node_modules/jquery/dist',
            to: 'jquery/[path][name].[ext]'
        },
        {
            from: './node_modules/jquery-validation/dist',
            to: 'jquery.validation/[path][name].[ext]'
        },
        {
            from: './node_modules/select2/dist',
            to: 'select2/[path][name].[ext]'
        },
        {
            from: './node_modules/@mudde/formgen/dist',
            to: 'mudde/[path][name].[ext]'
        },
        {
            from: './node_modules/semantic-ui-flag',
            to: 'semantic-ui-flag/[path][name].[ext]'
        }
        
    ])    
    ;

const config = Encore.getWebpackConfig();

config.resolve.aliasFields = ['browser'];

module.exports = config;