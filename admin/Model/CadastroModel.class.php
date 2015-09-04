<?php

class CadastroModel{
    
    public static function CadastraDados(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::MEMBRO_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
//    public static function AtualizaDados(array $dados,$id){
//        $atualiza = new Atualiza();
//        $atualiza->Atualizar(Constantes::DADOS_TABELA, $dados, "where ".Constantes::DADOS_CHAVE_PRIMARIA." = :id", "id={$id}");
//        return $atualiza->getResult();
//    }
    
    
}