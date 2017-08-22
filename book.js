var VIEWMODES = Object.freeze({
         PAGED: 1, 
    CONTINUOUS: 2
});

var currentViewMode = VIEWMODES.PAGED;

document.onkeydown = function(e) {
    switch (e.keyCode) {
        case 37:
            changePage(-1);
            break;
//        case 38:
//            alert('up');
//            break;
        case 39:
            changePage(1);
            break;
//        case 40:
//            alert('down');
//            break;
    }
};

/*
jQuery(function(){
    //Enable swiping...
    jQuery(".pagina").swipe( {
        
        swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
            if (direction === "left")
                changePage(+1);
            else if (direction === "right")
                changePage(-1);
            //$(this).text("You swiped " + direction );  
        }
        //Default is 75px, set to 0 for demo so any distance triggers swipe
        //threshold:0
    });
});
*/

jQuery(function(){
    jQuery(".pagina").touchwipe({
         wipeLeft: function() { changePage(1); },
         wipeRight: function() { changePage(-1); },
         //wipeUp: function() { alert("up"); },
         //wipeDown: function() { alert("down"); },
         min_move_x: 120,
         //min_move_y: 20,
         preventDefaultEvents: false,
         excludedElements: ".tabela,.modal"
    });
});

function openPopup(id) {
	
    var modal = jQuery("#" + id);

    modal.fadeIn("slow");

    jQuery("#" + id + " .modal-close").on("click", function(){
            modal.fadeOut("slow");
    });

    modal.on("click", function (event) {
        if (event.target.id == id) 
            modal.fadeOut("slow");
    });
	
}

function changeFontSize(amount, parent="") {
    jQuery(
            parent + " .capitulo," +
            parent + " .titulo," +
            parent + " .secao," +
            parent + " .paragrafo," +
            parent + " .citacao," +
            parent + " .subsecao," +
            parent + " .subsubsecao," +
            parent + " .itemlista"
         ).each(function (){
             
        var e = jQuery(this);
        var actual = parseInt(e.css("font-size"));
        var total = actual + amount;
        
        if (amount)
            e.css({
                'font-size': total + "px", 
                'line-height': (total * 1.618) + "px",
            }); //use golden rate
        else
            e.css({
                'font-size': '', 
                'line-height': '',
            });
            
    });

	
}

function switchPage(current, next, anchor) {
    if (currentViewMode == VIEWMODES.PAGED && next.length) {
        current.fadeOut("fast", function() {
            //após terminar o fadeOut, adiciona a classe de inativo
            current.removeClass("ativo").addClass("inativo");
            
            //mas como o fade trabalha com o atributo style do elemento,
            //no término fica com style="display: none".
            //Removo esse display, pois a classe .inativo já faz isso
            current.css({"display" : ""});
            
           
            next.fadeIn("slow", function(){
                next.removeClass("inativo").addClass("ativo");
                
                //quando precisa rolar, faz após aparecer a página
                gotoAnchor(anchor);
                
            });
        });
    }    
}

function changePage(direction) {
    var current = jQuery(".pagina.ativo");
    
    var next;
    
    if (direction === 1)
        next = current.next(".pagina");
    else
        next = current.prev(".pagina");
    
    switchPage(current, next, null);
}

function gotoPage(number, anchor) {
    //closing index
    var modal = jQuery("#MAIN_INDEX");
    modal.fadeOut("fast");

    //finding anchor
    var anchor = jQuery("#" + anchor);

    if (currentViewMode == VIEWMODES.PAGED) {
        var page = jQuery("#page_" + number);
        var current = jQuery(".pagina.ativo");
        
        //swi
        switchPage(current, page, anchor);
    } else {
        gotoAnchor(anchor);
    }
}

function gotoAnchor(anchor) {
    if (anchor && anchor.length) {
        jQuery('html, body').animate({
            scrollTop: (anchor.prev().offset().top - jQuery(".menu").height())
        }, 50);
    } else {
        window.scrollTo(0, 0);
    }
}

function switchContinuousView() {
    var button = jQuery("#continuous_button");
    
    if (currentViewMode == VIEWMODES.PAGED) {
        currentViewMode = VIEWMODES.CONTINUOUS;
        
        button.html("|");
        
        jQuery(".pagina.inativo").each(function(){
            var e = jQuery(this);
            e.removeClass("inativo").addClass("continuo"); 
        });
        
    } else {
        currentViewMode = VIEWMODES.PAGED;
        button.html("|||");
        
        jQuery(".pagina.continuo").each(function(){
            var e = jQuery(this);
            e.removeClass("continuo").addClass("inativo"); 
        });

    }
}

function toggleTable(table) {
    var clone = jQuery("#tabela_container_" + table).clone();
    
    clone.find(".controls").remove();
    
    jQuery("#POPUP_TABLES .modal-content .modal-table").html(clone);
    
    changeFontSize(0, "#POPUP_TABLES");
    
    openPopup("POPUP_TABLES");
}

function openPopupImage(image, size) {
    jQuery("#POPUP_IMAGES #modal-image").attr("src", image);

    jQuery("#POPUP_IMAGES #modal-image").css("width", size);
    
    openPopup("POPUP_IMAGES");
}

function changeTableSize(amount) {
    
    changeFontSize(amount, "#POPUP_TABLES");
    
    var w = jQuery("#POPUP_TABLES table").width();
    jQuery("#POPUP_TABLES table").width(w + amount*10);
}

function changePopupImageSize(amount){
    var w = jQuery("#POPUP_IMAGES #modal-image").width();
    jQuery("#POPUP_IMAGES #modal-image").width(w + amount);
    
}

function isElementInView (element, fullyInView) {
    var pageTop = $(window).scrollTop();
    var pageBottom = pageTop + $(window).height();
    var elementTop = $(element).offset().top;
    var elementBottom = elementTop + $(element).height();

    if (fullyInView === true) {
        return ((pageTop < elementTop) && (pageBottom > elementBottom));
    } else {
        return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
    }
}