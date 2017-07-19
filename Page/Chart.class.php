<?php

namespace Page;

class Chart extends SimpleHTML {
    public function __construct($element) {
        parent::__construct("div", "grafico", $element);
        
        $this->addAttribute("id", $element->getAttribute('id'));
    }

}
