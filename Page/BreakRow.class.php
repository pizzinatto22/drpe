<?php

namespace Page;

class BreakRow extends GeneralContent {
    public function __construct($element) {
        parent::__construct("br", "quebralinha", $element, false);
    }

    public function text() {
        return "";
    }
}