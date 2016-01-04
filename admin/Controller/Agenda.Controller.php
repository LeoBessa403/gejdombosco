<?php
// CARREGA A AGENDA INICIALMENTE
$agenda = new Agenda();
$agenda->CarregaAgenda();

class Agenda{
    
    public $result;
    public $resultAlt;
    public $form;
            
    function CarregaAgenda(){ 
        
        $mes = date("m");
        $ano = date("Y");
        echo json_encode(array(

                        array(
                                'id' => 111,
                                'title' => "08:00 a 10:30 Event1",
                                'start' => "$ano-$mes-10",
                                'className' => 'label-teal teste'
                        ),

                        array(
                                'id' => 222,
                                'title' => "Event2",
                                'start' => "$ano-$mes-10",
                                'end' => "$ano-$mes-22",
                                'className' => 'label-green'
                        ),

                        array(
                                'id' => 333,
                                'title' => "08:00 a 10:30 Event3",
                                'start' => "$ano-$mes-15",
                                'end' => "$ano-$mes-27",
                                'className' => 'label-default'
                        )


        ));
    }
    
    function Calendario(){ 
        $id = "pesquisaMembrosRetiro";
        $us = $_SESSION[SESSION_USER];                                                                    
        $user = $us->getUser();
        $perfis = $user[md5(CAMPO_PERFIL)];
        
        $Operfil = new PerfisAcesso();
        $perfil = explode(",", $perfis);
         
        $formulario = new Form($id, "admin/Membros/ListarMembrosRetiro", "Pesquisa", 12);
        
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
            ->setId("ds_descricao")
            ->setClasses("ob")   
            ->setType("textarea")
            ->setLabel("Descrição da Eventualidade")
            ->CriaInpunt();
            
      
        $this->result = $formulario->finalizaFormPesquisaAvancada(); 
    }
    
}
?>
   