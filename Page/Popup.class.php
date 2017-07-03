<?php

namespace Page;

class Popup extends GeneralContent {
    public function __construct($element) {
        parent::__construct("div", "modal", $element);
        $this->addAttribute("id", $element->getAttribute("id"));
    }

    public function text() {
        //A Page() can process everything inside it, so we use this resource to parse a Popup and use only its text.
        $p = new Page($this->element());
        $html = "<div class='modal-content'>";
        $html .= "<img src='images/close.png' class='modal-close'>";
        $html .= $p->text(); //as we want only the filling, not a page itself, we use text rather than html
        $html .= "</div>";

        return $html;
    }
	
}