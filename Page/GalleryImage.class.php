<?php

namespace Page;

class GalleryImage extends GeneralContent {
    
    private $galleryId;
    private $sequence;
    private $upperText;
    private $bottomText;
    private $indexText;
    private $url;

    public function __construct($element, $galleryId, $photoSequence) {
        parent::__construct("div", "mySlides fade", $element);
        $this->galleryId = $galleryId;
        $this->sequence = $photoSequence;
        
        $this->url = $element->getAttribute("url");
        $this->upperText = $element->getAttribute("textoSuperior");
        $this->bottomText = $element->getAttribute("textoInferior");
        $this->indexText = $element->getAttribute("textoCanto");
        
        $this->addAttribute("id", "gallery_$galleryId" . "_photo_$photoSequence");
        
        if ($this->sequence == 1)
            $this->addAttribute ("style", "display: block");
    }

    public function text() {
        $html = "";
        
        $html .= "<div class='text'>" . $this->upperText . "</div>";
        $html .= "<div class='image-container'>";
        $html .= "<div class='numbertext'>" . $this->indexText . "</div>";
        $html .= "<img src='" . $this->url . "' style='width:100%'>";
        $html .= "</div>";
        $html .= "<div class='text'>" . $this->bottomText . "</div>";

        return $html;
    }

}
