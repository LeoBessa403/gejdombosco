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
        $this->CadastroUsuario();
        UrlAmigavel::$action = "CadastroUsuario";
    }

    public function CadastroUsuario()
    {
        $perfilControl = new Perfil();
        $id = "CadastroUsuario";

        if (!empty($_POST[$id])):
            $this->salvaUsuario($_POST);
        endif;
        if (!$this->idUsuario):
            $this->idUsuario = UrlAmigavel::PegaParametro("usu");
        endif;
        $res = array();
        if ($this->idUsuario):
            $usuarioModel = new UsuarioModel();
            /** @var UsuarioEntidade $usuario */
            $usuario = $usuarioModel->PesquisaUmQuando([Constantes::CO_USUARIO => $this->idUsuario]);
            $label_options_perfis = $perfilControl->montaComboPerfil($usuario);
            $meusPerfis = $perfilControl->montaArrayPerfil($usuario);
            $res[CAMPO_PERFIL] = $meusPerfis;
        endif;
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

        $formulario = new Form($id, "admin/Usuario/CadastroUsuario");
        $formulario->setValor($res);

        $formulario
            ->setId(Constantes::NO_PESSOA)
            ->setClasses("ob nome")
            ->setInfo("O Nome deve ser Completo Mínimo de 10 Caracteres")
            ->setLabel("Nome Completo")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_EMAIL)
            ->setIcon("fa-envelope fa")
            ->setClasses("email ob")
            ->setLabel("Email")
            ->CriaInpunt();

        $label_options = array("" => "Selecione um Sexo", "M" => "Masculino", "F" => "Feminino");
        $formulario
            ->setLabel("Sexo")
            ->setId(Constantes::ST_SEXO)
            ->setType("select")
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_CAMINHO)
            ->setType("singlefile")
            ->setTamanhoInput(8)
            ->setInfo("Caso queira troca de foto")
            ->setLabel("Foto de Perfil")
            ->CriaInpunt();

        $formulario
            ->setId(Constantes::DS_SENHA)
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
        if (in_array(1, $meusPerfis) || in_array(2, $meusPerfis)):

            $formulario
                ->setLabel("Perfis")
                ->setId(CAMPO_PERFIL)
                ->setClasses("multipla")
                ->setTamanhoInput(8)
                ->setInfo("Pode selecionar vários perfis.")
                ->setType("select")
                ->setOptions($label_options_perfis)
                ->CriaInpunt();

            $checked = "";
            if (!empty($res)):
                if ($res[Constantes::ST_STATUS] == "A"):
                    $checked = "checked";
                endif;
            endif;

            $label_options2 = array("Ativo", "Inativo", "verde", "vermelho");
            $formulario
                ->setLabel("Status do Usuário")
                ->setClasses($checked)
                ->setId(Constantes::ST_STATUS)
                ->setInfo("Para Ativar e Desativar Usuários do Sistema.")
                ->setType("checkbox")
                ->setTamanhoInput(4)
                ->setOptions($label_options2)
                ->CriaInpunt();
        else:
            $formulario
                ->setId(Constantes::ST_STATUS)
                ->setClasses("disabilita")
                ->setTamanhoInput(6)
                ->setLabel("Status do Usuário")
                ->CriaInpunt();

            $formulario
                ->setId(CAMPO_PERFIL)
                ->setClasses("disabilita")
                ->setTamanhoInput(6)
                ->setLabel("Perfis")
                ->CriaInpunt();
        endif;

        if ($this->idUsuario):
            $formulario
                ->setType("hidden")
                ->setId(Constantes::CO_USUARIO)
                ->setValues($this->idUsuario)
                ->CriaInpunt();
        endif;

        $this->form = $formulario->finalizaForm();

    }

    public function salvaUsuario($dados)
    {
        $id = "CadastroUsuario";
        $session = new Session();
        $pessoaModel = new PessoaModel();
        $contatoModel = new ContatoModel();
        $imagemModel = new ImagemModel();
        $usuarioModel = new UsuarioModel();

        $dados[Constantes::ST_SEXO] = $dados[Constantes::ST_SEXO][0];
        $dados[Constantes::NO_PESSOA] = trim($dados[Constantes::NO_PESSOA]);
        $dados[Constantes::DS_CODE] = base64_encode(base64_encode($dados[Constantes::DS_SENHA]));
        $idCoUsuario = (isset($dados[Constantes::CO_USUARIO]) ? $dados[Constantes::CO_USUARIO] : null);
        if (!empty($dados[Constantes::ST_STATUS])):
            $dados[Constantes::ST_STATUS] = "A";
        else:
            $dados[Constantes::ST_STATUS] = "I";
        endif;
        unset($dados[$id], $dados["ds_senha_confirma"], $dados[Constantes::CO_USUARIO]);

        $user[Constantes::NO_PESSOA] = $dados[Constantes::NO_PESSOA];
        /** @var PessoaEntidade $userNome */
        $userNome = $pessoaModel->PesquisaUmQuando($user);
        $email[Constantes::DS_EMAIL] = $dados[Constantes::DS_EMAIL];
        /** @var ContatoEntidade $userEmail */
        $userEmail = $contatoModel->PesquisaUmQuando($email);

        $this->erro = false;
        if ($userNome && $userNome->getCoUsuario()->getCoUsuario() != $idCoUsuario):
            $Campo[] = "Nome do Usuário";
            $this->erro = true;
        endif;
        if ($userEmail && $userEmail->getCoPessoa()->getCoUsuario()->getCoUsuario() != $idCoUsuario):
            $Campo[] = "E-mail";
            $this->erro = true;
        endif;

        if ($this->erro):
            $this->mensagem = "Já exite usuário cadastro com o mesmo " . implode(", ", $Campo) . ", Favor Verificar.";
        else:
            if ($_FILES[Constantes::DS_CAMINHO]["tmp_name"]):
                $nome = Valida::ValNome($dados[Constantes::NO_PESSOA]);
                $up = new Upload();
                $up->UploadImagens($_FILES[Constantes::DS_CAMINHO], $nome, "usuarios");
                $dataImagem[Constantes::DS_CAMINHO] = $up->getNameImage();
            endif;
            $dataUsuario[Constantes::DS_SENHA] = $dados[Constantes::DS_SENHA];
            $dataUsuario[Constantes::DS_CODE] = $dados[Constantes::DS_CODE];
            $dataUsuario[Constantes::ST_STATUS] = $dados[Constantes::ST_STATUS];

            $dataPessoa[Constantes::NO_PESSOA] = $dados[Constantes::NO_PESSOA];
            $dataPessoa[Constantes::ST_SEXO] = $dados[Constantes::ST_SEXO];

            $dataContato[Constantes::DS_EMAIL] = $dados[Constantes::DS_EMAIL];

            if ($idCoUsuario):
                /** @var UsuarioEntidade $usuario */
                $usuario = $usuarioModel->PesquisaUmQuando([Constantes::CO_USUARIO, $idCoUsuario]);
                $usuarioModel->Salva($dataUsuario, $idCoUsuario);

                if ($usuario->getCoImagem()->getDsCaminho()):
                    if (is_file(Upload::$BaseDir . "usuarios/" . $usuario->getCoImagem()->getDsCaminho())):
                        unlink(Upload::$BaseDir . "usuarios/" . $usuario->getCoImagem()->getDsCaminho());
                    endif;
                    $imagemModel->Salva($dataImagem, $usuario->getCoImagem()->getCoImagem());
                endif;
                $pessoaModel->Salva($dataPessoa, $usuario->getCoPessoa());
                $contatoModel->Salva($dataContato, $usuario->getCoPessoa()->getCoContato()->getCoContato());

                $session->setSession(ATUALIZADO, "OK");
            else:
                debug('Editar');
//                if ($_FILES[Constantes::DS_CAMINHO]["tmp_name"]):
//                    $dataUsuario[Constantes::CO_IMAGEM] = $imagemModel->Salva($dataImagem);
//                endif;
//
//                $meusPerfis = explode(",", $dados[CAMPO_PERFIL]);
//                unset($dados[CAMPO_PERFIL]);
//                $dados['dt_cadastro'] = Valida::DataAtualBanco();
//
//                $idUsuario = UsuarioModel::CadastraUsuario($dados);
//                foreach ($meusPerfis as $resPerfis):
//                    $userPerfil = array();
//                    $userPerfil[Constantes::USUARIO_CHAVE_PRIMARIA] = $idUsuario;
//                    $userPerfil[Constantes::PERFIL_CHAVE_PRIMARIA] = $resPerfis;
//                    UsuarioModel::CadastraUsuarioPerfil($userPerfil);
//                    $session->setSession(CADASTRADO, "OK");
//                endforeach;
            endif;

            if ($idUsuario):
                $email = new Email();

                // Índice = Nome, e Valor = Email.
                $emails = array(
                    $dados['no_pessoa'] => $dados['ds_email']
                );
                $Mensagem = "<h2>Seu cadastro foi realizado com sucesso</h2><br/>"
                    . "Aguarde a Ativação do seu Usuário " . $dados['ds_login'];

                $email->setEmailDestinatario($emails)
                    ->setTitulo("Email de  Teste Pra Todos")
                    ->setMensagem($Mensagem);

                //Variável para validação de Emails Enviados com Sucesso.
                $EmailEnviado = $email->Enviar();

                $this->result = true;
            endif;
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
   