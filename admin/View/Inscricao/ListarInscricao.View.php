<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- start: PAGE TITLE & BREADCRUMB -->
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-grid-6"></i>
                        <a href="#">
                            Inscrições
                        </a>
                    </li>
                    <li class="active">
                        Listar
                    </li>
                </ol>
                <div class="page-header">
                    <h1>Inscrições
                        <small>Listar Inscrições</small>
                    </h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i>
                        Inscrições
                    </div>
                    <div class="panel-body">
                        <?php
                        Modal::load();
                        Modal::deletaRegistro("Inscricao");
                        Modal::confirmacao("confirma_Inscricao");
                        
                        debug($result);

                        $arrColunas = array('Nome', 'CPF', 'Perfil', 'Situação', 'Ações');
                        $grid = new Grid();
                        $grid->setColunasIndeces($arrColunas);
                        $grid->criaGrid();
                        /** @var UsuarioEntidade $res */
                        foreach ($result as $res):
                            if (Valida::ValPerfil('CadastroUsuario')) {
                                $acao = '<a href="' . PASTAADMIN . 'Usuario/CadastroUsuario/'
                                    . Valida::GeraParametro("usu/" . $res->getCoUsuario()) . '" class="btn btn-primary tooltips" 
                                data-original-title="Visualizar Registro" data-placement="top">
                                <i class="fa fa-clipboard"></i>
                                </a>
                                <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'
                                    . $res->getCoUsuario() . '" 
                                   href="#Usuario" data-original-title="Excluir Registro" data-placement="top">
                                    <i class="fa fa-trash-o"></i>
                                </a>';
                            } else {
                                $acao = '';
                            }
                            $grid->setColunas(strtoupper($res->getCoPessoa()->getNoPessoa()));
                            $grid->setColunas(Valida::MascaraCpf($res->getCoPessoa()->getNuCpf()));
                            $grid->setColunas($perfis[$res->getCoUsuario()]);
                            $grid->setColunas(FuncoesSistema::SituacaoUsuario($res->getStStatus()));
                            $grid->setColunas($acao, 2);
                            $grid->criaLinha($res->getCoUsuario());
                        endforeach;
                        $grid->finalizaGrid();
                        ?>
                    </div>
                </div>
                <!-- end: DYNAMIC TABLE PANEL -->
            </div>
        </div>
        <!-- end: PAGE CONTENT-->
    </div>
</div>
<!-- end: PAGE -->