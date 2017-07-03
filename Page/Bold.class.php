<?php

namespace Page;

class Bold extends SimpleHTML{
    public function __construct($element) {
        parent::__construct("span", "negrito", $element);
    }

}
