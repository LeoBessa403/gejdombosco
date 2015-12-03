<?php

class MembrosModel{
    
    public static function CadastraMembros(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::MEMBRO_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function PesquisaMembros(array $dados){
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($dados);
        $pesquisa->Pesquisar(Constantes::MEMBRO_TABELA,$where);
        return $pesquisa->getResult();
    }
    
    public static function AtualizaMembros(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(Constantes::MEMBRO_TABELA, $dados, "where ".Constantes::MEMBRO_CHAVE_PRIMARIA." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    public static function PesquisaUmMembro($idMembro){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::MEMBRO_TABELA,"where ".Constantes::MEMBRO_CHAVE_PRIMARIA." = :id","id={$idMembro}");
        return $pesquisa->getResult()[0];
    }
    
    public static function DeletaMembros($co_membro){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::MEMBRO_TABELA, "where ".Constantes::MEMBRO_CHAVE_PRIMARIA." = :membro", "membro={$co_membro}");
        return $deleta->getResult();
    }
    
}