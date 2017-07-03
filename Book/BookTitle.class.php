<?php

/*
 * ALTERAR A LICENÇA!
 */

namespace Book;

/**
 * Description of BookTitle
 *
 * @author pizzinatto <pizzinatto22@gmail.com>
 */
class BookTitle {
    
    public $text = "";
    
    /**
     * 
     * @param \DOMElement $e
     */
    public function __construct($e) {
        $this->text = $e->nodeValue;
    }
}
