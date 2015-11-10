<?php

class EventosModel{
    
    public static function CadastraEvento(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::EVENTO_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function PesquisaEventos(){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::EVENTO_TABELA);
        return $pesquisa->getResult();
    }
    
}