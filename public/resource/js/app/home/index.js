require([jsVars.baseResUrl.js + 'lib/common.js'], function() {
    require([
        'backbone',
        'adminLTE',
    ], function() {
        var Index = Backbone.View.extend({
            el: 'body',
            template: '',
            initialize: function() {
                console.log($, _);
            },
        });

        window.app = new Index();
    });
});