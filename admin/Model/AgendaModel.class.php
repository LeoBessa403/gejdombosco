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
         $tabela = Constantes::AGENDA_TABELA." age"
                . " inner join ".Constantes::CATEGORIA_TABELA." cat"
                . " on cat.".Constantes::CATEGORIA_CHAVE_PRIMARIA." = age.".Constantes::CATEGORIA_CHAVE_PRIMARIA;
         
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where ".Constantes::AGENDA_CHAVE_PRIMARIA." = :codigo","codigo={$co_agenda}");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaAgendas(){
         $tabela = Constantes::AGENDA_TABELA." age"
                . " inner join ".Constantes::CATEGORIA_TABELA." cat"
                . " on cat.".Constantes::CATEGORIA_CHAVE_PRIMARIA." = age.".Constantes::CATEGORIA_CHAVE_PRIMARIA;
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela);
        return $pesquisa->getResult();
    }
    
    public static function PesquisaCategoriasAgenda(){
        $pesquisa = new Pesquisa();
         $pesquisa->Pesquisar(Constantes::CATEGORIA_TABELA,"where ds_tipo = 'agenda'");
        return $pesquisa->getResult();
    }
    
    public static function DeletaAgenda($co_agenda){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::AGENDA_TABELA, "where ".Constantes::AGENDA_CHAVE_PRIMARIA." = :agenda", "agenda={$co_agenda}");
        return $deleta->getResult();
    }
    
    public static function DeletaAgendaPerfil($co_agenda){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::AGENDA_PERFIL_TABELA, "where ".Constantes::AGENDA_CHAVE_PRIMARIA." = :agenda", "agenda={$co_agenda}");
        return $deleta->getResult();
    }
    
    
}