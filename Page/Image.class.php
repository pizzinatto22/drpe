<?php

namespace Page;

class Image extends GeneralContent {
    public function __construct($element) {
        parent::__construct("img", "imagem", $element, false);

        //extrai o elemento url e já adiciona na tag
        $this->addAttribute("src", $element->getAttribute('url'));
    }

    public function text() {
        return "";
    }
}