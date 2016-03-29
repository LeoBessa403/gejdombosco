<?php

class BibliotecaModel{
    
    public static function CadastraLivro(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::LIVRO_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function CadastraCodigoLivro(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(Constantes::CODIGO_LIVRO_TABELA, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function PesquisaLivros(){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::LIVRO_TABELA);
        return $pesquisa->getResult();
    }
    
    public static function PesquisaLivrosDisponiveis(){
        $tabela = Constantes::LIVRO_TABELA." liv"
              . " inner join ".Constantes::CODIGO_LIVRO_TABELA." cod"
              . " on liv.".Constantes::LIVRO_CHAVE_PRIMARIA." = cod.".Constantes::LIVRO_CHAVE_PRIMARIA
              . " left join ".Constantes::EMPRESTIMO_TABELA." emp"
              . " on cod.co_codigo_livro = emp.co_codigo_livro";
        
        $campos = "liv.".Constantes::LIVRO_CHAVE_PRIMARIA.", cod.ds_codigo_livro, emp.st_situacao, cod.co_codigo_livro";
        
        $where = 'where cod.st_status = "U"';     
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,$where,null,$campos);
        return $pesquisa->getResult();
    }
    
    public static function PesquisaCodigoLivro($codigo){
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula(array("ds_codigo_livro" => $codigo));
        $pesquisa->Pesquisar(Constantes::CODIGO_LIVRO_TABELA,$where);
        return $pesquisa->getResult();
    }
    
    public static function PesquisaCodigosLivro($livro){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::CODIGO_LIVRO_TABELA,"where ".Constantes::LIVRO_CHAVE_PRIMARIA." = :livro", "livro={$livro}");
        return $pesquisa->getResult();
    }
    
    public static function PesquisaUmLivro($livro){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(Constantes::LIVRO_TABELA,"where ".Constantes::LIVRO_CHAVE_PRIMARIA." = :livro", "livro={$livro}");
        return $pesquisa->getResult();
    }
    
     public static function DeletaBiblioteca($livro){
         // VALIDAR SE O LIVRO JA FOI EMPRESTADO E SE ESTA EM EMPRÉSTIMO
        $img = self::PesquisaUmLivro($livro);
        if($img[0]["ds_foto_capa"]):
            if(is_file("../../".PASTAUPLOADS.$img[0]["ds_foto_capa"])):
                unlink("../../".PASTAUPLOADS.$img[0]["ds_foto_capa"]);
            endif;
        endif;
        $deleta = new Deleta();
        $deleta->Deletar(Constantes::CODIGO_LIVRO_TABELA, "where ".Constantes::LIVRO_CHAVE_PRIMARIA." = :livro", "livro={$livro}");
        $deleta->Deletar(Constantes::LIVRO_TABELA, "where ".Constantes::LIVRO_CHAVE_PRIMARIA." = :livro", "livro={$livro}");
        return $deleta->getResult();
    }
    
    public static function AtualizaLivro(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(Constantes::LIVRO_TABELA, $dados, "where ".Constantes::LIVRO_CHAVE_PRIMARIA." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
}