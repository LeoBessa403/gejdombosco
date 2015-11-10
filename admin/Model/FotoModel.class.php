<?php

class FotoModel{
    
    public static function CadastraFoto(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::FOTO_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
       
    public static function PesquisaFotosCliente($id){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::FOTO_TABELA,"where ".Constantes::FOTO_CHAVE_PRIMARIA." = :id","id={$id}");
        $result   = $pesquisa->getResult();
        return $result;
    }
    
    public static function DeletaFotosCliente($id){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::FOTO_TABELA, "where ".Constantes::FOTO_CHAVE_PRIMARIA." = :id", "id={$id}");
        return $deleta->getResult();
    }
    
}