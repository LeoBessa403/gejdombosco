<?php
          
class Funcionalidade{
    
    public $result;
    public $resultAlt;
    public $form;
            
    
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
        
    
}
?>
   