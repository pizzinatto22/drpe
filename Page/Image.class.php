<?php

namespace Page;

class Image extends GeneralContent {
    public function __construct($element) {
        
        $class = "imagem";
        
        if ($element->hasAttribute("maior")) {
            $maior = $element->getAttribute('maior');
            $tamanhoMaior = $element->getAttribute('tamanhoMaior');
            $this->addAttribute("onclick", "openPopupImage(\"$maior\", \"$tamanhoMaior\")");
            
            $class .= " com_aumento";
        }
        
        parent::__construct("img", $class, $element, false);
        

        //extrai o elemento url e já adiciona na tag
        $this->addAttribute("src", $element->getAttribute('url'));
        
        
    }

    public function text() {
        return "";
    }
}