<?php

namespace Page;

class Text extends SimpleHTML{
    public function __construct($element) {
        parent::__construct("span", "", $element);
    }

}
