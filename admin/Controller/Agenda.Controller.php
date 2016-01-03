<?php
          
class Agenda{
    
    public $result;
    public $resultAlt;
    public $form;
            
    
    
    function Calendario(){ 
        $id = "pesquisaMembrosRetiro";
         
        $formulario = new Form($id, "admin/Membros/ListarMembrosRetiro", "Pesquisa", 12);
        
        $formulario
            ->setId("no_membro")
            ->setIcon("clip-user-6")
            ->setLabel("Nome do Membro")
            ->setInfo("Pode ser Parte do nome")    
            ->CriaInpunt();
            
        $opticoes = array(
            ""  => "Todos",
            "S" => "Sim",
            "N" => "Não"
        );
        
        $formulario
            ->setId("ds_membro_ativo")
            ->setLabel("Membro GEJ?")    
            ->setType("select")
            ->setOptions($opticoes) 
            ->CriaInpunt();
        
        $opticoes = array(
            ""  => "Todos",
            "S" => "Sim",
            "N" => "Não"
        );
        
        $formulario
            ->setLabel("Pago?")
            ->setId("st_pagamento")
            ->setType("select")
            ->setOptions($opticoes) 
            ->CriaInpunt();
        
      
        $this->result = $formulario->finalizaFormPesquisaAvancada(); 
    }
    
}
?>
   