<?php

namespace Page;

class TableHeader extends GeneralContent {

    public function __construct($element) {
        parent::__construct("thead", "", $element);
    }

    public function text() {
        $html = "";

        $e = $this->element();

        foreach ($e->childNodes as $child) {
            switch ($child->localName) {
                case "linha" :
                    $html .= (new TableLine($child))->html();
                    break;
            }
        }

        return $html;
    }

}
