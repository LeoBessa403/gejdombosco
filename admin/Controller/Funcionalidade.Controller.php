<?php
          
class Funcionalidade{
    
    public $result;
    public $resultAlt;
    public $form;
    public $perfis;
    public $funcionalidade;
    public $perfis_func;
            
    
    function ListarFuncionalidade(){     
        $this->result = FuncionalidadeModel::PesquisaFuncionalidade();
    }
    
        
    function CadastroFuncionalidade(){
        
        $id = "cadastroFuncionalidade";
         
        if(!empty($_POST[$id])):
                       
            $dados = $_POST; 
            unset($dados[$id]); 
            
            $funcionalidade['no_funcionalidade']        = trim($_POST['no_funcionalidade']);
            $funcionalidade['ds_rota']                  = trim($_POST['ds_rota']);
            
            if(!empty($_POST['co_funcionalidade'])):
                $CoTaref = FuncionalidadeModel::AtualizaFuncionalidade($funcionalidade, $_POST['co_funcionalidade']);
                if($CoTaref):
                    $this->resultAlt = true;
                endif;
            else:    
                $coFuncionalidade = FuncionalidadeModel::CadastraFuncionalidade($funcionalidade);
                if($coFuncionalidade):
                    $this->result = true;
                endif;
            endif;
        endif;  
        
        $co_funcionalidade = UrlAmigavel::PegaParametro("fun");
        $res = array();
        if($co_funcionalidade):
            $res = FuncionalidadeModel::PesquisaUmFuncionalidade($co_funcionalidade);
            $res = $res[0];
        endif;
        
        $formulario = new Form($id, "admin/Funcionalidade/CadastroFuncionalidade");
        $formulario->setValor($res);
        
        $formulario
            ->setId("no_funcionalidade")
            ->setClasses("ob")    
            ->setLabel("Funcionalidade")
            ->CriaInpunt();
        
        $formulario
            ->setId("ds_rota")
            ->setClasses("ob")    
            ->setLabel("Rota")
            ->CriaInpunt();
        
        
        if($co_funcionalidade):
            
            $formulario
                ->setType("hidden")
                ->setId("co_funcionalidade")
                ->setValues($co_funcionalidade)
                ->CriaInpunt();
            
        endif;
            
      
        $this->form = $formulario->finalizaForm(); 

    }
    
    function PerfilFuncionalidades(){
        
        $this->co_funcionalidade     = UrlAmigavel::PegaParametro("fun");    
        if(!empty($_POST['co_funcionalidade'])):
            unset($_POST['funcionalidades-perfil']);
            $this->co_funcionalidade = $_POST['co_funcionalidade'];
            
            $ok = PerfilModel::DeletaFuncionalidadesPerfil($_POST['co_funcionalidade']);
            if($ok):
                $dados['co_perfil'] = $_POST['co_perfil'];
                foreach ($_POST['perfis'] as $value) {
                    $dados['co_perfil'] = $value;
                    PerfilModel::CadastraFuncionalidadesPerfil($dados);
                }
            endif;
            
            $this->ListarFuncionalidade();
            UrlAmigavel::$action = "ListarFuncionalidade";
        endif;
           
        $this->perfis_func      = FuncionalidadeModel::PesquisaPerfisFuncionalidade($this->co_funcionalidade);
        $this->perfis           = PerfilModel::PesquisaPerfil();
        $this->funcionalidade   = FuncionalidadeModel::PesquisaUmFuncionalidade($this->co_funcionalidade);
        
    }
        
    
}
?>
   