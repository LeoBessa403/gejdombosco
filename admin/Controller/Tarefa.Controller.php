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
        $tarefa = TarefaModel::PesquisaTarefa();
        
        $this->result = FuncoesSistema::ValidaTarefa($tarefa);
        
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
        
        
        $label_options[''] = "Selecione uma Equipe";
        $labels = FuncoesSistema::ValidaTarefa(PerfisAcesso::$Perfils);
        unset($labels[0]);
        $novoarray = array_merge($label_options,$labels);
                
        $formulario
            ->setLabel("Equipe")
            ->setId("co_perfil")
            ->setClasses("ob")   
            ->setInfo("Quem irá realizar a tarefa")
            ->setType("select")
            ->setOptions($novoarray)
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
   