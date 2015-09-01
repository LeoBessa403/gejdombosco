<?php
          
class Index{
    
    public $result;
    public $resultAlt;
    public $form;
    
    function Index(){

    }
    
    function Cadastro(){
       
         $id = "cadastro";
        
        $formulario = new Form($id, "web/Index/Cadastro");
//       $formulario->setValor($res);
             
        $formulario
            ->setId("no_membro")
            ->setClasses("ob")
            ->setLabel("Nome Completo")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_endereco")
            ->setLabel("Endereço")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_bairro")
            ->setLabel("Bairro")
            ->CriaInpunt();
      
        $formulario
            ->setId("nu_tel1")
            ->setLabel("Telefone Ceulular 1")
            ->CriaInpunt();
      
        $formulario
            ->setId("nu_tel2")
            ->setLabel("Telefone Ceulular 2")
            ->CriaInpunt();
      
        $formulario
            ->setId("nu_tel3")
            ->setClasses("tel")
            ->setLabel("Telefone Residencial")
            ->CriaInpunt();
        
        $formulario
            ->setId("dt_nascimento")
            ->setClasses("data")
            ->setLabel("Nascimento")
            ->CriaInpunt();
      
      
        $formulario
            ->setId("no_responsavel")
            ->setLabel("Nome do Respónsavel")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_email")
            ->setLabel("Email")
            ->CriaInpunt();
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Trabalha?")
                ->setId("st_estuda")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt();   
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Estuda?")
                ->setId("st_estuda")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt();        

      
        $formulario
            ->setType("textarea")
            ->setId("ds_conhecimento")
            ->setLabel("Endereço")
            ->CriaInpunt();
      
        
        $this->form = $formulario->finalizaForm(); 

    }
    
    function Blog(){
        
    }
    
    function Noticia1(){
        
    }
    
    function Noticia2(){
        
    }
    
    function Noticia3(){
        
    }
    
    function Noticia4(){
        
    }
    
    function Noticia5(){
        
    }
    
   
}
?>
   