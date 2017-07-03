<?php

namespace Page;

class TableLine extends GeneralContent {

    public function __construct($element) {
        parent::__construct("tr", "", $element);
    }

    public function text() {
        $html = "";

        $e = $this->element();

        foreach ($e->childNodes as $child) {
            switch ($child->localName) {
                case "celula" :
                    $html .= (new TableCell($child))->html();
                    break;
            }
        }

        return $html;
    }

}
