<?php
          
class Biblioteca{
    
    public $result;
    public $resultAlt;
    public $form;
    
    function ListarLivroPesquisaAvancada(){
        
        $id = "pesquisaBiblioteca";
         
        $formulario = new Form($id, "admin/Biblioteca/ListarLivro", "Pesquisa", 12);
            
        $label_options = array("" => "Todas", "1" => "URGENTE", "2" => "ALTA", "3" => "MÉDIA", "4" => "BAIXA");
        $formulario
            ->setLabel("Prioridade")
            ->setId("st_prioridade")
            ->setType("select")
            ->setOptions($label_options)
            ->CriaInpunt(); 

        $label_options = array("" => "Todos", "N" => "NÃO INICIADA", "A" => "EM ANDAMENTO", "C" => "CONCLUIDA", "I" => "INATIVA");
        $formulario
            ->setLabel("Status da Biblioteca")
            ->setId("st_status")
            ->setType("select")
            ->setOptions($label_options)
            ->CriaInpunt(); 
        
        $formulario
            ->setId("co_evento")
            ->setType("select")
            ->setLabel("Evento")
            ->setAutocomplete(Constantes::EVENTO_TABELA, "no_evento",Constantes::EVENTO_CHAVE_PRIMARIA)
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
    }
    
        
    function CadastroLivro(){
        
        $id = "cadastroLivro";
         
        if(!empty($_POST[$id])):
            $session = new Session();  
            $upload = new Upload();
            $dados = $_POST; 
            $quantidade                  = $_POST['quantidade'];
            unset($dados[$id],$dados['quantidade']); 
                    
            $fotoCapa = $_FILES['ds_foto_capa'];
            if($fotoCapa["name"]):
                $capa = $upload->UploadImagens($fotoCapa, Valida::ValNome($dados['no_titulo']),"Biblioteca");
                $dados['ds_foto_capa'] = $capa[0];
            endif;
            
            if(!empty($_POST['co_livro'])):
                
                ///  DELETAR A IMAGEM ANTIGA CASO TENHA 
                
                
                $coLivro = BibliotecaModel::AtualizaLivro($dados, $_POST['co_livro']);
                if($coLivro):
                    $session->setSession(ATUALIZADO, "OK");
                endif;
            else:    
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
        if($co_livro):
            $res = BibliotecaModel::PesquisaUmaBiblioteca($co_livro);
            $res = $res[0];
        endif;
        
        $formulario = new Form($id, "admin/Biblioteca/CadastroLivro");
        $formulario->setValor($res);
        
        $formulario
            ->setId("no_titulo")
            ->setClasses("ob")    
            ->setLabel("Título")
            ->CriaInpunt();
          
        $formulario
            ->setId("no_editora")
            ->setLabel("Editora")
            ->CriaInpunt();
          
        $formulario
            ->setId("no_autor")
            ->setLabel("Autor")
            ->CriaInpunt();
          
        $formulario
            ->setId("quantidade")
            ->setValor(1)    
            ->setClasses("numero")    
            ->setTamanhoInput(3)    
            ->setLabel("Qts. Unidades")
            ->CriaInpunt();
        
        $formulario
            ->setId("nu_ano_publicacao")
            ->setClasses("numero")    
            ->setTamanhoInput(3)    
            ->setLabel("Ano da Publicação")
            ->CriaInpunt();
        
        $formulario
            ->setId("nu_paginas")
            ->setClasses("numero")   
            ->setTamanhoInput(3)       
            ->setLabel("Nº de Páginas")
            ->CriaInpunt();
          
        $formulario
            ->setId("nu_edicao")    
            ->setTamanhoInput(3)    
            ->setLabel("Nº da Edição")
            ->CriaInpunt();
          
        $formulario
            ->setId("nu_isbn")  
            ->setLabel("ISBN")
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
   