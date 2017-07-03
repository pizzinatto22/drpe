<?php

namespace Page;

class Link extends SimpleHTML {

    public function __construct($element) {
        
        
        parent::__construct("a", "link", $element);

        //extrai o elemento url e já adiciona na tag
        $this->addAttribute("href", $element->getAttribute('url'));
        $this->addAttribute("target", "_blank");
    }

}
