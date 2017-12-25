require([jsVars.baseResUrl.js + 'lib/common.js'], function() {
    require([
        'backbone',
        'app/main',
    ], function(undefined, Main) {
        var Index = Backbone.View.extend({
            el: 'body',
            template: '',
            initialize: function() {
                var main = new Main();
            },
        });

        window.app = new Index();
    });
});