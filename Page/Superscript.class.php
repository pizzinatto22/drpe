<?php

namespace Page;

class Superscript extends SimpleHTML {
    public function __construct($element) {
        parent::__construct("sup", "", $element);
    }

}
