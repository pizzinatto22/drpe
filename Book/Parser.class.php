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
        
        return implode("\n", $this->pages) . $this->indexMaker->html();
    }
    
    public function title() {
        if ($this->title)
            return $this->title->text;
        
        return "";
    }
    
    
}
