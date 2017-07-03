<?php

namespace Page;

class TableCell extends GeneralContent{
    public function __construct($element) {
        parent::__construct("td", "", $element);
    }
    
    public function text() {
        $p = new Page($this->element());
        
        $html = $p->text(); //as we want only the filling, not a page itself, we use text rather than html
        
        return $html;
    }
}
