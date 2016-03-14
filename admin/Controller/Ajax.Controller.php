<?php
/* 
 * Controller résponsavel para receber e passar dados para controller responsável.
 */
include "../../library/Config.inc.php";

if(isset($_GET['valida'])){    
    
	switch($_GET['valida']){
    
////////////////////////////////////////////////////////////////////////
/////////////////// PARTICULARIDADES DO SISTEMA ////////////////////////
//////////////////////////////////////////////////////////////////////// 
  
        case 'pesquisa_tarefa': 
            $id =  $_GET['co_tarefa'];    
            $agenda = AgendaModel::PesquisaUmaAgenda($id);
            $perfis = AgendaModel::PesquisaPerfilAgenda($id);
            $agenda = $agenda[0];      
            $agenda['perfis'] = $perfis;
            $dt_ini = explode(" ", $agenda['dt_inicio']);
            $agenda['dt_inicio'] = implode("/",array_reverse(explode("-", $dt_ini[0]))) ;
            $dt_ini = explode(":", $dt_ini[1]);
            $agenda['hr_inicio'] = $dt_ini[0].":".$dt_ini[1];
            
            if($agenda['dt_fim']):
                $dt_fim = explode(" ", $agenda['dt_fim']);
                $agenda['dt_fim'] = implode("/",array_reverse(explode("-", $dt_fim[0]))) ;
                $dt_fim = explode(":", $dt_fim[1]);
                $agenda['hr_fim'] = $dt_fim[0].":".$dt_fim[1];
            else:
                $agenda['dt_fim'] = null;
                $agenda['hr_fim'] = null;
            endif;
            
            echo json_encode($agenda);
        break;
        
        case 'capa_livro': 
            $id =  $_GET['id'];    
            $livro = BibliotecaModel::PesquisaUmLivro($id);
            $capa  = $livro[0];      
            echo json_encode($capa);
        break;
    
    
    
            
}} // FIM SWITCH