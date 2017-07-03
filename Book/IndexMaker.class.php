<?php

namespace Book;

class IndexMaker {
    
    private $entries = [];
    public $id = "MAIN_INDEX";
    
    /**
     * @param \Page\PageNumber $page
     * @param \Page\Index $entry
     */
    public function add($page, $entry) {
        if (!isset($this->entries[$page->id()]))
            $this->entries[$page->id()] = [];
        
        if (!!isset($this->entries[$page->id()][$entry->level]))
            $this->entries[$page->id()][$entry->level] = [];
        
        $this->entries[$page->id()][$entry->level][] = $entry;
        
    }
    
    public function html() {
        $html  = "<div class='modal' id='$this->id'>";
        $html .= "<div class='modal-content-index'>";
        $html .= "<img src='images/close-white.png' class='modal-close'>";
        
        $html .= "<span class='indice_sumario'>Sumário</span>";
        
        $html .= "<div class='indice_container'>";
        
        $firstLevelOpen = false; 
        
        //$html .= "<div class='indice_colunas_container'>";
        
        foreach ($this->entries as $pageNumber => $page) {
            foreach ($page as $levelNumber => $level) {
                /** @var \Page\Index $entry */
                foreach ($level as $entry) {
                    switch ($levelNumber) {
                        case 1:
                            if ($firstLevelOpen) {
                                $html .= "</div>"; //closing indice_primeiro_nivel_opcoes
                                $html .= "</div>"; //closing indice_coluna
                            }
                            $firstLevelOpen = true;
                            
                            $html .= "<div class='indice_coluna'>";
                            $html .= "<div class='indice_primeiro_nivel_pagina_container'>";
                            $html .= "   <span class='indice_primeiro_nivel_pagina' onclick='gotoPage($pageNumber)'>$entry->description</span>";
                            //$html .= "   <hr class='indice_primeiro_nivel_linha'>";
                            $html .= "</div>";
                            
                            $html .= "<div class='indice_primeiro_nivel_opcoes'>";
                            //$html .= "<span class='indice_primeiro_nivel_descricao' onclick='gotoPage($pageNumber)'>$entry->description ..... $pageNumber</span>";
                            
                            break;

                        default:
                            $html .= "<span class='indice_outro_nivel_descricao' onclick='gotoPage($pageNumber)'>$entry->description</span>";
                            break;
                    }
                }
            }
        }
        
        if ($firstLevelOpen) {
            $html .= "</div>"; //closing indice_primeiro_nivel_opcoes
            $html .= "</div>"; //closing indice_coluna
        }
        
        //$html .= "</div>"; //indice_colunas_container
            
        
        $html .= "</div>"; //indice_container
        $html .= "</div>"; //modal-content-index
        $html .= "</div>"; //modal
        
        return $html;
    }
}
