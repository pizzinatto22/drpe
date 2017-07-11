<?php

namespace Page;

class ItemList extends SimpleHTML {

    public function __construct($element) {
        parent::__construct("li", "itemlista", $element);
    }
    
    public function text() {
        $p = new Paragraph($this->element());
        return $p->text();
    }

}
