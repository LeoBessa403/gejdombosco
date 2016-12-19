<?php

class Usuario
{

    public function Index()
    {
    }

    public function MeuPerfilUsuario()
    {
        $us = $_SESSION[SESSION_USER];
        $user = $us->getUser();
        $this->idUsuario = $user[md5(Constantes::CO_USUARIO)];
        $this->CadastroUsuario(true);
        UrlAmigavel::$action = "CadastroUsuario";
    }

    public function CadastroUsuario($meuPerfil = false)
    {
        $id = "CadastroUsuario";

        if (!empty($_POST[$id])):
            $this->salvaUsuario($_POST, $_FILES);
        endif;

        $idCoUsuario = UrlAmigavel::PegaParametro("usu");
        if ($meuPerfil):
            $idCoUsuario = $this->idUsuario;
        endif;
        $res = array();
        if ($idCoUsuario):
            $usuarioModel = new UsuarioModel();
            /** @var UsuarioEntidade $usuario */
            $usuario = $usuarioModel->PesquisaUmQuando([Constantes::CO_USUARIO => $idCoUsuario]);
            $res['ds_senha_confirma'] = $usuario->getDsSenha();
            $res[Constantes::DS_SENHA] = $usuario->getDsSenha();
            if ($usuario->getCoImagem()->getDsCaminho()):
                $res[Constantes::DS_CAMINHO] = "usuarios/" . $usuario->getCoImagem()->getDsCaminho();
            endif;
            $res[Constantes::CO_USUARIO] = $usuario->getCoUsuario();
            $res[Constantes::NO_PESSOA] = $usuario->getCoPessoa()->getNoPessoa();
            $res[Constantes::DS_EMAIL] = $usuario->getCoPessoa()->getCoContato()->getDsEmail();
            $res[Constantes::ST_SEXO] = $usuario->getCoPessoa()->getStSexo();
            $res[Constantes::ST_STATUS] = $usuario->getStStatus();

            $res[Constantes::NU_CPF] = $usuario->getCoPessoa()->getNuCpf();
            $res[Constantes::NU_RG] = $usuario->getCoPessoa()->getNuRg();
            $res[Constantes::DT_NASCIMENTO] = Valida::DataShow($usuario->getCoPessoa()->getDtNascimento());
            $res[Constantes::NU_TEL1] = $usuario->getCoPessoa()->getCoContato()->getNuTel1();
            $res[Constantes::NU_TEL2] = $usuario->getCoPessoa()->getCoContato()->getNuTel2();

            $res[Constantes::DS_ENDERECO] = $usuario->getCoPessoa()->getCoEndereco()->getDsEndereco();
            $res[Constantes::DS_COMPLEMENTO] = $usuario->getCoPessoa()->getCoEndereco()->getDsComplemento();
            $res[Constantes::DS_BAIRRO] = $usuario->getCoPessoa()->getCoEndereco()->getDsBairro();
            $res[Constantes::NO_CIDADE] = $usuario->getCoPessoa()->getCoEndereco()->getNoCidade();
            $res[Constantes::NU_CEP] = $usuario->getCoPessoa()->getCoEndereco()->getNuCep();
            $res[Constantes::SG_UF] = $usuario->getCoPessoa()->getCoEndereco()->getSgUf();
        endif;


        $this->form = UsuarioForm::Cadastrar($res);
    }

    public function salvaUsuario($dados, $foto, $resgistrar = false)
    {
        $EnderecoModel = new EnderecoModel();
        $ContatoModel = new ContatoModel();
        $PessoaModel = new PessoaModel();
        $UsuarioModel = new UsuarioModel();
        $ImagemModel = new ImagemModel();
        $UsuarioPerfilModel = new UsuarioPerfilModel();
        $session = new Session();

        $idCoUsuario = (isset($dados[Constantes::CO_USUARIO]) ? $dados[Constantes::CO_USUARIO] : null);

        $endereco[Constantes::DS_ENDERECO] = $dados[Constantes::DS_ENDERECO];
        $endereco[Constantes::DS_COMPLEMENTO] = $dados[Constantes::DS_COMPLEMENTO];
        $endereco[Constantes::DS_BAIRRO] = $dados[Constantes::DS_BAIRRO];
        $endereco[Constantes::NO_CIDADE] = $dados[Constantes::NO_CIDADE];
        $endereco[Constantes::NU_CEP] = Valida::RetiraMascara($dados[Constantes::NU_CEP]);
        $endereco[Constantes::SG_UF] = $dados[Constantes::SG_UF][0];

        $contato[Constantes::DS_EMAIL] = trim($dados[Constantes::DS_EMAIL]);
        $contato[Constantes::NU_TEL1] = Valida::RetiraMascara($dados[Constantes::NU_TEL1]);
        $contato[Constantes::NU_TEL2] = Valida::RetiraMascara($dados[Constantes::NU_TEL2]);

        $pessoa[Constantes::NO_PESSOA] = trim($dados[Constantes::NO_PESSOA]);
        $pessoa[Constantes::NU_CPF] = Valida::RetiraMascara($dados[Constantes::NU_CPF]);
        $pessoa[Constantes::NU_RG] = Valida::RetiraMascara($dados[Constantes::NU_RG]);
        $pessoa[Constantes::DT_NASCIMENTO] = Valida::DataDBDate($dados[Constantes::DT_NASCIMENTO]);
        $pessoa[Constantes::ST_SEXO] = $dados[Constantes::ST_SEXO][0];

        $usu[Constantes::DS_SENHA] = $dados[Constantes::DS_SENHA];
        $usu[Constantes::DS_CODE] = base64_encode(base64_encode($dados[Constantes::DS_SENHA]));
        if (!empty($dados[Constantes::ST_STATUS])):
            $usu[Constantes::ST_STATUS] = "A";
        else:
            $usu[Constantes::ST_STATUS] = "I";
        endif;

        $user[Constantes::NO_PESSOA] = $pessoa[Constantes::NO_PESSOA];
        /** @var PessoaEntidade $userNome */
        $userNome = $PessoaModel->PesquisaUmQuando($user);
        $email[Constantes::DS_EMAIL] = $contato[Constantes::DS_EMAIL];
        /** @var ContatoEntidade $userEmail */
        $userEmail = $ContatoModel->PesquisaUmQuando($email);
        $cpf[Constantes::NU_CPF] = $pessoa[Constantes::NU_CPF];
        /** @var PessoaEntidade $userCpf */
        $userCpf = $PessoaModel->PesquisaUmQuando($cpf);

        $this->erro = false;
        if ($userNome && $userNome->getCoUsuario()->getCoUsuario() != $idCoUsuario):
            $Campo[] = "Nome do Usuário";
            $this->erro = true;
        endif;
        if ($userEmail && $userEmail->getCoPessoa()->getCoUsuario()->getCoUsuario() != $idCoUsuario):
            $Campo[] = "E-mail";
            $this->erro = true;
        endif;
        if ($userCpf && $userCpf->getCoUsuario()->getCoUsuario() != $idCoUsuario):
            $Campo[] = "CPF";
            $this->erro = true;
        endif;
        
        if ($this->erro):
            $session->setSession(MENSAGEM, "Já exite usuário cadastro com o mesmo "
                . implode(", ", $Campo) . ", Favor Verificar.");
        else:

            $imagem[Constantes::DS_CAMINHO] = "";
            if ($foto[Constantes::DS_CAMINHO]["tmp_name"]):
                $foto = $_FILES[Constantes::DS_CAMINHO];
                $nome = Valida::ValNome($dados[Constantes::NO_PESSOA]);
                $up = new Upload();
                $up->UploadImagens($foto, $nome, "usuarios");
                $imagem[Constantes::DS_CAMINHO] = $up->getNameImage();
            endif;


            if ($idCoUsuario):
                /** @var UsuarioEntidade $usuario */
                $usuario = $UsuarioModel->PesquisaUmQuando([Constantes::CO_USUARIO => $idCoUsuario]);

                if ($usuario->getCoImagem()->getDsCaminho()):
                    if (is_file(Upload::$BaseDir . "usuarios/" . $usuario->getCoImagem()->getDsCaminho())):
                        unlink(Upload::$BaseDir . "usuarios/" . $usuario->getCoImagem()->getDsCaminho());
                    endif;
                endif;

                $ImagemModel->Salva($imagem, $usuario->getCoImagem()->getCoImagem());
                $ContatoModel->Salva($contato, $usuario->getCoPessoa()->getCoContato()->getCoContato());
                $EnderecoModel->Salva($endereco, $usuario->getCoPessoa()->getCoEndereco()->getCoEndereco());
                $PessoaModel->Salva($pessoa, $usuario->getCoPessoa()->getCoPessoa());
                $UsuarioModel->Salva($usu, $idCoUsuario);
                $usuarioPerfil[Constantes::CO_USUARIO] = $idCoUsuario;
                $ok = $UsuarioPerfilModel->DeletaQuando($usuarioPerfil);
                if ($ok):
                    foreach ($dados['ds_perfil'] as $perfil) {
                        $usuarioPerfil[Constantes::CO_PERFIL] = $perfil;
                        $UsuarioPerfilModel->Salva($usuarioPerfil);
                    }
                endif;

                $session->setSession(ATUALIZADO, "OK");
            else:
                $pessoa[Constantes::DT_CADASTRO] = Valida::DataAtualBanco();
                $usu[Constantes::DT_CADASTRO] = Valida::DataAtualBanco();

                $pessoa[Constantes::CO_ENDERECO] = $EnderecoModel->Salva($endereco);
                $pessoa[Constantes::CO_CONTATO] = $ContatoModel->Salva($contato);
                $usuario[Constantes::CO_IMAGEM] = $ImagemModel->Salva($imagem);
                $usuario[Constantes::CO_PESSOA] = $PessoaModel->Salva($pessoa);
                $usuarioPerfil[Constantes::CO_USUARIO] = $UsuarioModel->Salva($usuario);

                // REGISTRAR ///
                if ($resgistrar):
                    $usuarioPerfil[Constantes::CO_PERFIL] = 3;
                    $usuPerfil = $UsuarioPerfilModel->Salva($usuarioPerfil);
                else:
                    foreach ($dados['ds_perfil'] as $perfil) {
                        $usuarioPerfil[Constantes::CO_PERFIL] = $perfil;
                        $UsuarioPerfilModel->Salva($usuarioPerfil);
                    }
                endif;

                $session->setSession(CADASTRADO, "OK");
            endif;

//            if ($idUsuario):
//                $email = new Email();
//
//                // Índice = Nome, e Valor = Email.
//                $emails = array(
//                    $dados['no_pessoa'] => $dados['ds_email']
//                );
//                $Mensagem = "<h2>Seu cadastro foi realizado com sucesso</h2><br/>"
//                    . "Aguarde a Ativação do seu Usuário " . $dados['ds_login'];
//
//                $email->setEmailDestinatario($emails)
//                    ->setTitulo("Email de  Teste Pra Todos")
//                    ->setMensagem($Mensagem);
//
//                //Variável para validação de Emails Enviados com Sucesso.
//                $EmailEnviado = $email->Enviar();
//
//                $this->result = true;
//            endif;
        endif;
    }


    public function ListarUsuario()
    {
        $perfilControl = new Perfil();
        $dados = array();
        if (!empty($_POST)):
            $dados = array(
                'no_pessoa' => $_POST['no_pessoa']
            );
        endif;
        $usuarioModel = new UsuarioModel();
        $this->result = $usuarioModel->PesquisaTodos($dados);
        /** @var UsuarioEntidade $value */
        foreach ($this->result as $value):
            $this->perfis[$value->getCoUsuario()] = implode(', ', $perfilControl->montaComboPerfil($value));
        endforeach;
    }

    // AÇÃO DE EXPORTAÇÃO
    public function ExportarListarUsuario()
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

    public function ListarUsuarioPesquisaAvancada()
    {

        $id = "pesquisaUsuario";

        $formulario = new Form($id, "admin/Usuario/ListarUsuario", "Pesquisa", 12);

        $formulario
            ->setId("no_pessoa")
            ->setIcon("clip-user-6")
            ->setLabel("Nome do Usuario")
            ->setInfo("Pode ser Parte do nome")
            ->CriaInpunt();

        echo $formulario->finalizaFormPesquisaAvancada();

    }

}

?>
   