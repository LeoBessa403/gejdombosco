<?php
// CARREGA A AGENDA INICIALMENTE
include_once "../../library/Config.inc.php";
$agenda = new Agenda();
$agenda->CarregaAgenda();

class Agenda{
    
    public $result;
    public $resultAlt;
    public $form;
            
    function CarregaAgenda(){ 
        
        $result = AgendaModel::PesquisaAgendas();
        
        $eventos = array();
        foreach ($result as $value) {
             $evento = array(
                                'id' => (int) $value["co_agenda"],
                                'title' => $value["ds_titulo"],
                                'start' => Valida::DataShow($value["dt_inicio"],"Y-m-d"),
                                'end' => Valida::DataShow($value["dt_fim"],"Y-m-d"),
                                'className' => $value["ds_cor"],
                                'allDay' => ($value["st_dia_todo"] == "N" ? FALSE : TRUE)
                        );
            $eventos[] = $evento;
        }
        
        echo json_encode($eventos);
        
    }
    
    function AdicionarCompromisso(){
        if(!empty($_POST)):
            $us = $_SESSION[SESSION_USER];                                                                    
            $user = $us->getUser();

            $dados['ds_descricao']              = $_POST['ds_descricao'];
            $dados['co_usuario_solicitante']    = $user[md5('co_usuario')];
            $dados['st_dia_todo']               = "N";
            $dados['dt_inicio']                 = Valida::DataAtualBanco();
            $dados['dt_fim']                    = Valida::DataAtualBanco();
            $dados['ds_titulo']                 = $_POST['ds_titulo'];
            $dados['co_categoria']              = $_POST['co_categoria'][0];

            $coAgenda = AgendaModel::CadastraAgenda($dados); 
            $dadosPerfil['co_agenda']  = $coAgenda;
            foreach($_POST['ds_perfil'] as $value):
                $dadosPerfil['co_perfil']  = $value;
                $this->result = AgendaModel::CadastraAgendaPerfil($dadosPerfil);
            endforeach;
        endif;
        $this->Calendario();
        UrlAmigavel::$action = "Calendario";
    }
    
    function Calendario(){ 
        
        $id = "pesquisaMembrosRetiro";
        $us = $_SESSION[SESSION_USER];                                                                    
        $user = $us->getUser();
        $perfis = $user[md5(CAMPO_PERFIL)];
        
        $Operfil = new PerfisAcesso();
        $perfil = explode(",", $perfis);
         
        $formulario = new Form($id, "admin/Agenda/AdicionarCompromisso", "Pesquisa", 12);
        
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
        
        $formulario
                ->setId("co_categoria")
                ->setType("select")
                ->setClasses("ob")
                ->setLabel("Categoria")
                ->setAutocomplete(Constantes::CATEGORIA_TABELA, "no_categoria",Constantes::CATEGORIA_CHAVE_PRIMARIA)
                ->CriaInpunt();
        
        $formulario
                 ->setId("data_inicio")
                 ->setTamanhoInput(6)
                 ->setClasses("data")
                 ->setIcon("clip-calendar-3")
                 ->setLabel("Data de Inicio")
                 ->CriaInpunt();
        
        $formulario
                 ->setId("hora_inicio")
                 ->setTamanhoInput(6)
                 ->setClasses("horas")
                 ->setPlace("Formato 24Hrs")
                 ->setIcon("clip-clock-2","dir")
                 ->setLabel("Hórario Inicial")
                 ->CriaInpunt();
        
        $formulario
                 ->setId("data_termino")
                 ->setTamanhoInput(6)
                 ->setClasses("data")
                 ->setIcon("clip-calendar-3")
                 ->setInfo("Data Previsto para Terminar")
                 ->setLabel("Data de Termino")
                 ->CriaInpunt();
        
        $formulario
                 ->setId("hora_termino")
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
            
      
        $this->result = $formulario->finalizaFormAgenda(); 
    }
    
}
?>
   