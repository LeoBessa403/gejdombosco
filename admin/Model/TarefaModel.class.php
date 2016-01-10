<?php

class TarefaModel{
    
    public static function CadastraTarefa(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::TAREFA_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function CadastraTarefaPerfil(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::TAREFA_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function PesquisaTarefa(){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::TAREFA_TABELA);
        return $pesquisa->getResult();
    }
    
}