<?php

class MembrosModel{
    
    public static function CadastraMembros(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::MEMBRO_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function PesquisaMembros(){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::MEMBRO_TABELA);
        return $pesquisa->getResult();
    }
    
}