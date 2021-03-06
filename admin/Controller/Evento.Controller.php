<?php
          
class Evento{
    
    public $result;
    public $resultAlt;
    public $form;
            
    
    function ListarEvento(){     
        $this->result = EventoModel::PesquisaEventos();
    }
    
        
    function CadastroEvento(){
        
        $id = "cadastroEvento";
         
        if(!empty($_POST[$id])):
                       
            $dados = $_POST; 
            $fotoCapa = $_FILES['co_foto_capa'];
            
            unset($dados[$id]); 
            $upload = new Upload();
            
            $evento = $dados;
            if($fotoCapa["name"]):
                $capa = $upload->UploadImagens($fotoCapa, Valida::ValNome($dados['no_evento']),"Eventos/CapaEventos");
                $capa['ds_caminho'] = $capa[0];
                unset($capa[0]);
                $idCapa = FotoModel::CadastraFoto($capa);
                $evento['co_foto_capa'] = $idCapa;
            endif;
            
            $evento['ds_conteudo']  = trim($evento['ds_conteudo']);
            $evento['dt_cadastro']  = Valida::DataAtualBanco();
            $evento['dt_realizado'] = Valida::DataDB($evento['dt_realizado']);
                    
                    
            $idEvento = EventoModel::CadastraEvento($evento);
            $session = new Session();
            $session->setSession(CADASTRADO, "OK");

            if($idEvento):
                if($_FILES['fotos']['name'][0]){
                    $pasta = "Eventos/Evento-".$idEvento;
                    $arquivos = $upload->UploadImagens($_FILES['fotos'], Valida::ValNome($dados['no_evento']) , $pasta);
                    $foto['co_evento'] =  $idEvento;

                    foreach ($arquivos as $value) {
                        $foto['ds_caminho'] = $value;
                        FotoModel::CadastraFoto($foto);
                    }                        
                }
                $this->ListarEvento();
                UrlAmigavel::$action = "ListarEvento";
            endif;
            
//            debug(count($membro));
            
//            if(count($membro) > 1):
//                $this->resultAlt = true;
//            else:
//                $idMembro = EventosModel::AtualizaMembro($dados,$co_membro);
//                if($idMembro):
//                    $this->result = true;
//                endif;
//            endif;
                    
                
        endif;  
        
        $co_evento = UrlAmigavel::PegaParametro("mem");
//        $res = array();
//        if($co_evento):
//            $res = EventosModel::PesquisaUmMembro($co_evento);
//            $res = $res[0];
//        endif;
        
        $formulario = new Form($id, "admin/Evento/CadastroEvento");
//        $formulario->setValor($res);
        
        
        $formulario
            ->setId("no_evento")
            ->setClasses("ob")
            ->setLabel("Título")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_palavras_chaves")
            ->setClasses("ob")
            ->setTamanhoInput(9)    
            ->setInfo("Separados por Vírgula. Ex: teste, teste 2")    
            ->setLabel("Palavras Chaves")
            ->CriaInpunt();
      
        $formulario
            ->setId("dt_realizado")
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(3)  
            ->setClasses("data ob")
            ->setLabel("Data")
            ->CriaInpunt();
      
      
        $formulario
            ->setId("ds_local")
            ->setLabel("Local:")
            ->CriaInpunt();
        
        $formulario
            ->setId("co_foto_capa")
            ->setLabel("Capa do Evento")
            ->setType("singlefile")
            ->setInfo("Imagem Principal do Evento")
            ->CriaInpunt();
        
        
        $formulario
            ->setId("ds_conteudo")
            ->setLabel("Conteúdo")
            ->setType("textarea")
            ->setClasses("ckeditor")
            ->CriaInpunt();
         
        $formulario
            ->setId("fotos")
            ->setLabel("Galeria de Fotos do Evento")
            ->setType("file")
            ->setLimite(30)
            ->setClasses("multipla")
            ->setInfo("No máximo de 30 Fotos")
            ->CriaInpunt();
      
      
        
        if($co_evento):
            $formulario
                ->setType("hidden")
                ->setId("co_evento")
                ->setValues($co_evento)
                ->CriaInpunt();
        endif;
      
        
        $this->form = $formulario->finalizaForm(); 

    }
        
    
}
?>
   