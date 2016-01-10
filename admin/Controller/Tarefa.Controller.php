<?php
          
class Tarefa{
    
    public $result;
    public $resultAlt;
    public $form;
            
    
    function ListarTarefa(){     
        $this->result = TarefaModel::PesquisaTarefa();
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
            
//            $tarefa = $dados;
            $tarefa['dt_cadastro']      = Valida::DataAtualBanco();
            $tarefa['ds_titulo']        = trim($dados['ds_titulo']);
            $tarefa['ds_descricao']     = trim($dados['ds_descricao']);
            $tarefa['st_status']        = "N";
            $tarefa['dt_inicio']      = implode("-",array_reverse(explode("/", $dados['data_inicio'])));
            $tarefa['dt_fim']         = implode("-",array_reverse(explode("/", $dados['data_fim'])));
            $tarefa['co_evento']        = $dados['co_evento'][0];
            $tarefa['co_perfil']        = $dados['ds_perfil'][0];
            $tarefa['co_usuario']        = $user[md5(CAMPO_ID)];
            
            $coTarefa = TarefaModel::CadastraTarefa($tarefa);

            if($coTarefa):
                $this->result = true;
            endif;
            
//            debug(count($membro));
            
//            if(count($membro) > 1):
//                $this->resultAlt = true;
//            else:
//                $idMembro = TarefaModel::AtualizaMembro($dados,$co_membro);
//                if($idMembro):
//                    $this->result = true;
//                endif;
//            endif;
                    
                
        endif;  
        
        $co_tarefa = UrlAmigavel::PegaParametro("taf");
//        $res = array();
//        if($co_evento):
//            $res = TarefaModel::PesquisaUmMembro($co_evento);
//            $res = $res[0];
//        endif;
        
        $formulario = new Form($id, "admin/Tarefa/CadastroTarefa");
//        $formulario->setValor($res);
        
        
        $formulario
            ->setId("ds_titulo")
            ->setClasses("ob")    
            ->setLabel("Título")
            ->CriaInpunt();
        
        $label_options[''] = "Selecione uma Equipe";
        foreach (PerfisAcesso::$Perfils as $key => $value) {
            if($key != $Operfil->SuperPerfil):
                $label_options[$key] = $value;
            endif;
        }    
                
        $formulario
            ->setLabel("Equipe")
            ->setId(CAMPO_PERFIL)
            ->setClasses("ob")   
            ->setInfo("Quem irá realizar a tarefa")
            ->setType("select")
            ->setOptions($label_options)
            ->CriaInpunt();  
        
        
        $formulario
                 ->setId("data_inicio")
                 ->setTamanhoInput(6)
                 ->setClasses("ob data")   
                 ->setIcon("clip-calendar-3")
                 ->setLabel("Data de Inicio")
                 ->CriaInpunt();
        
        $formulario
                 ->setId("data_fim")
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
            
      
        $this->form = $formulario->finalizaForm(); 

    }
        
    
}
?>
   