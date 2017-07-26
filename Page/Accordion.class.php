<?php

namespace Page;

class Accordion extends SimpleHTML{
    public function __construct($element) {
        parent::__construct("div", "accordion", $element);
    }
    
    public function text() {
        //TODO remover e colocar no XML
        return '<div class="item">
                <div class="title">
                    <p class="number">01.</p>
                    <p class="sign"></p>
                    <button>Capa</button>
                </div>
                
                <div class="panel">
                    <p></p>
                </div>
            </div>

            <div class="item">
                <div class="arrow"></div>
                
                <div class="title">
                    <p class="number">02.</p>
                    <p class="sign"></p>
                    <button>Contracapa</button>
                </div>
                
                <div class="panel">
                    <p>(deve conter a ficha catalográfica e a Equipe de Planejadores)</p>
                </div>
            </div>

            <div class="item">
                <div class="arrow"></div>
                
                <div class="title">
                    <p class="number">03.</p>
                    <p class="sign"></p>
                    <button>Agradecimentos</button> 
                </div>
                
                <div class="panel">
                    <p></p>
                </div>
            </div>
            
            <div class="item">
                <div class="arrow"></div>
                
                <div class="title">
                    <p class="number">04.</p>
                    <p class="sign"></p>
                    <button>Apresentação</button>
                </div>
                <div class="panel">
                    <p>(apresentação geral da estrutura do DRPE, algumas considerações sobre o processo de diagnóstico e outras observações pertinentes)</p>
                </div>
            </div>

            <div class="item">
                <div class="arrow"></div>
                
                <div class="title">
                    <p class="number">05.</p>
                    <p class="sign"></p>
                    <button>Índice Geral do Relatório</button>
                </div>
                <div class="panel">
                    <p></p>
                </div>
            </div>
            
            <div class="item">
                <div class="arrow"></div>
                
                <div class="title">
                    <p class="number">06.</p>
                    <p class="sign"></p>
                    <button>Índice de Tabelas, Quadros, Figuras e Mapas</button>
                </div>
                <div class="panel">
                    <p></p>
                </div>
            </div>
            
            <div class="item">
                <div class="arrow"></div>
                
                <div class="title">
                    <p class="number">07.</p>
                    <p class="sign"></p>
                    <button>Introdução</button>
                </div>
                <div class="panel">
                    <p>(síntese do DRPE de 1 a 2 páginas)</p>
                </div>
            </div>
            
            <div class="item">
                <div class="arrow"></div>
                
                <div class="title">
                    <p class="number">08.</p>
                    <p class="sign"></p>
                    <button>O município</button>
                </div>
                <div class="panel">
                    <p>(informações gerais sobre o município onde se localiza a coletividade)</p>
                </div>
            </div>
            
            <div class="item">
                <div class="arrow"></div>
                
                <div class="title">
                    <p class="number">09.</p>
                    <p class="sign"></p>
                    <button>Diagnóstico Rápido Participativo Emancipador </button>
                </div>
                <div class="panel">
                    <p>(apresentação dos resultados)</p>
                    <ul>
                        <li>Caracterização Social da Coletividade (informações sobre as características da coletividade)</li>
                        <li>Infraestrutura Social</li>
                        <li>Educação</li>
                        <li>Saúde</li>
                        <li>Moradia</li>
                        <li>Atores Sociais Presentes no Âmbito da Coletividade</li>
                        <li>Organização Associativista</li>
                        <li>Organização Territorial</li>
                        <li>Organização do Trabalho</li>
                        <li>Caracterização Cultural.</li>
                    </ul>
                </div>
            </div>
            
            <div class="item">
                <div class="arrow"></div>
                <div class="title">
                    <p class="number">10.</p>
                    <p class="sign"></p>
                    <button>Considerações Finais</button>
                </div>
                <div class="panel">
                    <p></p>
                </div>
            </div>
            
            <div class="item">
                <div class="arrow"></div>
                <div class="title">
                    <p class="number">11.</p>
                    <p class="sign"></p>
                    <button>Referências</button>
                </div>
                <div class="panel">
                    <p></p>
                </div>
            </div>
            
            <div class="item">
                <div class="arrow"></div>
                
                <div class="title">
                    <p class="number">12.</p>
                    <p class="sign"></p>
                    <button>Apêndices e Anexos</button>
                </div>
                <div class="panel">
                    <p>(alguns documentos são relevantes para acompanhar o relatório)</p>
                </div>
            </div>';
    }

}
