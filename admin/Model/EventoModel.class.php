<?php

class EventoModel{
    
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
    
     public static function DeletaEvento($co_evento){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::EVENTO_TABELA, "where ".Constantes::EVENTO_CHAVE_PRIMARIA." = :evento", "evento={$co_evento}");
        return $deleta->getResult();
    }
    
}