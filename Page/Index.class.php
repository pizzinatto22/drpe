<?php

namespace Page;

class Index {
    public $level;
    public $description;
    
    public function __construct($element) {
        if ($element->hasAttribute("nivel"))
            $this->level = $element->getAttribute("nivel");
        
        $this->description = $element->nodeValue;
    }
}
