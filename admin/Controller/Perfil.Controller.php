<?php
          
class Perfil{
    
    public $result;
    public $resultAlt;
    public $form;
    public $funcionalidade;
    public $fun_perfil;
    public $perfil;
    public $co_perfil;
            
    
    function ListarPerfil(){     
        $this->result = PerfilModel::PesquisaPerfil();
    }
    
    function FuncionalidadesPerfil(){
        
        $this->co_perfil              = UrlAmigavel::PegaParametro("per");    
        if(!empty($_POST['co_perfil'])):
            unset($_POST['funcionalidades-perfil']);
            $this->co_perfil = $_POST['co_perfil'];
            
            $ok = PerfilModel::DeletaFuncionalidadesPerfil($_POST['co_perfil']);
            if($ok):
                 if(!empty($_POST['funcionalidades'])):
                    $dados['co_perfil'] = $_POST['co_perfil'];
                    foreach ($_POST['funcionalidades'] as $value) {
                        $dados['co_funcionalidade'] = $value;
                        PerfilModel::CadastraFuncionalidadesPerfil($dados);
                    }
                 endif;
            endif;
            
            $this->ListarPerfil();
            UrlAmigavel::$action = "ListarPerfil";
        endif;
           
        $this->fun_perfil       = PerfilModel::PesquisaFuncionalidadesPerfil($this->co_perfil);
        $this->funcionalidade   = FuncionalidadeModel::PesquisaFuncionalidade();
        $this->perfil           = PerfilModel::PesquisaUmPerfil($this->co_perfil);
        
    }
    
        
    function CadastroPerfil(){
        
        $id = "cadastroPerfil";
         
        if(!empty($_POST[$id])):
                       
            $dados = $_POST; 
            unset($dados[$id]); 
            
            $perfil['no_perfil']        = trim($_POST['no_perfil']);
            
            if(!empty($_POST['co_perfil'])):
                $CoTaref = PerfilModel::AtualizaPerfil($perfil, $_POST['co_perfil']);
                if($CoTaref):
                    $this->resultAlt = true;
                endif;
            else:    
                $coPerfil = PerfilModel::CadastraPerfil($perfil);
                if($coPerfil):
                    $this->result = true;
                endif;
            endif;
        endif;  
        
        $co_perfil = UrlAmigavel::PegaParametro("per");
        $res = array();
        if($co_perfil):
            $res = PerfilModel::PesquisaUmPerfil($co_perfil);
            $res = $res[0];
        endif;
        
        $formulario = new Form($id, "admin/Perfil/CadastroPerfil");
        $formulario->setValor($res);
        
        $formulario
            ->setId("no_perfil")
            ->setClasses("ob")    
            ->setLabel("Perfil")
            ->CriaInpunt();
        
        
        if($co_perfil):
            
            $formulario
                ->setType("hidden")
                ->setId("co_perfil")
                ->setValues($co_perfil)
                ->CriaInpunt();
            
        endif;
            
      
        $this->form = $formulario->finalizaForm(); 

    }
        
    
}
?>
   