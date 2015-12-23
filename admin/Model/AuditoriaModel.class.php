<?php

class AuditoriaModel{
    
    public static function PesquisaAuditoria(){
        
        $tabela = Constantes::AUDITORIA_TABELA." aud"
              . " left join ".TABLE_USER." usu"
              . " on usu.".CAMPO_ID." = aud.".CAMPO_ID;
        
        
        $campos = "aud.dt_realizado, aud.no_tabela, aud.co_auditoria, aud.no_operacao, usu.no_usuario";
                
        $order = ' order by aud.'.Constantes::AUDITORIA_CHAVE_PRIMARIA.' ASC';     
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,$order,null,$campos);
        return $pesquisa->getResult();
    }
    
    public static function PesquisaUmaAuditoria($id){
        
        $tabela = Constantes::AUDITORIA_TABELA." aud"
              . " left join ".TABLE_USER." usu"
              . " on usu.".CAMPO_ID." = aud.".CAMPO_ID;
        
        $order = ' order by aud.dt_realizado DESC';     
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where ".Constantes::AUDITORIA_CHAVE_PRIMARIA." = :id ".$order, "id={$id}");
        return $pesquisa->getResult();
    }
    
}