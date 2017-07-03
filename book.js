var expandedTables = {};

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

function changeFontSize(amount) {
    jQuery(".capitulo, .titulo, .secao, .paragrafo, .citacao").each(function (){
        var e = jQuery(this);
        var actual = parseInt(e.css("font-size"));
        var total = actual + amount;
        
        e.css({
            'font-size': total + "px", 
            'line-height': (total * 1.618) + "px",
        }); //use golden rate
    });

	
}

function switchPage(current, next) {
    if (next.length) {
        current.fadeOut("fast", function() {
            current.removeClass("ativo").addClass("inativo");
            
            window.scrollTo(0, 0);

            next.fadeIn("slow", function(){
                next.removeClass("inativo").addClass("ativo");
                
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
    
    switchPage(current, next);
}

function gotoPage(number) {
    var page = jQuery("#page_" + number);
    var current = jQuery(".pagina.ativo");
    
    //closing index
    var modal = jQuery("#MAIN_INDEX");
    modal.fadeOut("fast");
    
    //swi
    switchPage(current, page);
}

function switchContinuousView() {
    var button = jQuery("#continuous_button");
    
    if (button.html() == "|||") {
        button.html("|");
        
        jQuery(".pagina.inativo").each(function(){
            var e = jQuery(this);
            e.removeClass("inativo").addClass("continuo"); 
        });
        
    } else {
        button.html("|||");
        
        jQuery(".pagina.continuo").each(function(){
            var e = jQuery(this);
            e.removeClass("continuo").addClass("inativo"); 
        });

    }
}

function toggleTable(table) {
    
    if (expandedTables["table_" + table]) {
        expandedTables["table_" + table] = false;
        
        jQuery("#table_" + table).width("100%");
        jQuery("#table_control_img_" + table).attr("src", "images/expand.png");

    } else {
        expandedTables["table_" + table] = true;
        
        var w = jQuery("#table_" + table).width();
        jQuery("#table_" + table).width(w*2);
        
        jQuery("#table_control_img_" + table).attr("src", "images/collapse.png");
    }
}