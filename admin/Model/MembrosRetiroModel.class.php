<?php

class MembrosModel{
    
        public static function AtualizaMembro(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(Constantes::MEMBRO_TABELA, $dados, "where ".Constantes::MEMBRO_CHAVE_PRIMARIA." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    public static function PesquisaMembroJaCadastrado($dados){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::MEMBRO_TABELA,"where no_membro = :nome and dt_nascimento = :nascimento","nome={$dados['no_membro']}&nascimento={$dados['dt_nascimento']}");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaUmMembro($co_membro){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::MEMBRO_TABELA,"where co_membro = :codigo","codigo={$co_membro}");
        return $pesquisa->getResult();
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