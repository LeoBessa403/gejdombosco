<?php
          
class Index{
    
    public $result;
    public $resultAlt;
    public $form;
    
    function Index(){

    }
    
    function Cadastro(){
       
         $id = "cadastro";
         
           if(!empty($_POST[$id])):
                       
            $dados = $_POST; 
           
//            debug($dados,1);

            unset($dados[$id]); 
                    
            $idMembro = CadastroModel::CadastraDados($dados);

            if($idMembro):
                $this->result = true;
            endif;
                
        endif;  
        
        $formulario = new Form($id, "web/Index/Cadastro");
//       $formulario->setValor($res);
             
        $formulario
            ->setId("no_membro")
            ->setIcon("clip-user-6") 
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
            ->setTamanhoInput(6)
            ->setClasses("tel")
            ->setIcon("fa-mobile fa")    
            ->setLabel("Telefone Ceulular 1")
            ->CriaInpunt();
      
        $formulario
            ->setId("nu_tel2")
            ->setTamanhoInput(6)
            ->setIcon("clip-phone-2")
            ->setClasses("tel")
            ->setLabel("Telefone Ceulular 2")
            ->CriaInpunt();
      
        $formulario
            ->setId("nu_tel3")
            ->setTamanhoInput(6)
            ->setIcon("clip-phone-hang-up")
            ->setClasses("tel")
            ->setLabel("Telefone Residencial")
            ->CriaInpunt();
        
        $formulario
            ->setId("dt_nascimento")
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(6)
            ->setClasses("data")
            ->setLabel("Nascimento")
            ->CriaInpunt();
      
      
        $formulario
            ->setId("no_responsavel")
            ->setLabel("Nome do Respónsavel")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_email")
            ->setIcon("fa-envelope fa")
            ->setClasses("email")
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
            ->setLabel("Como Conheceu o GEJ")
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
   