<?php

class Index
{

    function Index()
    {
    }

    function Registrar()
    {
        $id = "CadastroUsuario";
        if (!empty($_POST[$id])):

            $EnderecoModel = new EnderecoModel();
            $ContatoModel = new ContatoModel();
            $PessoaModel = new PessoaModel();
            $UsuarioModel = new UsuarioModel();
            $ImagemModel = new ImagemModel();
            $session = new Session();
            $dados = $_POST;

            $endereco[Constantes::DS_ENDERECO] = $dados[Constantes::DS_ENDERECO];
            $endereco[Constantes::DS_COMPLEMENTO] = $dados[Constantes::DS_COMPLEMENTO];
            $endereco[Constantes::DS_BAIRRO] = $dados[Constantes::DS_BAIRRO];
            $endereco[Constantes::NO_CIDADE] = $dados[Constantes::NO_CIDADE];
            $endereco[Constantes::NU_CEP] = Valida::RetiraMascara($dados[Constantes::NU_CEP]);
            $endereco[Constantes::SG_UF] = $dados[Constantes::SG_UF][0];

            $pessoa[Constantes::CO_ENDERECO] = $EnderecoModel->Salva($endereco);


            $contato[Constantes::DS_EMAIL] = trim($dados[Constantes::DS_EMAIL]);
            $contato[Constantes::NU_TEL1] = Valida::RetiraMascara($dados[Constantes::NU_TEL1]);
            $contato[Constantes::NU_TEL2] = Valida::RetiraMascara($dados[Constantes::NU_TEL2]);

            $pessoa[Constantes::CO_CONTATO] = $ContatoModel->Salva($contato);


            $pessoa[Constantes::NO_PESSOA] = trim($dados[Constantes::NO_PESSOA]);
            $pessoa[Constantes::NU_CPF] = Valida::RetiraMascara($dados[Constantes::NU_CPF]);
            $pessoa[Constantes::NU_RG] = Valida::RetiraMascara($dados[Constantes::NU_RG]);
            $pessoa[Constantes::DT_NASCIMENTO] = Valida::DataDB($dados[Constantes::DT_NASCIMENTO]);
            $pessoa[Constantes::ST_SEXO] = $dados[Constantes::ST_SEXO][0];
            $pessoa[Constantes::DT_CADASTRO] = Valida::DataAtualBanco();

            $usuario[Constantes::CO_PESSOA] = $PessoaModel->Salva($pessoa);


            if ($_FILES[Constantes::DS_CAMINHO]["tmp_name"]):
                $foto = $_FILES[Constantes::DS_CAMINHO];
                $nome = Valida::ValNome($dados[Constantes::NO_PESSOA]);
                $up = new Upload();
                $up->UploadImagens($foto, $nome, "usuarios");
                $imagem[Constantes::DS_CAMINHO] = $up->getNameImage();

                $usuario[Constantes::CO_IMAGEM] = $ImagemModel->Salva($imagem);
            endif;


            $usuario[Constantes::DS_SENHA] = $dados[Constantes::DS_SENHA];
            $usuario[Constantes::DS_CODE] = base64_encode(base64_encode($dados[Constantes::DS_SENHA]));
            $usuario[Constantes::ST_STATUS] = 'I';
            $usuario[Constantes::DT_CADASTRO] = Valida::DataAtualBanco();

            $co_usuario = $UsuarioModel->Salva($usuario);
            $session->setSession(CADASTRADO, "OK");
        endif;

        $this->form = UsuarioForm::Cadastrar();
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
   