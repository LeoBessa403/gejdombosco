<?php

class AgendaModel{
    
    public static function CadastraAgenda(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::AGENDA_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function CadastraAgendaPerfil(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::AGENDA_PERFIL_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function AtualizaAgenda(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(Constantes::AGENDA_TABELA, $dados, "where ".Constantes::AGENDA_CHAVE_PRIMARIA." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    public static function PesquisaAgendaJaCadastrado($dados){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::AGENDA_TABELA,"where no_agenda = :nome and dt_nascimento = :nascimento","nome={$dados['no_agenda']}&nascimento={$dados['dt_nascimento']}");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaUmaAgenda($co_agenda){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::AGENDA_TABELA,"where ".Constantes::AGENDA_CHAVE_PRIMARIA." = :codigo","codigo={$co_agenda}");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaAgendas(){
         $tabela = Constantes::AGENDA_TABELA." age"
                . " inner join ".Constantes::CATEGORIA_TABELA." cat"
                . " on cat.".Constantes::CATEGORIA_CHAVE_PRIMARIA." = age.".Constantes::CATEGORIA_CHAVE_PRIMARIA;
        
        
//        $campos = "ret.no_retiro, memret.no_agenda, memret.ds_agenda_ativo , memret.co_agenda_retiro, memret.dt_nascimento, memret.nu_tel1, "
//                . "memret.nu_cpf, memret.nu_rg, memret.st_pagamento, memret.nu_camisa, memret.nu_tel_responsavel, memret.no_responsavel";
            
        $pesquisa = new Pesquisa();
//        if(empty($dados)):
//            $where = "where ret.".Constantes::RETIRO_CHAVE_PRIMARIA." = 3";
//        else:
//            $where = $pesquisa->getClausula($dados);
//        endif;
        $pesquisa->Pesquisar($tabela);
        return $pesquisa->getResult();
    }
    
    public static function DeletaAgenda($co_agenda){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::AGENDA_TABELA, "where ".Constantes::AGENDA_CHAVE_PRIMARIA." = :agenda", "agenda={$co_agenda}");
        return $deleta->getResult();
    }
    
    
}