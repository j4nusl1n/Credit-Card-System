requirejs.config({
    baseUrl: jsVars.baseResUrl.js,
    shim: {
        backbone: {
            deps: [
                'jquery', 'underscore',
            ],
            exports: 'Backbone',
        },
        adminLTE: {
            deps: [
                'bootstrap',
            ]
        },
        bootstrap: {
            deps: [
                'jquery',
            ],
        }
    },
    urlArgs: 'ver=' + jsVars.version,
    paths: {
        jquery: CDN.jquery,
        underscore: CDN.underscore,
        backbone: CDN.backbone,
        bootstrap: CDN.bootstrap,
        adminLTE: CDN.adminLTE,
    },
})