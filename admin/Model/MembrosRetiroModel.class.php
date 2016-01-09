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
        $pesquisa->Pesquisar(Constantes::MEMBRO_RETIRO_TABELA,"where ".Constantes::MEMBRO_EVENTO_CHAVE_PRIMARIA." = :codigo","codigo={$co_membro}");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaMembros(array $dados){
         $tabela = Constantes::MEMBRO_RETIRO_TABELA." memret"
                . " inner join ".Constantes::EVENTO_TABELA." eve"
                . " on memret.".Constantes::EVENTO_CHAVE_PRIMARIA." = eve.".Constantes::EVENTO_CHAVE_PRIMARIA;
        
        
        $campos = "eve.no_evento, memret.no_membro, memret.ds_membro_ativo , memret.co_membro_retiro, memret.dt_nascimento, memret.nu_tel1, "
                . "memret.nu_cpf, memret.nu_rg, memret.st_pagamento, memret.nu_camisa, memret.nu_tel_responsavel, memret.no_responsavel";
            
        $pesquisa = new Pesquisa();
        if(empty($dados)):
            $where = "where eve.".Constantes::EVENTO_CHAVE_PRIMARIA." = 3";
        else:
            $where = $pesquisa->getClausula($dados);
        endif;
        $pesquisa->Pesquisar($tabela,$where." order by memret.dt_cadastro ASC", null,$campos);
        return $pesquisa->getResult();
    }
    
    public static function DeletaMembrosRetiro($co_membro){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::MEMBRO_RETIRO_TABELA, "where ".Constantes::MEMBRO_RETIRO_CHAVE_PRIMARIA." = :membro", "membro={$co_membro}");
        return $deleta->getResult();
    }
    
    
}