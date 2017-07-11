<?php
namespace Page;

class Page extends GeneralContent {
    
    const ID_PREFIX = "page_";
            
    private $pageNumber = null;
    private $indexMaker = null;
    private $activePage = 0;
    
    public function __construct($xmlElement, $activePage = 0, $indexMaker = null) {
        parent::__construct("div", "pagina", $xmlElement, true);
        
        $this->indexMaker = $indexMaker;
        $this->activePage = $activePage;
    }
        
    public function text () {     
        $html = "";
        
        $background = $this->element()->getAttribute("imagemfundo");
        
        if ($background != "") {
            $html .= "<div class='pagina_background' style='background-image: url(images/$background);'>";
            $html .= "<div class='espaco'></div>";
        }
        
        
        
        foreach ($this->element()->childNodes as $child) {

            $e = null;
            switch ($child->localName) {
                case "capitulo":
                    $e = new Chapter($child);
                    break;
                
                case "citacao":
                    $e = new Citation($child);
                    break;
                
                case "chamada":
                    $e = new Call($child);
                    break;

                case "imagem":
                    $e = new Image($child);
                    break;
                
                case "indice":
                    if ($this->indexMaker)
                        $this->indexMaker->add($this->pageNumber, new Index($child));
                    break;
                case "lista":
                    $e = new OrderedList($child);
                    break;

                case "numero":
                    $e = new PageNumber($child);
                    $this->pageNumber = $e;
                    $this->addAttribute("id", self::ID_PREFIX . $e->id());
                    break;

                case "paragrafo" :
                    $e = new Paragraph($child);
                    break;

                //be carefull to not have popup inside popup
                case "popup":
                    $e = new Popup($child);
                    break;

                case "secao":
                    $e = new Section($child);
                    break;

                case "subsecao":
                    $e = new Subsection($child);
                    break;
                
                case "subsubsecao":
                    $e = new Subsubsection($child);
                    break;
                
                case "tabela":
                    $e = new Table($child);
                    break;
                    

                case "titulo":
                    $e = new Title($child);
                    break;

                case "youtube":
                    $e = new Youtube($child);
                    break;
            }
            
            if ($e)
                $html .= $e->html();
        }
        
        if ($background != "")
            $html .= "</div>";
        
        $this->processActivePage();
        
        return $html;
    }

    private function processActivePage() {
        $class = $this->getAttribute("class");
        $class = str_replace("inativo", "", $class);
        $class = str_replace("ativo", "", $class);
        
        if ($this->pageNumber && $this->pageNumber->id() == $this->activePage)
            $class .= " ativo";
        else
            $class .= " inativo";
        
        $this->addAttribute("class", $class);
    }

}