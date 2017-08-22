var clicking = false;
var previousX;
var previousY;


jQuery(function(){
    jQuery("#POPUP_IMAGES .modal-content").mousedown(function(e) {
        e.preventDefault();
        previousX = e.clientX;
        previousY = e.clientY;
        clicking = true;
    });

    jQuery(document).mouseup(function() {
        clicking = false;
    });

    jQuery("#POPUP_IMAGES .modal-content").mousemove(function(e) {
        if (clicking) {
            e.preventDefault();
            var directionX = (previousX - e.clientX) > 0 ? 1 : -1;
            var directionY = (previousY - e.clientY) > 0 ? 1 : -1;
            //jQuery("#POPUP_IMAGES .modal-content").scrollLeft(jQuery("#POPUP_IMAGES .modal-content").scrollLeft() + 10 * directionX);
            //jQuery("#POPUP_IMAGES .modal-content").scrollTop(jQuery("#POPUP_IMAGES .modal-content").scrollTop() + 10 * directionY);
            jQuery("#POPUP_IMAGES .modal-content").scrollLeft(jQuery("#POPUP_IMAGES .modal-content").scrollLeft() + (previousX - e.clientX));
            jQuery("#POPUP_IMAGES .modal-content").scrollTop(jQuery("#POPUP_IMAGES .modal-content").scrollTop() + (previousY - e.clientY));
            previousX = e.clientX;
            previousY = e.clientY;
        }
    });



    jQuery("#POPUP_IMAGES .modal-content").mouseleave(function(e) {
        clicking = false;
    });
});