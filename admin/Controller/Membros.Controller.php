<?php
          
class Membros{
    
    public $result;
    public $resultAlt;
    public $form;
            
    function Index(){
    }
    
    function ListarMembros()
    {     
        $this->result = MembrosModel::PesquisaMembros();
    }
        
    
}
?>
   