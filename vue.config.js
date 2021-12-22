module.exports = {
    publicPath: process.env.VUE_APP_PUBLIC_PATH,
    chainWebpack: (config) => {
      const svgRule = config.module.rule('svg');
   
      svgRule.uses.clear();
   
      svgRule
        .use('babel-loader')
        .loader('babel-loader')
        .end()
        .use('vue-svg-loader')
        .loader('vue-svg-loader');

      config
        .plugin('html')
        .tap(args => {
            args[0].title = "Base64";
            return args;
        })
    },
  }