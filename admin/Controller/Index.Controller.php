<?php

class Index
{

    function Index()
    {
    }

    function Registrar()
    {
        $id = "CadastroUsuario";
        $erro = "60";
        if (!empty($_POST[$id])):

            $dados = $_POST;
            $dados['dt_cadastro'] = Valida::DataAtualBanco();
            $dados['ds_sexo'] = $dados['ds_sexo'][0];
            $dados['no_usuario'] = trim($dados['no_usuario']);
            $dados['ds_code'] = base64_encode(base64_encode($dados['ds_senha']));
            unset($dados[$id], $dados["ds_senha_confirma"]);

            $user['no_usuario'] = $dados['no_usuario'];
            $userNome = UsuarioModel::PesquisaUsuarioCadastrado($user);
            $email['ds_email'] = $dados['ds_email'];
            $userEmail = UsuarioModel::PesquisaUsuarioCadastrado($email);
            $login['ds_login'] = $dados['ds_login'];
            $userLogin = UsuarioModel::PesquisaUsuarioCadastrado($login);

            $erro = "OK";
            if ($userNome):
                $Campo[] = "Nome do Usuário";
                $erro = "ERRO";
            endif;
            if ($userEmail):
                $Campo[] = "E-mail";
                $erro = "ERRO";
            endif;
            if ($userLogin):
                $Campo[] = "Login";
                $erro = "ERRO";
            endif;

            if ($erro == "ERRO"):
                $mensagem = "Já exite usuário cadastro com o mesmo " . implode(", ", $Campo) . ", Favor Verificar.";
            else:
                if ($_FILES["ds_foto"]["tmp_name"]):
                    $foto = $_FILES["ds_foto"];
                    $nome = Valida::ValNome($dados['no_usuario']);
                    $up = new Upload();
                    $up->UploadImagens($foto, $nome, "usuarios");
                    $dados['ds_foto'] = $up->getNameImage();
                endif;
                $idUsuario = UsuarioModel::CadastraUsuario($dados);
                if ($idUsuario):
                    $userPerfil[Constantes::USUARIO_CHAVE_PRIMARIA] = $idUsuario;
                    $userPerfil[Constantes::PERFIL_CHAVE_PRIMARIA] = 3; // Perfil Inicial
                    UsuarioModel::CadastraUsuarioPerfil($userPerfil);
//                    $email = new Email();

                    // Índice = Nome, e Valor = Email.
//                    $emails = array(
//                        $dados['no_usuario'] => $dados['ds_email']
//                    );
//                    $Mensagem = "<h2>Seu cadastro foi realizado com sucesso</h2><br/>"
//                        . "Aguarde a Ativação do seu Usuário " . $dados['ds_login'];
//
//                    $email->setEmailDestinatario($emails)
//                        ->setTitulo("Email de  Teste Pra Todos")
//                        ->setMensagem($Mensagem);

                    // Variável para validação de Emails Enviados com Sucesso.
                    //$EmailEnviado = $email->Enviar();
                endif;
            endif;
        endif;

        /** @var Form $formulario */
        $formulario = new Form($id, "admin/Index/Registrar", 'Cadastrar', 12);

        $formulario
            ->setId(Constantes::NO_PESSOA)
            ->setClasses("ob nome")
            ->setInfo("O Nome deve ser Completo Mínimo de 10 Caracteres")
            ->setLabel("Nome Completo")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NU_CPF)
            ->setClasses("cpf ob")
            ->setTamanhoInput(6)
            ->setLabel("CPF")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NU_RG)
            ->setTamanhoInput(6)
            ->setLabel("RG")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DT_NASCIMENTO)
            ->setTamanhoInput(6)
            ->setClasses("data ob")
            ->setLabel("Nascimento")
            ->setInfo("Data de Nascimento")
            ->CriaInpunt();

        $label_options = array("" => "Selecione um", "M" => "Masculino", "F" => "Feminino");
        $formulario
            ->setLabel("Sexo")
            ->setId(Constantes::ST_SEXO)
            ->setClasses("ob")
            ->setType("select")
            ->setTamanhoInput(6)
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_EMAIL)
            ->setIcon("fa-envelope fa")
            ->setClasses("email ob")
            ->setLabel("Email")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NU_TEL1)
            ->setTamanhoInput(6)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone Celular")
            ->setInfo("Com o Whatsapp")
            ->setClasses("tel ob")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NU_TEL2)
            ->setTamanhoInput(6)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone Celular 2")
            ->setClasses("tel")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_ENDERECO)
            ->setIcon("clip-home-2")
            ->setClasses("ob")
            ->setLabel("Endereço")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_COMPLEMENTO)
            ->setLabel("Complemento")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_BAIRRO)
            ->setLabel("Bairro")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NO_CIDADE)
            ->setLabel("Cidade")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::NU_CEP)
            ->setLabel("CEP")
            ->setTamanhoInput(4)
            ->setClasses("cep")
            ->CriaInpunt();

        $options = Endereco::montaComboEstadosDescricao();
        $formulario
            ->setTamanhoInput(8)
            ->setId(Constantes::SG_UF)
            ->setType("select")
            ->setClasses("ob")
            ->setLabel("Estado")
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_SENHA)
            ->setClasses("ob senha")
            ->setTamanhoInput(6)
            ->setType("password")
            ->setLabel("Senha")
            ->CriaInpunt();

        $formulario
            ->setId("ds_senha_confirma")
            ->setClasses("ob confirma-senha")
            ->setTamanhoInput(6)
            ->setType("password")
            ->setLabel("Confirmação da Senha")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_CAMINHO)
            ->setType("singlefile")
            ->setInfo("Caso queira troca de foto")
            ->setLabel("Foto de Perfil")
            ->CriaInpunt();


        $this->form = $formulario->finalizaForm();
        
        
    }

    public function Acessar()
    {
        $acesso = UrlAmigavel::PegaParametro('acesso');
        $class = 0;
        $msg = "";
        $visivel = true;

        switch ($acesso) {
            case 'B':
                $msg = "Por Favor, Preencha o Usuário e senha!";
                $class = 2;
                break;
            case 'R':
                $msg = "Acesso Restrito, Você não tem permição para acessar!";
                $class = 4;
                break;
            case 'A':
                $msg = "CPF ou senha Inválido!";
                $class = 3;
                break;
            case 'I':
                $msg = "Usuário Inativo!";
                $class = 3;
                break;
            case 'D':
                $msg = "Usuário deslogado com sucesso!";
                $class = 1;
                break;
            case 'E':
                $msg = "Sua Sessão foi Expirada!";
                $class = 2;
                break;
            default:
                $visivel = false;
                break;

        }
        $this->class = " " . $class;
        $this->visivel = $visivel;
        $this->msg = $msg;
    }

    public static function Logar()
    {
        // CLASSE DE LOGAR
        $cpf = Valida::RetiraMascara(Valida::LimpaVariavel($_POST['nu_cpf']));
        $senha = Valida::LimpaVariavel($_POST['ds_senha']);

        if (($cpf != "") && ($senha != "")):

            $Model = new UsuarioModel();
            $usuarios = $Model->PesquisaTodos();

            $user = "";
            // Codifica a senha
            $senha = base64_encode(base64_encode($senha));
            /** @var UsuarioEntidade $usuario */
            foreach ($usuarios as $usuario):
                if (($usuario->getCoPessoa()->getNuCpf() == $cpf) && ($usuario->getDsCode() == $senha)):
                    if ($usuario->getStStatus() == "I"):
                        Redireciona(ADMIN . LOGIN . Valida::GeraParametro("acesso/I"));
                        exit();
                    endif;
                    /** @var UsuarioEntidade $user */
                    $user = $usuario;
                    break;
                endif;
            endforeach;
            if ($user != ""):
                $acesso['ds_session_id'] = session_id();
                $acesso['co_usuario'] = $user->getCoUsuario();
                $acessoObj = new AcessoModel();
                $meuAcesso = $acessoObj->PesquisaUmQuando($acesso);
                if ($meuAcesso) {
                    $novoAcesso['dt_fim_acesso'] = Valida::DataAtualBanco();
                    $acessoObj->Salva($novoAcesso, $user->getCoUsuario());
                } else {
                    $acesso['dt_inicio_acesso'] = Valida::DataAtualBanco();
                    $acesso['dt_fim_acesso'] = Valida::DataAtualBanco();
                    $acesso['co_usuario'] = $user->getCoUsuario();
                    $acessoObj->Salva($acesso);
                }

                $perfis = array();
                $no_perfis = array();
                /** @var UsuarioPerfilEntidade $perfil */
                foreach ($user->getCoUsuarioPerfil() as $perfil) {
                    $perfis[] = $perfil->getCoPerfil()->getCoPerfil();
                    $no_perfis[] = $perfil->getCoPerfil()->getNoPerfil();
                }
                $const = new Constantes();
                $usuarioAcesso[$const::CO_USUARIO] = $user->getCoUsuario();
                $usuarioAcesso[$const::DS_CAMINHO] = $user->getCoImagem()->getDsCaminho();
                $usuarioAcesso[$const::NU_CPF] = $user->getCoPessoa()->getNuCpf();
                $usuarioAcesso[$const::NO_PESSOA] = $user->getCoPessoa()->getNoPessoa();
                $usuarioAcesso[$const::ST_SEXO] = $user->getCoPessoa()->getStSexo();
                $usuarioAcesso[$const::DT_FIM_ACESSO] = Valida::DataAtualBanco();
                $usuarioAcesso[CAMPO_PERFIL] = implode(',', $perfis);
                $usuarioAcesso['no_perfis'] = implode(', ', $no_perfis);


                $session = new Session();
                $session->setUser($usuarioAcesso);
                $session->setSession(SESSION_USER, $session);
                Redireciona(ADMIN . LOGADO);
            else:
                Redireciona(ADMIN . LOGIN . Valida::GeraParametro("acesso/A"));
            endif;
        else:
            Redireciona(ADMIN . LOGIN . Valida::GeraParametro("acesso/B"));
        endif;
    }


    //*************************************************************//
    //************ EXEMPLOS DE ACTION ****************************//
    //*************************************************************//

    // EXEMPLO DE ENVIO DE EMAIL
    function EmailCliente()
    {
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
    function ListarMembros()
    {
        $dados = array();
        if (!empty($_POST)):
            $dados['st_status'] = $_POST['st_status'][0];
            $dados['no_membro'] = $_POST['no_membro'];
        endif;
        $this->result = MembrosModel::PesquisaMembros($dados);
    }

    // AÇÃO DA TELA DE PESQUISA AVANÇADA
    function ListarMembrosPesquisaAvancada()
    {

        $id = "pesquisaMembros";

        $formulario = new Form($id, "admin/Membros/ListarMembros", "Pesquisa", 12);


        $label_options = array("" => "Todos", "S" => "Ativo", "N" => "Inativo");
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
    function ExportarCategoria()
    {

        $formato = UrlAmigavel::PegaParametro("formato");
        $result = CategoriaModel::PesquisaCategoria();
        $i = 0;
        foreach ($result as $value) {
            $res[$i]['id_categoria'] = $value['id_categoria'];
            $res[$i]['nome'] = $value['nome'];
            $i++;
        }
        $Colunas = array('Código', 'Categoria');
        $exporta = new Exportacao($formato, "Relatório de Categorias");
        // $exporta->setPapelOrientacao("paisagem");
        $exporta->setColunas($Colunas);
        $exporta->setConteudo($res);
        $exporta->GeraArquivo();

    }


}

?>
   