<?php

class MembrosRetiroModel{
    
        public static function AtualizaMembro(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(Constantes::MEMBRO_RETIRO_TABELA, $dados, "where ".Constantes::MEMBRO_RETIRO_CHAVE_PRIMARIA." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    public static function PesquisaMembroJaCadastrado($dados){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::MEMBRO_RETIRO_TABELA,"where no_membro = :nome and dt_nascimento = :nascimento","nome={$dados['no_membro']}&nascimento={$dados['dt_nascimento']}");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaUmMembro($co_membro){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::MEMBRO_RETIRO_TABELA,"where co_membro = :codigo","codigo={$co_membro}");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaMembros(array $dados){
         $tabela = Constantes::MEMBRO_RETIRO_TABELA." memret"
                . " inner join ".Constantes::RETIRO_TABELA." ret"
                . " on memret.".Constantes::RETIRO_CHAVE_PRIMARIA." = ret.".Constantes::RETIRO_CHAVE_PRIMARIA;
        
        
        $campos = "ret.no_retiro, memret.no_membro, memret.ds_membro_ativo , memret.co_membro_retiro, memret.dt_nascimento, memret.nu_tel1, memret.nu_cpf, memret.nu_rg";
            
        $pesquisa = new Pesquisa();
        if(empty($dados)):
            $where = "where ret.".Constantes::RETIRO_CHAVE_PRIMARIA." = 2";
        else:
            $where = $pesquisa->getClausula($dados);
        endif;
        $pesquisa->Pesquisar($tabela,$where, null,$campos);
        return $pesquisa->getResult();
    }
    
    public static function DeletaMembros($co_membro){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::MEMBRO_RETIRO_TABELA, "where ".Constantes::MEMBRO_RETIRO_CHAVE_PRIMARIA." = :membro", "membro={$co_membro}");
        return $deleta->getResult();
    }
    
    
}