<?php

namespace Page;

class Gallery extends GeneralContent {
    
    private static $count = 0;
    
    private $id;
    private $quantidade = 0;

    public function __construct($element) {
        parent::__construct("div", "galeria_fotos", $element);
        
        $this->id = ++self::$count;
        
        $this->addAttribute("id", "gallery_" . $this->id);
        $this->addAttribute("slideIndex", "1");
    }

    public function text() {
        $id = $this->id;
        $quantidade = 0;
        
        $html = "";
        $html .= "<div class='slideshow-container'>";
        
        //coletando as informações internas da galeria
        $e = $this->element();

        foreach ($e->childNodes as $child) {
            switch ($child->localName) {
                case "imagem" :
                    $quantidade++;
                    
                    $html .= (new GalleryImage($child, $id, $quantidade))->html();
                    break;                
            }
        }
        
        $html .= "  <a class='prev' onclick='plusSlides($id, -1)'>&#10094;</a>";
        $html .= "  <a class='next' onclick='plusSlides($id, 1)'>&#10095;</a>";
        $html .= "</div>";
        
        $html .= "<br>";

        //criando os pontos para navegação
        $html .= "<div style='text-align:center'>";
        for ($i = 1; $i <= $quantidade; $i++) {
            $html .= "  <span class='dot " . ($i == 1? "active" : "") . "' id='gallery_$id" . "_dot_$i" . "' onclick='currentSlide($id, $i)'></span> ";
        }            
        $html .= "</div>";
        
        return $html;
    }

}
