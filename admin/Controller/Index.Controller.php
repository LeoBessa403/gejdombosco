<?php
          
class Index{
    
    public $Email;
            
    function Index(){
    }
    
    public static function Logar(){     
 // CLASSE DE LOGAR
        $login = Valida::LimpaVariavel($_POST['user']);
        $senha = Valida::LimpaVariavel($_POST['senha']);
        
         if(($login != "") && ($senha != "")):
            $acesso = new Pesquisa();
         
            $acesso->Pesquisar(TABLE_USER);
            $user = "";
            // Codifica a senha
            $senha = base64_encode(base64_encode($senha));
            foreach ($acesso->getResult() as $result):
                if (($result[CAMPO_USER] == $login) && ($result[CAMPO_PASS] == $senha)):
                    if ($result["st_situacao"] == "I"):
                        Redireciona(ADMIN.LOGIN."?o=alerta3");
                        exit();
                    endif;
                    $perfis = UsuarioModel::PesquisaPerfilUsuarios($result["co_usuario"]);
                    $cont = false;
                    $meuPerfil = "";
                    foreach ($perfis as $resUser):
                        if($cont):
                            $meuPerfil .= ",";
                        endif;
                        $meuPerfil .= $resUser["co_perfil"];
                        $cont = true;
                    endforeach;
                    $result[CAMPO_PERFIL] = $meuPerfil;
                    $user = $result; 
                    break;
                endif;
            endforeach;
            
            if($user != ""):          
                $user["session_id"] = session_id();               
                $user["ultimo_acesso"] = strtotime(Valida::DataDB(Valida::DataAtual()));  
                
                $usuario = new Session();
                $usuario->setUser($user);
                $usuario->setSession(SESSION_USER,$usuario);
                echo "<script type='text/javascript'>"
                        . "window.location.href = '".HOME.ADMIN.LOGADO."';"
                     . "</script>";
            else:
                Redireciona(ADMIN.LOGIN."?o=alerta2");
            endif;
        else:
                Redireciona(ADMIN.LOGIN."?o=info2");
        endif;     
    }
    
    
    //*************************************************************//
    //************ EXEMPLOS DE ACTION ****************************//
    //*************************************************************//
    
    // EXEMPLO DE ENVIO DE EMAIL
    function EmailCliente(){
        $email = new Email();
        
        // Índice = Nome, e Valor = Email.
        $emails = array(
                "Leo Bessa Hot" => "leodjx@hotmail.com",
                "Lili Gmail" => "lililasp@gmail.com",
                "Lele Hot" => "lele.403@hotmail.com",
                "Leo Bessa Gmail" => "leonardomcbessa@gmail.com"
                );
        $Mensagem = "<h2>Olá vc ganhou um Bônus de 5 Milhões.... que piada</h2>";
        
        $email->setEmailDestinatario($emails)
              ->setTitulo("Email de  Teste Pra Todos")
              ->setMensagem($Mensagem);
        
        // Variável para validação de Emails Enviados com Sucesso.
        $this->Email = $email->Enviar();
    }
    
    // LISTAGEM COM PESQUISA AVANÇADA
    function ListarMembros(){     
        $dados = array();
        if(!empty($_POST)):
            $dados['st_status'] = $_POST['st_status'][0];
            $dados['no_membro'] = $_POST['no_membro'];
        endif;
        $this->result = MembrosModel::PesquisaMembros($dados);
    }
    
    // AÇÃO DA TELA DE PESQUISA AVANÇADA
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
    
    // AÇÃO DE EXPORTAÇÃO
    function ExportarCategoria() {
        
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
    
    
}
?>
   