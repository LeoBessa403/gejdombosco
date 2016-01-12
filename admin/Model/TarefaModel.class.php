<?php

class TarefaModel{
    
    public static function CadastraTarefa(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::TAREFA_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
     public static function AtualizaTarefa(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(Constantes::TAREFA_TABELA, $dados, "where ".Constantes::TAREFA_CHAVE_PRIMARIA." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    public static function CadastraTarefaPerfil(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::TAREFA_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function PesquisaUmaTarefa($co_tarefa){
        $tabela = Constantes::TAREFA_TABELA." taf"
                . " inner join ".Constantes::USUARIO_TABELA." usu"
                . " on taf.".Constantes::USUARIO_CHAVE_PRIMARIA." = usu.".Constantes::USUARIO_CHAVE_PRIMARIA;
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where ".Constantes::TAREFA_CHAVE_PRIMARIA." = :tarefa", "tarefa={$co_tarefa}");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaTarefa(){
        $tabela = Constantes::TAREFA_TABELA." taf"
                . " inner join ".Constantes::EVENTO_TABELA." eve"
                . " on taf.".Constantes::EVENTO_CHAVE_PRIMARIA." = eve.".Constantes::EVENTO_CHAVE_PRIMARIA;
        
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela);
        return $pesquisa->getResult();
    }
    
    public static function DeletaTarefa($co_tarefa){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::TAREFA_TABELA, "where ".Constantes::TAREFA_CHAVE_PRIMARIA." = :tarefa", "tarefa={$co_tarefa}");
        return $deleta->getResult();
    }
}