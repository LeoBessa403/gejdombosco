<?php
          
class Usuario{
    
    public $result;
    public $resultAlt;
    public $form;
    public $erro;
    public $mensagem;
    public $idUsuario;
            
    function Index(){
    }
    
    function MeuPerfilUsuario(){
        $us = $_SESSION[SESSION_USER];                                                                    
        $user = $us->getUser();
        $this->idUsuario = $user[md5('co_usuario')];
        $this->CadastroUsuario();
        UrlAmigavel::$action = "CadastroUsuario";
    }
    
    function CadastroUsuario(){
       
        $id = "CadastroUsuario";

        if(!empty($_POST[$id])):

            $dados = $_POST; 
            $dados['ds_sexo']       = $dados['ds_sexo'][0]; 
            $dados['no_usuario']    = trim($dados['no_usuario']);
            $dados['ds_code']       = base64_encode(base64_encode($dados['ds_senha']));
            $dados['st_situacao']   = (isset($dados['st_situacao']) ? "A" : "I");
            $idCoUsuario            = (isset($dados['co_usuario']) ? $dados['co_usuario'] : null);
            if(!empty($dados['ds_perfil'])):
                $dados['ds_perfil']       = implode(",", $dados['ds_perfil']).",100";
            endif;
            unset($dados[$id],$dados["ds_senha_confirma"],$dados['co_usuario']);  

            $user['no_usuario'] = $dados['no_usuario'];
            $userNome = UsuarioModel::PesquisaUsuarioCadastrado($user);
            $email['ds_email'] = $dados['ds_email'];
            $userEmail = UsuarioModel::PesquisaUsuarioCadastrado($email);
            $login['ds_login'] = $dados['ds_login'];
            $userLogin = UsuarioModel::PesquisaUsuarioCadastrado($login);

            $this->erro = false;
            if($userNome && $userNome[0]["co_usuario"] != $idCoUsuario):
                $Campo[] = "Nome do Usuário";
                $this->erro = true;
            endif;    
            if($userEmail && $userEmail[0]["co_usuario"] != $idCoUsuario):
                $Campo[] = "E-mail";
                $this->erro = true;
            endif;    
            if($userLogin && $userLogin[0]["co_usuario"] != $idCoUsuario):
                $Campo[] = "Login";
                $this->erro = true;
            endif;    

            if($this->erro):
                $this->mensagem = "Já exite usuário cadastro com o mesmo ".implode(", ", $Campo).", Favor Verificar.";
            else:
                if($_FILES["ds_foto"]["tmp_name"]):
                    $foto = $_FILES["ds_foto"];
                    $nome = Valida::ValNome($dados['no_usuario']);
                    $up = new Upload();
                    $up->UploadImagem($foto, $nome, "usuarios");
                    $dados['ds_foto'] = $up->getNameImage();
                endif;
                if($idCoUsuario):
                    $idUsuario = UsuarioModel::AtualizaUsuario($dados,$idCoUsuario);
                    if($userNome[0]["ds_foto"]):
                        unlink(Upload::$BaseDir."usuarios/".$userNome[0]["ds_foto"]);
                    endif;
                else:
                    $dados[CAMPO_PERFIL]    = 100; // Perfil Inicial 
                    $dados['dt_cadastro']   = Valida::DataAtualBanco();
                    $idUsuario = UsuarioModel::CadastraUsuario($dados);
                endif;
                if($idUsuario):
                    $email = new Email();

                    // Índice = Nome, e Valor = Email.
                    $emails = array(
                                $dados['no_usuario'] => $dados['ds_email']
                            );
                    $Mensagem = "<h2>Seu cadastro foi realizado com sucesso</h2><br/>"
                              . "Aguarde a Ativação do seu Usuário ".$dados['ds_login'];

                    $email->setEmailDestinatario($emails)
                          ->setTitulo("Email de  Teste Pra Todos")
                          ->setMensagem($Mensagem);

                    // Variável para validação de Emails Enviados com Sucesso.
                    //$EmailEnviado = $email->Enviar();

                    $this->result = true;
                endif;
            endif;
        endif;  
        
        if(!$this->idUsuario):
            $this->idUsuario = UrlAmigavel::PegaParametro("usu");
        endif;
        $res = array();
        if($this->idUsuario):
            $res = UsuarioModel::PesquisaUmUsuario($this->idUsuario);
            $res = $res[0];
            $res['ds_senha_confirma'] = $res['ds_senha'];
            if($res['ds_foto']):
                $res['ds_foto'] = "usuarios/".$res['ds_foto'];
            endif;
            $res['ds_perfil'] = explode(",",$res['ds_perfil']);
        endif;   
        
        $formulario = new Form($id, "admin/Usuario/CadastroUsuario");
        $formulario->setValor($res);
        
        $formulario
            ->setId("no_usuario")
            ->setClasses("ob nome")
            ->setInfo("O Nome deve ser Completo Mínimo de 10 Caracteres")
            ->setLabel("Nome Completo")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_email")
            ->setIcon("fa-envelope fa")
            ->setClasses("email ob")
            ->setLabel("Email")
            ->CriaInpunt();
        
        $label_options = array("" => "Selecione um Sexo", "M" => "Masculino","F" => "Feminino");
        $formulario
                ->setLabel("Sexo")
                ->setId("ds_sexo")
                ->setType("select")
                ->setOptions($label_options)
                ->CriaInpunt();  
        
        $formulario
            ->setId("ds_foto")
            ->setType("singlefile")
            ->setTamanhoInput(8)
            ->setInfo("Caso queira troca de foto")
            ->setLabel("Foto de Perfil")
            ->CriaInpunt();
      
        
        $formulario
            ->setId("ds_login")
            ->setClasses("ob")
            ->setTamanhoInput(4)
            ->setLabel("Login")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_senha")
            ->setClasses("ob senha")
            ->setTamanhoInput(4)
            ->setType("password")
            ->setLabel("Senha")
            ->CriaInpunt();
      
        $formulario
            ->setId("ds_senha_confirma")
            ->setClasses("ob confirma-senha")
            ->setTamanhoInput(4)
            ->setType("password")
            ->setLabel("Confirmação da Senha")
            ->CriaInpunt();
      
        $us = $_SESSION[SESSION_USER];                                                                    
        $user = $us->getUser();
        $perfis = $user[md5(CAMPO_PERFIL)];
        
        $Operfil = new PerfisAcesso();
        $perfil = explode(",", $perfis);
        $controle = false;
        if(in_array($Operfil->SuperPerfil, $perfil) || in_array($Operfil->PerfilAdministrador, $perfil)):
            $label_options = array();
            foreach (PerfisAcesso::$Perfils as $key => $value) {
                if($key != $Operfil->PerfilInicial):
                    $label_options[$key] = $value;
                endif;
            }    
                
            $formulario
                ->setLabel("Perfis")
                ->setId("ds_perfil")
                ->setClasses("multipla")
                ->setTamanhoInput(8)
                ->setInfo("Pode selecionar vários perfis.")
                ->setType("select")
                ->setOptions($label_options)
                ->CriaInpunt();  
            
            $checked = "";
            if(!empty($res)):
                if($res['st_situacao'] == "A"):
                    $checked = "checked";
                endif;
            endif;

            $label_options2 = array("Ativo","Inativo","verde","vermelho");
            $formulario
                    ->setLabel("Status do Usuário")
                    ->setClasses($checked)
                    ->setId("st_situacao")
                ->setInfo("Para Ativar e Desativar Usuários do Sistema.")
                    ->setType("checkbox")
                    ->setTamanhoInput(4)
                    ->setOptions($label_options2)
                    ->CriaInpunt();     
            
        endif;
        
        if($this->idUsuario):
                $formulario
                    ->setType("hidden")
                    ->setId("co_usuario")
                    ->setValues($this->idUsuario)
                    ->CriaInpunt();
        endif;
        
        $this->form = $formulario->finalizaForm(); 

    }
    
    function ListarUsuario(){     
        $dados = array();
        if(!empty($_POST)):
            $dados = array(
                'no_usuario' => $_POST['no_usuario']
            );
        endif;
        $this->result = UsuarioModel::PesquisaUsuarios($dados);
    }
    
    // AÇÃO DE EXPORTAÇÃO
    function ExportarListarUsuario() {
        
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
    
    
    function ListarUsuarioPesquisaAvancada(){
        
        $id = "pesquisaUsuario";
         
        $formulario = new Form($id, "admin/Usuario/ListarUsuario", "Pesquisa", 12);
        
        $formulario
            ->setId("no_usuario")
            ->setIcon("clip-user-6")
            ->setLabel("Nome do Usuario")
            ->setInfo("Pode ser Parte do nome")    
            ->CriaInpunt();
      
        echo $formulario->finalizaFormPesquisaAvancada(); 

    }
    
    
}
?>
   