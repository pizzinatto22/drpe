<?php

namespace Page;

class Table extends GeneralContent {
    
    private static $count = 0;
    
    private $id;

    public function __construct($element) {
        parent::__construct("div", "tabela_container", $element);
        $this->id = ++self::$count;
        
        $this->addAttribute("id", "tabela_container_" . $this->id);
    }

    public function text() {
        $id = $this->id;
        
        $html  = "<div class='controls'>";
        $html .= "<img id='table_control_img_$id' src='images/expand.png' onclick='toggleTable($id)')>";
        $html .= "</div>";
        
        $html .= "<div class='tabela'>";
        $html .= "<table id='table_$id'>";

        $e = $this->element();

        foreach ($e->childNodes as $child) {
            switch ($child->localName) {
                case "cabecalho" :
                    $html .= (new TableHeader($child))->html();
                    break;
                
                case "corpo" :
                    $html .= (new TableBody($child))->html();
                    break;
            }
        }
        
        $html .= "</table>";
        $html .= "</div>"; //class=tabela

        return $html;
    }

}
