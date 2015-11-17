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
    
    public static function DeletaMembros($co_membro){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::MEMBRO_TABELA, "where ".Constantes::MEMBRO_CHAVE_PRIMARIA." = :membro", "membro={$co_membro}");
        return $deleta->getResult();
    }
    
}