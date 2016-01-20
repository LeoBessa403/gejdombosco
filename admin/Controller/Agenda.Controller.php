<?php

class Agenda{
    
    public $result;
    public $resultAlt;
    public $form;
            
    function AdicionarCompromisso($result){
            $us = $_SESSION[SESSION_USER];                                                                    
            $user = $us->getUser();
            
            $dados['ds_descricao']              = $result['ds_descricao'];
            $dados['dt_cadastro']               = Valida::DataAtualBanco();
            $dados['co_usuario_solicitante']    = $user[md5('co_usuario')];
            $dados['st_dia_todo']               = "N";
            $dados['dt_inicio']                 = Valida::DataDB($result['dt_inicio']." ".$result['hr_inicio'].":00");
            $dados['dt_fim']                    = (!empty($result['dt_fim'])? Valida::DataDB($result['dt_fim']." ".$result['hr_fim'].":00") : null);
            $dados['ds_titulo']                 = $result['ds_titulo'];
            $dados['co_categoria']              = $result['co_categoria'][0];

            if(!empty($result['co_agenda'])):
                $coAgenda = $result['co_agenda'];
                AgendaModel::AtualizaAgenda($dados,$coAgenda);
                AgendaModel::DeletaAgendaPerfil($coAgenda);
            else:
                $coAgenda = AgendaModel::CadastraAgenda($dados); 
            endif;
            
            $dadosPerfil['co_agenda']  = $coAgenda;
            foreach($result['ds_perfil'] as $value):
                $dadosPerfil['co_perfil']  = $value;
                $this->result = AgendaModel::CadastraAgendaPerfil($dadosPerfil);
            endforeach;
    }
    
    function Calendario(){      
        if(!empty($_POST)):
            $dados = $_POST;
            $this->AdicionarCompromisso($dados);
        endif;
        $id = "pesquisaMembrosRetiro";
        $us = $_SESSION[SESSION_USER];                                                                    
        $user = $us->getUser();
        $perfis = $user[md5(CAMPO_PERFIL)];
        
        $Operfil = new PerfisAcesso();
        $perfil = explode(",", $perfis);
         
        $formulario = new Form($id, "admin/Agenda/Calendario", "Pesquisa", 12);
        
        $formulario
            ->setId("ds_titulo")
            ->setClasses("ob")    
            ->setLabel("Título")
            ->CriaInpunt();
        
        foreach (PerfisAcesso::$Perfils as $key => $value) {
            if($key != $Operfil->SuperPerfil):
                $label_options[$key] = $value;
            endif;
        }    
                
        $formulario
            ->setLabel("Participantes")
            ->setId(CAMPO_PERFIL)
            ->setClasses("multipla")
            ->setInfo("Pode selecionar vários perfis.")
            ->setType("select")
            ->setOptions($label_options)
            ->CriaInpunt();  
        
        $options[''] = 'Selecione uma Categoria' ;
        $resultados = AgendaModel::PesquisaCategoriasAgenda();
        
        foreach ($resultados as $key => $value) {
            $options[$value['co_categoria']] = $value['no_categoria'] ;
        }
        
        $formulario
            ->setId("co_categoria")
            ->setType("select")
            ->setClasses("ob")
            ->setLabel("Categoria")
            ->setOptions($options)
            ->CriaInpunt();
        
        $formulario
            ->setId("dt_inicio")
            ->setTamanhoInput(6)
            ->setClasses("data ob")
            ->setIcon("clip-calendar-3")
            ->setLabel("Data de Inicio")
            ->CriaInpunt();
        
        $formulario
            ->setId("hr_inicio")
            ->setTamanhoInput(6)
            ->setClasses("horas ob")
            ->setPlace("Formato 24Hrs")
            ->setIcon("clip-clock-2","dir")
            ->setLabel("Hórario Inicial")
            ->CriaInpunt();
        
        $formulario
            ->setId("dt_fim")
            ->setTamanhoInput(6)
            ->setClasses("data")
            ->setIcon("clip-calendar-3")
            ->setInfo("Data Previsto para Terminar")
            ->setLabel("Data de Termino")
            ->CriaInpunt();
        
        $formulario
            ->setId("hr_fim")
            ->setTamanhoInput(6)
            ->setPlace("Formato 24Hrs")
            ->setInfo("Horário Previsto para Terminar")
            ->setClasses("horas")
            ->setIcon("clip-clock-2","dir")
            ->setLabel("Hórario Final")
            ->CriaInpunt();
        
        $formulario
            ->setId("ds_descricao")
            ->setClasses("ob")   
            ->setType("textarea")
            ->setLabel("Descrição da Eventualidade")
            ->CriaInpunt();
        
        $formulario
            ->setType("hidden")
            ->setId("co_evento")
            ->CriaInpunt();
        
        $formulario
            ->setType("hidden")
            ->setId("co_agenda")
            ->CriaInpunt();
            
      
        $this->result = $formulario->finalizaFormAgenda(); 
    }
    
}
?>
   