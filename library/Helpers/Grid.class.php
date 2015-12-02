<?php
/**
 * Grid.class [ HELPER ]
 * Classe responável por gerar as Grid do Sistema!
 * 
 * @copyright (c) 2015, Leo Bessa
 */
class Grid {

    private static $colunas;
    private static $td;
       
    public function setColunasIndeces(Array $colunas) {
        self::$colunas = $colunas;
        return $this;
    }
    
    
    public function setColunas($valor,$QtdBotoes = 0) {
        if($QtdBotoes != 0):
            self::$td .= '<td style="width: '.($QtdBotoes*49).'px">';
        else:
            self::$td .= '<td>';
        endif;
        self::$td .= $valor;
        self::$td .= '</td>';
        return $this;
    }
    
    private function pesquisaAvancada() {
        $apps = new UrlAmigavel::$controller(); 
        $pesquisa = false;
        $exporta = false;
        echo '<div class="row">';
        if( method_exists($apps, UrlAmigavel::$action."PesquisaAvancada") ):
            echo '<div class="modal fade pesquisando" id="pesquisaAvancada" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" style="width: 450px;">
                            <div class="modal-content">
                                <div class="modal-header btn-light-grey" style="width: 100%;">
                                        <h4 class="modal-title">Pesquisa Avançada</h4>
                                </div>
                                <div class="modal-body">';
                                            $action = UrlAmigavel::$action."PesquisaAvancada";
                                            $apps->$action();
                              echo '</div>
                                <div class="modal-footer">
                                </div>
                            </div>
                    </div>
                </div>
            
                    <div class="col-md-12 space10">
                        <a  style="margin-left: 10px;" data-toggle="modal" class="btn btn-primary tooltips pull-right" role="button" href="#pesquisaAvancada" id="pesquisando" data-original-title="Pesquisa Avançada" data-placement="left">
                            <i class="clip-tree"></i>
                        </a>
                        ';
                    $pesquisa = true;
            endif;                    
            if( method_exists($apps,"Exportar".UrlAmigavel::$action) ):    
                    if(!$pesquisa):  
                        echo '<div class="col-md-12 space10">';
                    endif;
             echo  '
                    <a role="button" class="btn btn-success tooltips pull-right" id="excel" 
                       href="'.PASTAADMIN.UrlAmigavel::$controller.'/Exportar'.UrlAmigavel::$action.'/'.Valida::GeraParametro('formato/excel').'" data-original-title="Exportar para Excel" data-placement="left">
                         Excel <i class="clip-file-excel"></i>
                    </a>
                    <a role="button" class="btn btn-bricky tooltips pull-right" id="pdf" style="margin-right: 10px;" 
                       href="'.PASTAADMIN.UrlAmigavel::$controller.'/Exportar'.UrlAmigavel::$action.'/'.Valida::GeraParametro('formato/pdf').'" data-original-title="Exportar para PDF" data-placement="left">
                         PDF <i class="clip-file-pdf"></i>
                    </a>
                    ';  
                $exporta = true;
            endif;     
            if($pesquisa || $exporta):  
                echo '</div>';
            endif;
            echo '</div>';    
    }
    
    
    public function criaLinha($id_linha) {
        echo '<tr id="registro-'.$id_linha.'" class="linha-tabela">';
        echo self::$td;
        echo '</tr>';
        self::$td = "";
        return $this;
    }
    
    
    public function criaGrid() {
        $this->pesquisaAvancada();
        echo '<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                <thead>
                    <tr>';
                    if(is_array(self::$colunas)):
                        foreach (self::$colunas as $value) {
                            echo '<th>'.$value.'</th>';
                        }
                    endif;
                   echo '</tr>
                </thead>
                <tbody>';
    }
    
    public function finalizaGrid() {
        echo '</tbody>
            </table>
        </div>';
    }
        

}
