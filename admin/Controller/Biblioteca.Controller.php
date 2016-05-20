<?php
          
class Biblioteca{
    
    public $result;
    public $resultAlt;
    public $livros_disp;
    public $form;
    
    function ListarLivroPesquisaAvancada(){
        
        $id = "pesquisaBiblioteca";
         
        $formulario = new Form($id, "admin/Biblioteca/ListarLivro", "Pesquisa", 12);
            
        $formulario
            ->setId("no_titulo")
            ->setLabel("Título")
            ->CriaInpunt();
          
        $formulario
            ->setId("no_autor")
            ->setLabel("Autor")
            ->CriaInpunt();
        
        echo $formulario->finalizaFormPesquisaAvancada(); 

    }
    
    
    function ListarLivro(){     
        
        $dados = array();
        if(!empty($_POST)):
            $dados = array(
                'no_titulo' => $_POST['no_titulo'],
                'no_autor' => $_POST['no_autor']
            );
        endif;
        
        $this->result = BibliotecaModel::PesquisaLivros($dados);
        
        $livros_disp = BibliotecaModel::PesquisaQuantidadeLivroDisponivel();
        foreach ($livros_disp as $livro):
            $this->livros_disp[$livro['co_livro']] = $livro['disponiveis'];
        endforeach; 
    }
    
    function GerenciarLivro(){     
        
        
       $co_livro = UrlAmigavel::PegaParametro("liv");
       
       
       debug($co_livro);
    }
    
        
    function CadastroLivro(){
        
        $id = "cadastroLivro";
         
        if(!empty($_POST[$id])):
            $session = new Session();  
            $upload = new Upload();
            $dados = $_POST; 
            unset($dados[$id]); 
                    
            $fotoCapa = $_FILES['ds_foto_capa'];
            if($fotoCapa["name"]):
                $capa = $upload->UploadImagens($fotoCapa, Valida::ValNome($dados['no_titulo']),"Biblioteca");
                $dados['ds_foto_capa'] = $capa[0];
            endif;
            
            if(!empty($_POST['co_livro'])):
                $img = BibliotecaModel::PesquisaUmLivro($_POST['co_livro']);
                if($img[0]["ds_foto_capa"]):
                    if(is_file(Upload::$BaseDir.$img[0]["ds_foto_capa"])):
                        unlink(Upload::$BaseDir.$img[0]["ds_foto_capa"]);
                    endif;
                endif;
            
                $coLivro = BibliotecaModel::AtualizaLivro($dados, $_POST['co_livro']);
                if($coLivro):
                    $session->setSession(ATUALIZADO, "OK");
                endif;
            else:    
                $quantidade                = $_POST['quantidade'];
                unset($dados['quantidade']); 
                $dados['dt_cadastro']      = Valida::DataAtualBanco();
                $coLivro = BibliotecaModel::CadastraLivro($dados);
                if($coLivro):
                    $i = false;
                    while($i == false):
                        $codigo = FuncoesSistema::GeraCodigo();
                        $existe = BibliotecaModel::PesquisaCodigoLivro($codigo);
                        if(empty($existe)):
                            $i = true;
                        endif;
                    endwhile;
                    
                    $newLivro['co_livro'] = $coLivro;
                    for($p=0;$p<$quantidade;$p++):
                        $newLivro['ds_codigo_livro'] = $codigo."-".($p+1);
                        $ok = BibliotecaModel::CadastraCodigoLivro($newLivro);
                    endfor;
                    
                    $session->setSession(CADASTRADO, "OK");
                endif;
            endif;
            $this->ListarLivro();
            UrlAmigavel::$action = "ListarLivro";
        endif;  
        
        $co_livro = UrlAmigavel::PegaParametro("liv");
        $res = array();
        $edit = false;
        $tamanho = 3;
        if($co_livro):
            $res = BibliotecaModel::PesquisaUmLivro($co_livro);
            $res = $res[0];
            $edit = true;
            $tamanho = 4;
        endif;
        $formulario = new Form($id, "admin/Biblioteca/CadastroLivro");
        $formulario->setValor($res);
        
        $formulario
            ->setId("no_titulo")
            ->setClasses("ob")    
            ->setLabel("Título")
            ->CriaInpunt();
        
        $formulario
            ->setId("ds_palavras_chave")
            ->setClasses("ob")
            ->setInfo("Separados por Vírgula. Ex: teste, teste 2")    
            ->setLabel("Palavras Chaves")
            ->CriaInpunt();
          
        $formulario
            ->setId("no_autor")
            ->setClasses("ob nome")
            ->setLabel("Autor")
            ->CriaInpunt();
        
        $formulario
            ->setId("nu_isbn")  
            ->setTamanhoInput(6) 
            ->setLabel("ISBN")
            ->CriaInpunt();
        
        $formulario
            ->setId("no_editora")
            ->setClasses("ob")    
            ->setTamanhoInput(6) 
            ->setLabel("Editora")
            ->CriaInpunt();
          
        if(!$edit):
            $formulario
                ->setId("quantidade")
                ->setClasses("numero")    
                ->setTamanhoInput($tamanho)    
                ->setLabel("Qts. Unidades")
                ->CriaInpunt();
        endif;
        
        $formulario
            ->setId("nu_ano_publicacao")
            ->setClasses("ob numero")    
            ->setTamanhoInput($tamanho)    
            ->setLabel("Ano da Publicação")
            ->CriaInpunt();
        
        $formulario
            ->setId("nu_paginas")
            ->setClasses("numero")   
            ->setTamanhoInput($tamanho)       
            ->setLabel("Nº de Páginas")
            ->CriaInpunt();
          
        $formulario
            ->setId("nu_edicao")    
            ->setTamanhoInput($tamanho)    
            ->setLabel("Nº da Edição")
            ->CriaInpunt();
          
        $formulario
            ->setId("ds_foto_capa")
            ->setLabel("Capa do Livro")
            ->setType("singlefile")
            ->CriaInpunt();
          
        $formulario
            ->setId("ds_observacao")
            ->setType("textarea")
            ->setLabel("Observação")
            ->CriaInpunt();
        
        if($co_livro):
            $formulario
                ->setType("hidden")
                ->setId("co_livro")
                ->setValues($co_livro)
                ->CriaInpunt();
        endif;
      
        $this->form = $formulario->finalizaForm(); 

    }
        
    
}
?>
   