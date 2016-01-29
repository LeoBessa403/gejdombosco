<?php

class Agenda{
    
    public $result;
    public $resultAlt;
    public $form;
            
    function AdicionarCompromisso($result){
            $us = $_SESSION[SESSION_USER];                                                                    
            $user = $us->getUser();
            $session = new Session();
            
            $dados['ds_descricao']              = $result['ds_descricao'];
            $dados['dt_cadastro']               = Valida::DataAtualBanco();
            $dados['co_usuario_solicitante']    = $user[md5('co_usuario')];
            $dados['st_dia_todo']               = "N";
            $dados['dt_inicio']                 = Valida::DataDB($result['dt_inicio']." ".$result['hr_inicio'].":00");
            $dados['dt_fim']                    = (!empty($result['dt_fim'])? Valida::DataDB($result['dt_fim']." ".$result['hr_fim'].":00") : null);
            $dados['ds_titulo']                 = $result['ds_titulo'];
            $dados['co_categoria']              = $result['co_categoria'][0];
            $dados['co_evento']                 = $result['co_evento'][0];
            
            if(!empty($result['co_agenda'])):
                $coAgenda = $result['co_agenda'];
                AgendaModel::AtualizaAgenda($dados,$coAgenda);
                AgendaModel::DeletaAgendaPerfil($coAgenda);
                $session->setSession(ATUALIZADO, "OK");
            else:
                $coAgenda = AgendaModel::CadastraAgenda($dados); 
                $session->setSession(CADASTRADO, "OK");
            endif;
            
            $dadosPerfil['co_agenda']  = $coAgenda;
            if(!empty($result['ds_perfil'])):
                foreach($result['ds_perfil'] as $value):
                    $dadosPerfil['co_perfil']  = $value;
                    $this->result = AgendaModel::CadastraAgendaPerfil($dadosPerfil);
                endforeach;
            endif;
    }
    
    function Calendario(){      
        if(!empty($_POST)):
            $this->AdicionarCompromisso($_POST);
        endif;
        $id = "pesquisaMembrosRetiro";
        $formulario = new Form($id, "admin/Agenda/Calendario", "Pesquisa", 12);
        
        $formulario
            ->setId("co_evento")
            ->setType("select")
            ->setClasses("ob")
            ->setLabel("Evento")
            ->setAutocomplete(Constantes::EVENTO_TABELA, "no_evento",Constantes::EVENTO_CHAVE_PRIMARIA)
            ->CriaInpunt();
        
        $formulario
            ->setId("ds_titulo")
            ->setClasses("ob")    
            ->setLabel("Título")
            ->CriaInpunt();
        
        $todos_perfis = PerfilModel::PesquisaPerfil();
        foreach ($todos_perfis as $key => $value) {
            $perf[$value['co_perfil']] = $value['no_perfil'];
        }
        $labels = FuncoesSistema::ValidaPerfilCadastro($perf);
                
        $formulario
            ->setLabel("Participantes")
            ->setId(CAMPO_PERFIL)
            ->setClasses("multipla ob")
            ->setInfo("Pode selecionar vários perfis.")
            ->setType("select")
            ->setOptions($labels)
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
            ->setId("co_agenda")
            ->CriaInpunt();
            
      
        $this->result = $formulario->finalizaFormAgenda(); 
    }
    
}
?>
   