define([
    'backbone',
    'adminLTE',
], function(Backbone) {
    var Main = Backbone.View.extend({
        initialize: function() {
            $('ul').tree();
        }
    });
    
    return Main;
});