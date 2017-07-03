<?php 

namespace Page;

class Title extends SimpleHTML {
    public function __construct($element) {
        parent::__construct("span", "titulo", $element);
    }
}