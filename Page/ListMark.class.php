<?php

/*
 * ALTERAR A LICENÇA!
 */

namespace Page;

class ListMark extends GeneralContent{
    
    public function __construct($element) {
        parent::__construct("span", "marcador_lista", $element);
    }
    
    public function text() {
        return "&#x25CF;";
    }
}
