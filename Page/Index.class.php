<?php

namespace Page;

class Index extends SimpleHTML {
    /** @var Page\PageNumber Numero da página associada ao indice em questão **/
    public $pageNumber;
    public $level;
    public $description;
    
    public function __construct($element, $pageNumber) {
        parent::__construct("a", "anchora", $element);
        
        if ($element->hasAttribute("nivel"))
            $this->level = $element->getAttribute("nivel");
        
        $this->description = $element->nodeValue;
        $this->pageNumber = $pageNumber;
        $text = preg_replace("/[^A-Za-z0-9]/","", $element->nodeValue);
        $this->addAttribute("id", "ancora_" . $text);
    }
    
    public function text() {
        return "&nbsp;";
    }
}
