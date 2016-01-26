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
                . " on taf.".Constantes::USUARIO_CHAVE_PRIMARIA." = usu.".Constantes::USUARIO_CHAVE_PRIMARIA
                . " inner join ".Constantes::EVENTO_TABELA." eve"
                . " on taf.".Constantes::EVENTO_CHAVE_PRIMARIA." = eve.".Constantes::EVENTO_CHAVE_PRIMARIA
                . " inner join ".Constantes::PERFIL_TABELA." per"
                . " on per.".Constantes::PERFIL_CHAVE_PRIMARIA." = taf.".Constantes::PERFIL_CHAVE_PRIMARIA;
        
         $campos = "taf.*,usu.co_usuario,usu.no_usuario,eve.co_evento,eve.no_evento,per.no_perfil";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where ".Constantes::TAREFA_CHAVE_PRIMARIA." = :tarefa", "tarefa={$co_tarefa}", $campos);
        return $pesquisa->getResult();
    }
    
    public static function PesquisaTarefaDetalhada(){
        $tabela = Constantes::TAREFA_TABELA." taf"
                . " inner join ".Constantes::EVENTO_TABELA." eve"
                . " on taf.".Constantes::EVENTO_CHAVE_PRIMARIA." = eve.".Constantes::EVENTO_CHAVE_PRIMARIA;
        
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where st_status in('N','A') order by st_prioridade ASC");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaTarefa($dados){
        $tabela = Constantes::TAREFA_TABELA." taf"
                . " inner join ".Constantes::EVENTO_TABELA." eve"
                . " on taf.".Constantes::EVENTO_CHAVE_PRIMARIA." = eve.".Constantes::EVENTO_CHAVE_PRIMARIA;
        
        
        $pesquisa = new Pesquisa();
        
         if(empty($dados)):
            $where = "";
        else:
            $where = $pesquisa->getClausula($dados);
        endif;
        
        $pesquisa->Pesquisar($tabela,$where." order by st_prioridade ASC");
        return $pesquisa->getResult();
    }
    
    public static function DeletaTarefa($co_tarefa){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::TAREFA_TABELA, "where ".Constantes::TAREFA_CHAVE_PRIMARIA." = :tarefa", "tarefa={$co_tarefa}");
        return $deleta->getResult();
    }
}