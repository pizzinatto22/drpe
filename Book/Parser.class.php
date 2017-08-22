<?php

namespace Book;

use DOMDocument;
use Book\BookTitle;

class Parser {
    
    /**
     * @var array
     */
    private $pages = [];
    
    /**
     *
     * @var IndexMaker
     */
    public $indexMaker = null;
    
    /**
     *
     * @var \Book\BookTitle
     */
    private $title = null;
    
    public function __construct($fileName, $activePage) {
        $this->indexMaker = new IndexMaker();
        
        $xml = new DOMDocument();
        $xml->load($fileName);

        $elements = $xml->documentElement->childNodes;
        
        foreach ($elements as $e)
            switch ($e->localName) {
                case "pagina":
                    $p = new \Page\Page($e, $activePage, $this->indexMaker);
                    $this->pages[] = $p->html();
                    break;
                
                case "titulo":
                    $this->title = new BookTitle($e);
                    break;

            }            
    }
    
    public function all() {
        return implode("\n", $this->pages) . $this->indexMaker->html() . $this->tableModalContainer() . $this->imageModalContainer();
    }
    
    public function title() {
        if ($this->title)
            return $this->title->text;
        
        return "";
    }
    
    private function tableModalContainer() {
        $html  = "<div class='modal' id='POPUP_TABLES'>";
        $html .= "   <div class='modal-content'>";
        $html .= "      <img src='images/increase.png' class='modal-increase' onclick='changeTableSize(+5)'>";
        $html .= "      <img src='images/decrease.png' class='modal-decrease' onclick='changeTableSize(-5)'>";
        $html .= "      <img src='images/close.png' class='modal-close'>";
        $html .= "      <div class='modal-table'></div>";
        $html .= "   </div>";
        $html .= "</div>";
        
        return $html;
    }
    
    private function imageModalContainer() {
        $html  = "<div class='modal' id='POPUP_IMAGES'>";
        $html .= "   <div class='modal-content'>";
        $html .= "      <img src='images/increase.png' class='modal-increase' onclick='changePopupImageSize(+150)'>";
        $html .= "      <img src='images/decrease.png' class='modal-decrease' onclick='changePopupImageSize(-150)'>";
        $html .= "      <img src='images/close.png' class='modal-close'>";
        $html .= "      <img id='modal-image' class='modal-image'>";
        $html .= "   </div>";
        $html .= "</div>";
        
        return $html;
    }

    
    
}
