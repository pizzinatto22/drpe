<?php

namespace Page;

class OpenPopup extends SimpleHTML {
    public function __construct($element) {
        parent::__construct("span", "openpopup", $element);

        //extrai o elemento url e já adiciona na tag
        $id = $element->getAttribute("id");
        $this->addAttribute("onclick", "openPopup(\"$id\")");
    }
	
}