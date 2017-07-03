<?php

namespace Page;

class Italic extends SimpleHTML {
    public function __construct($element) {
        parent::__construct("span", "italico", $element);
    }

}
