<?php
namespace Page;

class PageNumber extends SimpleHTML {
    private $id = null;

    public function __construct($element) {
        parent::__construct("span", "numero_pagina", $element);
        $this->id = $element->nodeValue;    
    }

    function id() {
        return $this->id;
    }
}