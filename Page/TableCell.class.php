<?php

namespace Page;

class TableCell extends GeneralContent{
    public function __construct($element) {
        parent::__construct("td", "", $element);
        $this->addAttribute("colspan", $element->getAttribute('colspan'));
        $this->addAttribute("rowspan", $element->getAttribute('rowspan'));
    }
    
    public function text() {
        $p = new Page($this->element());
        
        $html = $p->text(); //as we want only the filling, not a page itself, we use text rather than html
        
        return $html;
    }
}
