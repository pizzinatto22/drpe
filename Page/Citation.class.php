<?php

namespace Page;

class Citation extends SimpleHTML{
    public function __construct($element) {
        parent::__construct("p", "citacao", $element);
    }

}
