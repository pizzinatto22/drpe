function plusSlides(id, n) {
    var slideIndex = parseInt(jQuery("#gallery_" + id).attr("slideIndex"));
    slideIndex += n;
    
    jQuery("#gallery_" + id).attr("slideIndex", slideIndex);
    
    showSlides(id, slideIndex);
}

function currentSlide(id, n) {
    jQuery("#gallery_" + id).attr("slideIndex", n);
    
    showSlides(id, n);
}

function showSlides(id, n) {
    var slides = jQuery("#gallery_" + id + " .mySlides");
    var dots =jQuery("#gallery_" + id + " .dot");

    var slideIndex = parseInt(jQuery("#gallery_" + id).attr("slideIndex"));


    if (n > slides.length)
        slideIndex = 1;
    else if (n < 1) 
        slideIndex = slides.length;
    
    jQuery("#gallery_" + id).attr("slideIndex", slideIndex);

    slides.css("display", "none");
    dots.removeClass("active");
    
    jQuery("#gallery_" + id + "_dot_" + slideIndex).addClass("active");
    jQuery("#gallery_" + id + "_photo_" + slideIndex).css("display", "block");

}