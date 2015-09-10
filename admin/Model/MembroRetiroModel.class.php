<?php

class CadastroRetiroModel{
    
    public static function CadastraDados(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::MEMBRO_RETIRO_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function PesquisaMembroJaCadastrado($dados){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::MEMBRO_RETIRO_TABELA,"where no_membro = :nome and dt_nascimento = :nascimento","nome={$dados['no_membro']}&nascimento={$dados['dt_nascimento']}");
        return $pesquisa->getResult();
    }
    
//    public static function AtualizaDados(array $dados,$id){
//        $atualiza = new Atualiza();
//        $atualiza->Atualizar(Constantes::DADOS_TABELA, $dados, "where ".Constantes::DADOS_CHAVE_PRIMARIA." = :id", "id={$id}");
//        return $atualiza->getResult();
//    }
    
    
}