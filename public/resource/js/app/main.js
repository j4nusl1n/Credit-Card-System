define([
    'backbone',
    'adminLTE',
], function(Backbone) {
    var Main = Backbone.View.extend({
        initialize: function() {
            $('ul[data-widget=tree]').tree();
        }
    });
    
    return Main;
});