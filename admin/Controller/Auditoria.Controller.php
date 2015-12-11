<?php
          
class Auditoria{
    
    public $result;
      
    
    function ListarAuditoria()
    {     
        $this->result = AuditoriaModel::PesquisaAuditoria();
    }
    
    function DetalharAuditoria()
    {     
        $id = UrlAmigavel::PegaParametro("aud");
        $this->result = AuditoriaModel::PesquisaUmaAuditoria($id);
        $this->result = $this->result[0];
    }
    
    
    
}
?>
   