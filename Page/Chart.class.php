<?php

namespace Page;

class Chart extends SimpleHTML {
    private $id;
    public function __construct($element) {
        parent::__construct("div", "chart-container", $element);
        
        $this->id = $element->getAttribute('id');
    }
    
    public function text() {
        return "<canvas id='" . $this->id . "'></canvas>";
    }

}
