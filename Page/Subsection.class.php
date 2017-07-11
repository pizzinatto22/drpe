<?php

namespace Page;

class Subsection extends SimpleHTML {

    public function __construct($element) {
        parent::__construct("span", "subsecao", $element);
    }

}
