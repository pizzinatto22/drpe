<?php

namespace Page;

class Paragraph extends GeneralContent {

    public function __construct($element) {
        parent::__construct("p", "paragrafo", $element);
    }

    public function text() {
        $html = "";

        $e = $this->element();

        foreach ($e->childNodes as $child) {
            $v = $child->nodeValue;

            switch ($child->localName) {
                case "abrirpopup" :
                    $html .= (new OpenPopup($child))->html();
                    break;
                
                case "quebralinha":
                    $html .= (new BreakRow($child))->html();
                    break;

                case "link":
                    $html .= (new Link($child))->html();
                    break;

                case "italico":
                    $html .= (new Italic($child))->html();
                    break;
                
                case "marcadorlista":
                    $html .= (new ListMark($child))->html();
                    break;
                
                case "negrito":
                    $html .= (new Bold($child))->html();
                    break;
                
                case "superescrito":
                    $html .= (new Superscript($child))->html();
                    break;
                
                case "textodestaque":
                    $html .= (new Text($child))->html();
                    break;


                case "texto":
                    $html .= $this->nobr($v);
                    break;
            }
        }

        return $html;
    }

}
