<?php
          
class Eventos{
    
    public $result;
    public $resultAlt;
    public $form;
            
    
    
    function ListarEventos()
    {     
        $this->result = EventosModel::PesquisaEventos();
    }
    
        
    function CadastroEventos(){
       
        $id = "cadastroEventos";
         
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
            
            $membro = EventosModel::PesquisaMembroJaCadastrado($pesquisa);
            
            // PARTE DO UPLOAD MUTIPLO
            $dados['cadastro']  = Valida::DataDB(Valida::DataAtual('d/m/Y'));

            $id = ClienteModel::CadastraCliente($dados);                
            if($id):
                $atu['carterinha']  = (Valida::DataAtual('Ym') * 10000) + $id + 100;
                $ok = ClienteModel::AtualizaCliente($atu, $id);
                if($ok):
                    if($_FILES['fotos']['name'][0]){
                        $upload = new Upload();
                        $pasta = "cliente/".$id."/";
                        $arquivos = $upload->UploadMultiplasImagens($_FILES['fotos'],$dados['nome'],$pasta);
                        $foto['id_cliente'] =  $id;

                        foreach ($arquivos as $value) {
                            $foto['caminho'] = $pasta.$value;
                            FotoModel::CadastraFoto($foto);
                        }                        
                     }
                    $this->result = true;
                endif;
            endif;
            
//            debug(count($membro));
            
            if(count($membro) > 1):
                $this->resultAlt = true;
            else:
                $idMembro = EventosModel::AtualizaMembro($dados,$co_membro);
                if($idMembro):
                    $this->result = true;
                endif;
            endif;
                    
                
        endif;  
        
        $co_evento = UrlAmigavel::PegaParametro("mem");
        $res = array();
        if($co_evento):
            $res = EventosModel::PesquisaUmMembro($co_evento);
            $res = $res[0];
        endif;
        
        $formulario = new Form($id, "admin/Eventos/CadastroEventos");
        $formulario->setValor($res);
        
        
        $formulario
            ->setId("ds_titulo")
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
            ->setLabel("Realizado em")
            ->CriaInpunt();
      
      
        $formulario
            ->setId("ds_local")
            ->setLabel("Local:")
            ->CriaInpunt();
        
         $formulario
                ->setId("co_foto_capa")
                ->setLabel("Capa do Evento")
                ->setType("file")
                ->setInfo("Imagem Principal do Evento")
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
   