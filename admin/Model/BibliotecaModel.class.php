<?php

class BibliotecaModel{
    
    public static function CadastraLivro(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::LIVRO_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function PesquisaLivros(){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::LIVRO_TABELA);
        return $pesquisa->getResult();
    }
    
     public static function DeletaLivro($livro){
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::LIVRO_TABELA, "where ".Constantes::LIVRO_CHAVE_PRIMARIA." = :livro", "livro={$livro}");
        return $deleta->getResult();
    }
    
    public static function AtualizaLivro(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(Constantes::LIVRO_TABELA, $dados, "where ".Constantes::LIVRO_CHAVE_PRIMARIA." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
}