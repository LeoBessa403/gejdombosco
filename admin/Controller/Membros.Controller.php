<?php
          
class Membros{
    
    public $result;
    public $resultAlt;
    public $form;
            
    function Index(){
    }
    
    function CadastroMembros(){
       
        $id = "cadastroMembro";
        
        if(!empty($_POST[$id])):
             if(Valida::ValPerfil("EditarMembros")):
                $dados = $_POST; 
                $dados['dt_cadastro']   = Valida::DataAtualBanco();
                $dados['dt_nascimento'] = explode(' ', Valida::DataDB($dados['dt_nascimento'])); 
                $dados['dt_nascimento'] = $dados['dt_nascimento'][0]; 
                $dados['st_trabalha']   = FuncoesSistema::retornoCheckbox((isset($dados['st_trabalha'])) ? $dados['st_trabalha'] : null); 
                $dados['st_estuda']     = FuncoesSistema::retornoCheckbox((isset($dados['st_estuda'])) ? $dados['st_estuda'] : null); 
                $dados['st_batizado']   = FuncoesSistema::retornoCheckbox((isset($dados['st_batizado'])) ? $dados['st_batizado'] : null); 
                $dados['st_eucaristia'] = FuncoesSistema::retornoCheckbox((isset($dados['st_eucaristia'])) ? $dados['st_eucaristia'] : null); 
                $dados['st_crisma']     = FuncoesSistema::retornoCheckbox((isset($dados['st_crisma'])) ? $dados['st_crisma'] : null); 
                $dados['st_status']     = "N"; 
                $dados['no_membro']     = trim($dados['no_membro']);

//                debug($dados,1);
                
                $pesquisa['dt_nascimento'] = $dados['dt_nascimento'];
                $pesquisa['no_membro']     = $dados['no_membro'];

                $membro = CadastroModel::PesquisaMembroJaCadastrado($pesquisa);

                if($membro):
                    $this->resultAlt = true;
                else:
                    $idMembro = $dados["co_membro"];
                    unset($dados[$id],$dados["co_membro"]);                     
                    $ok = MembrosModel::AtualizaMembros($dados,$idMembro);
                    if($ok):
                        $this->result = true;
                    endif;
                endif;
            endif;          
        endif;  
        
        $idMembro = UrlAmigavel::PegaParametro("memb");
        $res = array();
        if($idMembro && Valida::ValPerfil("EditarMembros")):
            $res = MembrosModel::PesquisaUmMembro($idMembro);
            $res = $res[0];
            $res["dt_nascimento"] = Valida::DataShow($res["dt_nascimento"],"d/m/Y"); 
        endif;   
        
        $formulario = new Form($id, "admin/Membros/CadastroMembros");
        $formulario->setValor($res);
        
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
            ->setClasses("nome")
            ->setLabel("Nome do Respónsavel")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_email")
            ->setIcon("fa-envelope fa")
            ->setClasses("email")
            ->setLabel("Email")
            ->CriaInpunt();
        
        $checked = "";
        if(!empty($res)):
            if($res['st_trabalha'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Trabalha?")
                ->setClasses($checked)
                ->setTamanhoInput(6)
                ->setId("st_trabalha")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt();  
        
        $checked = "";
        if(!empty($res)):
            if($res['st_estuda'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Estuda?")
                ->setClasses($checked)
                ->setTamanhoInput(6)
                ->setId("st_estuda")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt();
        
        $checked = "";
        if(!empty($res)):
            if($res['st_batizado'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Batizado?")
                ->setClasses($checked)
                ->setTamanhoInput(4)
                ->setId("st_batizado")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt();
        
        $checked = "";
        if(!empty($res)):
            if($res['st_eucaristia'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Já fiz 1° Comunhão?")
                ->setTamanhoInput(4)
                ->setClasses($checked)
                ->setId("st_eucaristia")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt(); 
        
        $checked = "";
        if(!empty($res)):
            if($res['st_crisma'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Crismado?")
                ->setClasses($checked)
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
      
              
        if($idMembro):
                $formulario
                    ->setType("hidden")
                    ->setId("co_membro")
                    ->setValues($idMembro)
                    ->CriaInpunt();
          endif;
        
        $this->form = $formulario->finalizaForm(); 

    }
    
    function ListarMembros(){     
        $dados = array();
        if(!empty($_POST)):
            $dados = array(
                'st_status' => $_POST['st_status'][0],
                'no_membro' => $_POST['no_membro']
            );
        endif;
        $this->result = MembrosModel::PesquisaMembros($dados);
    }
    
    // AÇÃO DE EXPORTAÇÃO
    function ExportarListarMembros() {
        
        $formato = UrlAmigavel::PegaParametro("formato");
        $result = CategoriaModel::PesquisaCategoria();
        $i = 0;
        foreach ($result as $value) {
            $res[$i]['id_categoria'] = $value['id_categoria'];
            $res[$i]['nome'] = $value['nome'];
            $i++;
        }
        $Colunas = array('Código','Categoria');
        $exporta = new Exportacao($formato, "Relatório de Categorias");
       // $exporta->setPapelOrientacao("paisagem");
        $exporta->setColunas($Colunas);
        $exporta->setConteudo($res);
        $exporta->GeraArquivo();
       
    }
    
    // AÇÃO DE EXPORTAÇÃO
    function ExportarListarMembrosRetiro() {
        $dados = array();
        $result = MembrosRetiroModel::PesquisaMembros($dados);
        $formato = UrlAmigavel::PegaParametro("formato");
        $i = 0;
        foreach ($result as $value) {
            $res[$i]['no_membro'] = strtoupper($value['no_membro']);
            $res[$i]['dt_nascimento'] = Valida::DataShow($value['dt_nascimento'], "d/m/Y");
            $res[$i]['nu_cpf'] = ($value['nu_cpf'] ? $value['nu_cpf'] : $value['nu_rg']);
            $res[$i]['nu_tel1'] = $value['nu_tel1'];
            $i++;
        }
        $Colunas = array('Nome','Nascimento','nº Documento','Telefone');
        $exporta = new Exportacao($formato, "Relatório dos Membros do Abastecimento");
       // $exporta->setPapelOrientacao("paisagem");
        $exporta->setColunas($Colunas);
        $exporta->setConteudo($res);
        $exporta->GeraArquivo();
       
    }
    
    function ListarMembrosRetiro(){     
        $dados = array();
        if(!empty($_POST)):
            $dados = array(
                'ret.co_retiro' => $_POST['co_retiro'][0],
                'no_membro' => $_POST['no_membro']
            );
        endif;
        $this->result = MembrosRetiroModel::PesquisaMembros($dados);
    }
    
    function EditarMembro(){
       
        $id = "cadastroMembros";
         
        if(!empty($_POST[$id])):
                       
            $dados = $_POST; 
            $dados['dt_nascimento'] = Valida::DataDB($dados['dt_nascimento']." 00:00:00"); 
            $dados['st_trabalha']   = FuncoesSistema::retornoCheckbox((isset($dados['st_trabalha'])) ? $dados['st_trabalha'] : null); 
            $dados['st_estuda']     = FuncoesSistema::retornoCheckbox((isset($dados['st_estuda'])) ? $dados['st_estuda'] : null); 
            $dados['st_batizado']   = FuncoesSistema::retornoCheckbox((isset($dados['st_batizado'])) ? $dados['st_batizado'] : null); 
            $dados['st_eucaristia'] = FuncoesSistema::retornoCheckbox((isset($dados['st_eucaristia'])) ? $dados['st_eucaristia'] : null); 
            $dados['st_crisma']     = FuncoesSistema::retornoCheckbox((isset($dados['st_crisma'])) ? $dados['st_crisma'] : null); 
//            $dados['st_status']     = FuncoesSistema::retornoCheckbox((isset($dados['st_status'])) ? $dados['st_status'] : null); 
            $dados['st_status']     = "N"; 
            $dados['no_membro']     = trim($dados['no_membro']);
                       
            
            $co_membro = $dados['co_membro'];

            unset($dados[$id],$dados['co_membro']); 
//            debug($dados);
            $pesquisa['dt_nascimento'] = $dados['dt_nascimento'];
            $pesquisa['no_membro']     = $dados['no_membro'];
            
            $membro = MembrosModel::PesquisaMembroJaCadastrado($pesquisa);
            
//            debug(count($membro));
            
            if(count($membro) > 1):
                $this->resultAlt = true;
            else:
                $idMembro = MembrosModel::AtualizaMembro($dados,$co_membro);
                if($idMembro):
                    $this->result = true;
                endif;
            endif;
                    
                
        endif;  
        
        $co_membro = UrlAmigavel::PegaParametro("mem");
        $res = array();
        if($co_membro):
            $res = MembrosModel::PesquisaUmMembro($co_membro);
            $res = $res[0];
            $res['dt_nascimento'] = Valida::DataShow($res['dt_nascimento'],'d/m/Y');
        endif;
        
        $formulario = new Form($id, "admin/Membros/EditarMembro");
        $formulario->setValor($res);
        
        $checked = "";
        if(!empty($res)):
            if($res['st_status'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Ativo","Inativo","verde","vermelho");
        $formulario
                ->setLabel("Status do Membro")
                ->setClasses($checked)
                ->setId("st_status")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt(); 
        
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
        
        
        $checked = "";
        if(!empty($res)):
            if($res['st_trabalha'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Trabalha?")
                ->setTamanhoInput(6)
                ->setClasses($checked)
                ->setId("st_trabalha")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt();
        
        $checked = "";
        if(!empty($res)):
            if($res['st_estuda'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Estuda?")
                ->setTamanhoInput(6)
                ->setId("st_estuda")
                ->setType("checkbox")
                ->setClasses($checked)
                ->setOptions($label_options)
                ->CriaInpunt();       
        
        
        $checked = "";
        if(!empty($res)):
            if($res['st_batizado'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Batizado?")
                ->setTamanhoInput(4)
                ->setClasses($checked)
                ->setId("st_batizado")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt(); 
        
        
        $checked = "";
        if(!empty($res)):
            if($res['st_eucaristia'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Já fiz 1° Comunhão?")
                ->setTamanhoInput(4)
                ->setClasses($checked)
                ->setId("st_eucaristia")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt(); 
        
        
        $checked = "";
        if(!empty($res)):
            if($res['st_crisma'] == "S"):
                $checked = "checked";
            endif;
        endif;
        
        $label_options = array("Sim","Não","azul","verde");
        $formulario
                ->setLabel("Crismado?")
                ->setTamanhoInput(4)
                ->setClasses($checked)
                ->setId("st_crisma")
                ->setType("checkbox")
                ->setOptions($label_options)
                ->CriaInpunt(); 

      
        $formulario
            ->setType("textarea")
            ->setId("ds_conhecimento")
            ->setLabel("Como Conheceu o GEJ")
            ->CriaInpunt();
        
        if($co_membro):
            $formulario
                    ->setType("hidden")
                    ->setId("co_membro")
                    ->setValues($co_membro)
                    ->CriaInpunt();
        endif;
      
        
        $this->form = $formulario->finalizaForm(); 

    }

    function ListarMembrosPesquisaAvancada(){
        
        $id = "pesquisaMembros";
         
        $formulario = new Form($id, "admin/Membros/ListarMembros", "Pesquisa", 12);
        
            
        $label_options = array("" => "Todos","S" => "Ativo","N" => "Inativo");
        $formulario
                ->setLabel("Status do Membro")
                ->setId("st_status")
                ->setType("select")
                ->setOptions($label_options)
                ->CriaInpunt(); 
        
        $formulario
            ->setId("no_membro")
            ->setIcon("clip-user-6")
            ->setLabel("Nome do Membro")
            ->setInfo("Pode ser Parte do nome")    
            ->CriaInpunt();
      
        echo $formulario->finalizaFormPesquisaAvancada(); 

    }
    
    function ListarMembrosRetiroPesquisaAvancada(){
        
        $id = "pesquisaMembrosRetiro";
         
        $formulario = new Form($id, "admin/Membros/ListarMembrosRetiro", "Pesquisa", 12);
        
            
        $formulario
                ->setLabel("Retiro")
                ->setId("co_retiro")
                ->setType("select")
                ->setAutocomplete(Constantes::RETIRO_TABELA, "no_retiro",  Constantes::RETIRO_CHAVE_PRIMARIA)
                ->CriaInpunt(); 
        
        $formulario
            ->setId("no_membro")
            ->setIcon("clip-user-6")
            ->setLabel("Nome do Membro")
            ->setInfo("Pode ser Parte do nome")    
            ->CriaInpunt();
      
        echo $formulario->finalizaFormPesquisaAvancada(); 

    }
        
    
}
?>
   