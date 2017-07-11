<?php

namespace Page;

class OrderedList extends GeneralContent {

    public function __construct($element) {
        parent::__construct("ol", "listaordenada", $element);
    }

    public function text() {
        $html = "";

        $e = $this->element();

        foreach ($e->childNodes as $child) {
            $v = $child->nodeValue;

            switch ($child->localName) {
                case "item" :
                    $item = new ItemList($child);
                    $html .= $item->html();
                    break;
            }
        }

        return $html;
    }

}
