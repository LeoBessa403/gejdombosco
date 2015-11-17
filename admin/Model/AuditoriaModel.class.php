<?php

class AuditoriaModel{
    
    public static function PesquisaAuditoria(){
        
          $tabela = Constantes::AUDITORIA_TABELA." aud"
                . " left join ".TABLE_USER." usu"
                . " on usu.".CAMPO_ID." = aud.".CAMPO_ID;
        
        
        $campos = "aud.dt_realizado, aud.no_tabela, aud.co_auditoria, aud.no_operacao, usu.no_usuario";
                
        $order = ' order by aud.dt_realizado DESC';     
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,$order,null,$campos);
        return $pesquisa->getResult();
    }
    
}