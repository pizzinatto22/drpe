<?php

namespace Page;

abstract class GeneralContent {
    /**
     * Nome da tag HTML utilizada para gerar o output desse elemento. Por exemplo "div" vai gerar <img></div>
     * @var string
     */
    private $tag;

    /**
     * Indica se a tag possui tag de fechamento. <img>, <br>, <hr>, etc, devem ser alterados para false
     * @var boolean
     */
    private $useClosingTag;

    /**
     * O elemento do XML que representa este conteúdo. 
     * @var DOMElement
     */
    private $element;

    /**
     * Array associativo com as propriedades que vão compor a tag
     * @var array
     */
    private $attributes = array();


    public function __construct($tag, $class, $element, $useClosingTag = true) {
        $style = $element->getAttribute('estilo');
        
        $this->tag = $tag;
        $this->attributes["class"] = "$class $style";
        $this->e = $element;
        $this->useClosingTag = $useClosingTag;
    }

    public function element() {
        return $this->e;
    }

    public function addAttribute ($key, $value) {
        $this->attributes[$key] = $value;
    }
    
    public function getAttribute($key) {
        if (isset($this->attributes[$key]))
            return $this->attributes[$key];
        else
            return null;
    }
    
    abstract public function text();

    public function html() {
        $text = $this->text(); //this first, because it can proccess new attributes

        $attributes = "";
        foreach ($this->attributes as $k => $v) 
                $attributes .= "$k='$v' ";

        $tag = $this->tag;
        return "<$tag $attributes>$text" .($this->useClosingTag ? "</$tag>" : "");
    }
    
    public function nobr($text) {
        $regex ="/(\b|[áéíóúâêîôûãõç])(\w|[áéíóúâêîôûãõç])+[-](\w|[áéíóúâêîôûãõç])+([-](\w|[áéíóúâêîôûãõç])+)*\b/i";
        return preg_replace($regex, "<span class='nobr'>$0</span>", $text);
    }
}