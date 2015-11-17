<?php
          
class Auditoria{
    
    public $result;
      
    
    function ListarAuditoria()
    {     
        $this->result = AuditoriaModel::PesquisaAuditoria();
    }
    
}
?>
   