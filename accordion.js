jQuery(function(){ 
    jQuery(".accordion .item").click(function () {
        var e = jQuery(this);
        e.toggleClass("active");

        var panel =  jQuery(e.find(".panel")[0]);

        if (panel.length) {
            var size = parseInt(panel.css("max-height"));

            if (size) {
                panel.css("max-height", "");
            } else {
                panel.css("max-height", panel.prop("scrollHeight") + "px");
            }
        }
    }); 
});
