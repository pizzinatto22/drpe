<?php

namespace Page;

class Youtube extends GeneralContent {
    public function __construct($element) {
            parent::__construct("div", "videoWrapper", $element);
    }

    public function text() {
            $url = $this->element()->getAttribute("url");
            $html ="<iframe src='$url' frameborder='0' allowfullscreen></iframe>";
            return $html;
    }
	
}