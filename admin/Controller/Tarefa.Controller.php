<?php
          
class Tarefa{
    
    public $result;
    public $resultAlt;
    public $form;
            
    
    function DetalharTarefa(){   
        
        $co_tarefa = UrlAmigavel::PegaParametro("taf");
        $res = array();
        if($co_tarefa):
            $res = TarefaModel::PesquisaUmaTarefa($co_tarefa);
            $res = $res[0];
            $res["dt_inicio"]   = Valida::DataShow($res["dt_inicio"],"d/m/Y"); 
            $res["dt_fim"]      = Valida::DataShow($res["dt_fim"],"d/m/Y"); 
            if(!empty($res["dt_conclusao"])):
                $res["dt_conclusao"] = Valida::DataShow($res["dt_conclusao"],"d/m/Y"); 
            endif;
            $this->result = $res;
        endif;
    }  
    function ListarTarefa(){     
        $this->result = TarefaModel::PesquisaTarefa();
        $us = $_SESSION[SESSION_USER];                                                                    
        $user = $us->getUser();
        $Operfil = new PerfisAcesso();
        $meusPerfis = explode(",", $user[md5(CAMPO_PERFIL)]);
        
        $label_options = array();
        foreach ($this->result as $value) {
                if(in_array($Operfil->PerfilAdministrador, $meusPerfis)):
                    $label_options[] = $value;
                elseif(in_array($Operfil->SuperPerfil, $meusPerfis)):
                    $label_options[] = $value;
                elseif(in_array(4, $meusPerfis) && $value["co_evento"] == 3):
                    $label_options[] = $value;
                elseif(in_array(5, $meusPerfis) && in_array($value["co_perfil"], array(5,6))):
                    $label_options[] = $value;
                elseif(in_array(7, $meusPerfis) && in_array($value["co_perfil"], array(7,8))):
                    $label_options[] = $value;
                elseif(in_array(9, $meusPerfis) && in_array($value["co_perfil"], array(9,10))):
                    $label_options[] = $value;
                elseif(in_array(11, $meusPerfis) && in_array($value["co_perfil"], array(11,12))):
                    $label_options[] = $value;
                elseif(in_array(13, $meusPerfis) && in_array($value["co_perfil"], array(13,14))):
                    $label_options[] = $value;
                elseif(in_array(15, $meusPerfis) && in_array($value["co_perfil"], array(15,16))):
                    $label_options[] = $value;
                elseif(in_array(17, $meusPerfis) && in_array($value["co_perfil"], array(17,18))):
                    $label_options[] = $value;
                elseif(in_array(19, $meusPerfis) && $value["co_perfil"] == 19):
                    $label_options[] = $value;
                endif;
                
        }    
        
        $this->result = $label_options;
        
    }
    
        
    function CadastroTarefa(){
        
        $id = "cadastroTarefa";
        $us = $_SESSION[SESSION_USER];                                                                    
        $user = $us->getUser();
        $perfis = $user[md5(CAMPO_PERFIL)];
        
        $Operfil = new PerfisAcesso();
        $perfil = explode(",", $perfis);
         
        if(!empty($_POST[$id])):
                       
            $dados = $_POST; 
            unset($dados[$id]); 
            
            $tarefa['dt_cadastro']      = Valida::DataAtualBanco();
            $tarefa['ds_titulo']        = trim($dados['ds_titulo']);
            $tarefa['ds_descricao']     = trim($dados['ds_descricao']);
            $tarefa['dt_inicio']        = implode("-",array_reverse(explode("/", $dados['dt_inicio'])));
            $tarefa['dt_fim']           = implode("-",array_reverse(explode("/", $dados['dt_fim'])));
            $tarefa['co_evento']        = $dados['co_evento'][0];
            $tarefa['co_perfil']        = $dados['co_perfil'][0];
            $tarefa['co_usuario']       = $user[md5(CAMPO_ID)];
            
            
            if(!empty($_POST['co_tarefa'])):
                $tarefa['st_status']        = $dados['st_status'][0];
                if(!empty($dados["dt_conclusao"])):
                    $tarefa['dt_conclusao']        = implode("-",array_reverse(explode("/", $dados['dt_conclusao'])));
                endif;
                $CoTaref = TarefaModel::AtualizaTarefa($tarefa, $_POST['co_tarefa']);
                if($CoTaref):
                    $this->resultAlt = true;
                endif;
            else:    
                $tarefa['st_status']        = "N";
                $coTarefa = TarefaModel::CadastraTarefa($tarefa);
                if($coTarefa):
                    $this->result = true;
                endif;
            endif;
        endif;  
        
        $co_tarefa = UrlAmigavel::PegaParametro("taf");
        $res = array();
        if($co_tarefa):
            $res = TarefaModel::PesquisaUmaTarefa($co_tarefa);
            $res = $res[0];
            $res["dt_inicio"]   = Valida::DataShow($res["dt_inicio"],"d/m/Y"); 
            $res["dt_fim"]      = Valida::DataShow($res["dt_fim"],"d/m/Y"); 
            if(!empty($res["dt_conclusao"])):
                $res["dt_conclusao"] = Valida::DataShow($res["dt_conclusao"],"d/m/Y"); 
            endif;
        endif;
        
        $formulario = new Form($id, "admin/Tarefa/CadastroTarefa");
        $formulario->setValor($res);
        
        
        $formulario
            ->setId("ds_titulo")
            ->setClasses("ob")    
            ->setLabel("Título")
            ->CriaInpunt();
        
        $meusPerfis = explode(",", $user[md5(CAMPO_PERFIL)]);
        $label_options[''] = "Selecione uma Equipe";
        foreach (PerfisAcesso::$Perfils as $key => $value) {
            if($key != $Operfil->SuperPerfil):
                if(in_array($Operfil->PerfilAdministrador, $meusPerfis)):
                    $label_options[$key] = $value;
                elseif(in_array($Operfil->SuperPerfil, $meusPerfis)):
                    $label_options[$key] = $value;
                elseif(in_array(4, $meusPerfis) && $key != $Operfil->PerfilAdministrador):
                    $label_options[$key] = $value;
                elseif(in_array(5, $meusPerfis) && in_array($key, array(5,6))):
                    $label_options[$key] = $value;
                elseif(in_array(7, $meusPerfis) && in_array($key, array(7,8))):
                    $label_options[$key] = $value;
                elseif(in_array(9, $meusPerfis) && in_array($key, array(9,10))):
                    $label_options[$key] = $value;
                elseif(in_array(11, $meusPerfis) && in_array($key, array(11,12))):
                    $label_options[$key] = $value;
                elseif(in_array(13, $meusPerfis) && in_array($key, array(13,14))):
                    $label_options[$key] = $value;
                elseif(in_array(15, $meusPerfis) && in_array($key, array(15,16))):
                    $label_options[$key] = $value;
                elseif(in_array(17, $meusPerfis) && in_array($key, array(17,18))):
                    $label_options[$key] = $value;
                endif;
            endif;
        }    
                
        $formulario
            ->setLabel("Equipe")
            ->setId("co_perfil")
            ->setClasses("ob")   
            ->setInfo("Quem irá realizar a tarefa")
            ->setType("select")
            ->setOptions($label_options)
            ->CriaInpunt();  
        
        
        $formulario
                 ->setId("dt_inicio")
                 ->setTamanhoInput(6)
                 ->setClasses("ob data")   
                 ->setIcon("clip-calendar-3")
                 ->setLabel("Data de Inicio")
                 ->CriaInpunt();
        
        $formulario
                 ->setId("dt_fim")
                 ->setTamanhoInput(6)
                 ->setClasses("ob data")   
                 ->setIcon("clip-calendar-3")
                 ->setInfo("Data Previsto para Terminar")
                 ->setLabel("Data de Termino")
                 ->CriaInpunt();
        
        $formulario
                ->setId("co_evento")
                ->setType("select")
                ->setClasses("ob")
                ->setLabel("Evento")
                ->setAutocomplete(Constantes::EVENTO_TABELA, "no_evento",Constantes::EVENTO_CHAVE_PRIMARIA)
                ->CriaInpunt(); 
        
        
        $formulario
            ->setId("ds_descricao")
            ->setClasses("ob")   
            ->setType("textarea")
            ->setLabel("Descrição da Tarefa")
            ->CriaInpunt();
        
        
        if($co_tarefa):
            
            $formulario
                ->setId("no_usuario")
                ->setClasses("disabilita")   
                ->setLabel("Quem Criou")
                ->CriaInpunt();
        
            $label_options = array(
                "N" => "NÃO INICIADA",
                "A" => "EM ANDAMENTO",
                "C" => "CONCLUIDA",
                "I" => "INATIVA"
            );    
                
            $formulario
                ->setLabel("Status")
                ->setId("st_status")
                ->setType("select")
                ->setOptions($label_options)
                ->CriaInpunt();  
            
            $formulario
                 ->setId("dt_conclusao")
                 ->setClasses("ob data")   
                 ->setIcon("clip-calendar-3")
                 ->setLabel("Data de Conclusão")
                 ->CriaInpunt();
            
            $formulario
                    ->setType("hidden")
                    ->setId("co_tarefa")
                    ->setValues($co_tarefa)
                    ->CriaInpunt();
            
        endif;
            
      
        $this->form = $formulario->finalizaForm(); 

    }
        
    
}
?>
   