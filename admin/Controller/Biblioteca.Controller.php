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
                'st_prioridade' => $_POST['st_prioridade'][0],
                'st_status' => $_POST['st_status'][0],
                'taf.co_evento' => $_POST['co_evento'][0]
            );
        endif;
        
        $biblioteca = BibliotecaModel::PesquisaBiblioteca($dados);
        
        $this->result = FuncoesSistema::ValidaBiblioteca($biblioteca);
        
    }
    
        
    function CadastroLivro(){
        
        $id = "cadastroLivro";
         
        if(!empty($_POST[$id])):
             $session = new Session();           
            $dados = $_POST; 
            unset($dados[$id]); 
            
            $biblioteca['ds_titulo']        = trim($dados['ds_titulo']);
            $biblioteca['ds_descricao']     = trim($dados['ds_descricao']);
            $biblioteca['dt_inicio']        = implode("-",array_reverse(explode("/", $dados['dt_inicio'])));
            $biblioteca['dt_fim']           = implode("-",array_reverse(explode("/", $dados['dt_fim'])));
            $biblioteca['co_evento']        = $dados['co_evento'][0];
            $biblioteca['co_perfil']        = $dados['co_perfil'][0];
            $biblioteca['st_prioridade']    = $dados['st_prioridade'][0];
            $biblioteca['co_usuario']       = $user[md5(CAMPO_ID)];
            
            
            if(!empty($_POST['co_biblioteca'])):
                $biblioteca['st_status']        = $dados['st_status'][0];
                if(!empty($dados["dt_conclusao"])):
                    $biblioteca['dt_conclusao']        = implode("-",array_reverse(explode("/", $dados['dt_conclusao'])));
                endif;
                $CoTaref = BibliotecaModel::AtualizaBiblioteca($biblioteca, $_POST['co_biblioteca']);
                if($CoTaref):
                    $session->setSession(ATUALIZADO, "OK");
                endif;
            else:    
                $biblioteca['dt_cadastro']      = Valida::DataAtualBanco();
                $biblioteca['st_status']        = "N";
                $coBiblioteca = BibliotecaModel::CadastraBiblioteca($biblioteca);
                if($coBiblioteca):
                    $session->setSession(CADASTRADO, "OK");
                endif;
            endif;
            $this->ListarBiblioteca();
            UrlAmigavel::$action = "ListarBiblioteca";
        endif;  
        
        $co_biblioteca = UrlAmigavel::PegaParametro("taf");
        $res = array();
        if($co_biblioteca):
            $res = BibliotecaModel::PesquisaUmaBiblioteca($co_biblioteca);
            $res = $res[0];
            $res["dt_inicio"]   = Valida::DataShow($res["dt_inicio"],"d/m/Y"); 
            $res["dt_fim"]      = Valida::DataShow($res["dt_fim"],"d/m/Y"); 
            if(!empty($res["dt_conclusao"])):
                $res["dt_conclusao"] = Valida::DataShow($res["dt_conclusao"],"d/m/Y"); 
            endif;
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
            ->setId("nu_ano_publicacao")
            ->setClasses("numero")    
            ->setTamanhoInput(4)    
            ->setLabel("Ano da Publicação")
            ->CriaInpunt();
        
        $formulario
            ->setId("nu_paginas")
            ->setClasses("numero")   
            ->setTamanhoInput(4)       
            ->setLabel("Nº de Páginas")
            ->CriaInpunt();
          
        $formulario
            ->setId("nu_edicao")
            ->setClasses("numero")      
            ->setTamanhoInput(4)    
            ->setLabel("Nº da Edição")
            ->CriaInpunt();
          
        $formulario
            ->setId("nu_isbn")  
            ->setLabel("ISBN")
            ->CriaInpunt();
          
        $formulario
            ->setId("ds_descricao")
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
   