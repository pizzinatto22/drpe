<?php

namespace Page;

class Citation2 extends SimpleHTML{
    public function __construct($element) {
        parent::__construct("p", "citacao", $element);
    }
    
    public function text() {
        $p = new Paragraph($this->element());
        return $p->text();
    }

}
