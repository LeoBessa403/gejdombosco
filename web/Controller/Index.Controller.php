<?php
          
class Index{
    
    public $result;
    public $resultAlt;
    public $form;
    
    function Index(){

    }
    
    function CadastroMembro(){
       
        $id = "cadastroMembro";
         
        if(!empty($_POST[$id])):
                       
            $dados = $_POST; 
            $dados['dt_cadastro']   = Valida::DataAtualBanco();
            $dados['dt_nascimento'] = Valida::DataDB($dados['dt_nascimento']." 00:00:00"); 
            $dados['st_trabalha']   = FuncoesSistema::retornoCheckbox((isset($dados['st_trabalha'])) ? $dados['st_trabalha'] : null); 
            $dados['st_estuda']     = FuncoesSistema::retornoCheckbox((isset($dados['st_estuda'])) ? $dados['st_estuda'] : null); 
            $dados['st_batizado']   = FuncoesSistema::retornoCheckbox((isset($dados['st_batizado'])) ? $dados['st_batizado'] : null); 
            $dados['st_eucaristia'] = FuncoesSistema::retornoCheckbox((isset($dados['st_eucaristia'])) ? $dados['st_eucaristia'] : null); 
            $dados['st_crisma']     = FuncoesSistema::retornoCheckbox((isset($dados['st_crisma'])) ? $dados['st_crisma'] : null); 
            $dados['st_status']     = "N"; 
            $dados['no_membro']     = trim($dados['no_membro']);
           
//            debug($dados,1);

            unset($dados[$id]); 
            $pesquisa['dt_nascimento'] = $dados['dt_nascimento'];
            $pesquisa['no_membro']     = $dados['no_membro'];
            
            $membro = CadastroModel::PesquisaMembroJaCadastrado($pesquisa);
            
            if($membro):
                $this->resultAlt = true;
            else:
                $idMembro = CadastroModel::CadastraDados($dados);
                if($idMembro):
                    $this->result = true;
                endif;
            endif;
                    
                
        endif;  
        
        $formulario = new Form($id, "web/Index/CadastroMembro");
             
        $formulario
            ->setId("no_membro")
            ->setIcon("clip-user-6") 
            ->setClasses("ob nome")
            ->setInfo("O Nome deve ser Completo Mínimo de 10 Caracteres")
            ->setLabel("Nome Completo")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_endereco")
            ->setClasses("ob")
            ->setLabel("Endereço")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_bairro")
            ->setLabel("Bairro")
            ->CriaInpunt();
      
        $formulario
            ->setId("nu_tel1")
            ->setTamanhoInput(6)
            ->setClasses("tel ob")
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
            ->setClasses("data ob")
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
                ->setTamanhoInput(6)
                ->setId("st_trabalha")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt();   
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Estuda?")
                ->setTamanhoInput(6)
                ->setId("st_estuda")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt();       
        
          $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Batizado?")
                ->setTamanhoInput(4)
                ->setId("st_batizado")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt(); 
        
          $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Já fiz 1° Comunhão?")
                ->setTamanhoInput(4)
                ->setId("st_eucaristia")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt(); 
        
          $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Crismado?")
                ->setTamanhoInput(4)
                ->setId("st_crisma")
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
    
    function CadastroAbastecimento(){
       
        $id = "CadastroRetiro";
         
        if(!empty($_POST[$id])):
                       
            $dados = $_POST; 
            $dados['dt_cadastro']   = Valida::DataAtualBanco();
            $dados['dt_nascimento'] = Valida::DataDB($dados['dt_nascimento']); 
            $dados['ds_retiro']     = FuncoesSistema::retornoCheckbox((isset($dados['ds_retiro'])) ? $dados['ds_retiro'] : null); 
            $dados['ds_membro_ativo']     = FuncoesSistema::retornoCheckbox((isset($dados['ds_membro_ativo'])) ? $dados['ds_membro_ativo'] : null); 
            $dados['co_retiro']  = 2; 
            $dados['no_membro']     = trim($dados['no_membro']);
            if($dados['ds_membro_ativo'] == "S"):
               $dados['ds_situacao_atual_grupo'] = $dados['ds_situacao_atual_grupo'][0];
            endif;
            unset($dados[$id]);
           
            $pesquisa['dt_nascimento'] = $dados['dt_nascimento'];
            $pesquisa['no_membro']     = $dados['no_membro'];
            
            $membro = CadastroRetiroModel::PesquisaMembroJaCadastrado($pesquisa);
            
            if($membro):
                $this->resultAlt = true;
            else:
                $idMembro = CadastroRetiroModel::CadastraDados($dados);
                if($idMembro):
                    $this->result = true;
                endif;
            endif;
                    
                
        endif;  
        
        $formulario = new Form($id, "web/Index/CadastroAbastecimento");
             
        $formulario
            ->setId("no_membro")
            ->setIcon("clip-user-6") 
            ->setClasses("ob nome")
            ->setInfo("O Nome deve ser Completo Mínimo de 10 Caracteres")
            ->setLabel("Nome Completo")
            ->CriaInpunt();
        
        
        $formulario
            ->setId("nu_cpf")
            ->setLabel("CPF")
            ->setTamanhoInput(6)
            ->setClasses("cpf")    
            ->CriaInpunt();
        
        $formulario
            ->setId("nu_rg")
            ->setLabel("RG")
            ->setTamanhoInput(6)
            ->setClasses("numero")
            ->setInfo("Somente Números")    
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
            ->setTamanhoInput(4)
            ->setClasses("tel ob")
            ->setIcon("fa-mobile fa")    
            ->setLabel("Telefone Ceulular 1")
            ->CriaInpunt();
      
        $formulario
            ->setId("nu_tel2")
            ->setTamanhoInput(4)
            ->setIcon("clip-phone-2")
            ->setClasses("tel")
            ->setLabel("Telefone Ceulular 2")
            ->CriaInpunt();
              
        $formulario
            ->setId("dt_nascimento")
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(4)
            ->setClasses("data ob")
            ->setInfo("Para maiores de 14 anos")    
            ->setLabel("Nascimento")
            ->CriaInpunt();
      
      
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Participou de algum Retiro?")
                ->setTamanhoInput(5)
                ->setId("ds_retiro")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt();
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Participa ou Participou do Gej Dom Bosco?")
                ->setId("ds_membro_ativo")
                ->setTamanhoInput(7)
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt();
      
        $label_options = array(
            "" => "Selecione sua Situação no Grupo", 
            1 => "Retornando ao Grupo", 
            2 => "Quero apenas participar do Evento",
            3 => "Sou Membro Ativo"
        );
        
        $formulario
            ->setId("ds_situacao_atual_grupo")
            ->setType("select")
            ->setTamanhoInput(12)    
            ->setOptions($label_options) 
            ->setLabel("Situação Atual?")
            ->CriaInpunt();
        
         $formulario
            ->setId("ds_email")
            ->setIcon("fa-envelope fa")
            ->setClasses("email")
            ->setLabel("Email")
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
   