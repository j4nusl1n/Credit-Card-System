requirejs.config({
    baseUrl: jsVars.baseResUrl.js,
    shim: {},
    urlArgs: 'ver=' + jsVars.version,
    paths: {
        jquery: CDN.jqeury,
        underscore: CDN.underscore,
        backbone: CDN.backbone,
    },
})