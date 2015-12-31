<div class="main-content">
        <div class="container">
                    <div class="row">
                                  <div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-grid-6"></i>
									<a href="#">
										Membros Retiro
									</a>
								</li>
								<li class="active">
									Listar
								</li>
								
							</ol>
							<div class="page-header">
								<h1>Membros Retiro <small>Listar Membros</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
                            <div class="row">
					<div class="col-md-12">
                                                    <div class="panel panel-default">
                                                                <div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Membros Retiro
								</div>
								<div class="panel-body">    
                                                                        <?php
                                                                            Modal::load(); 
                                                                            Modal::deletaRegistro("MembrosRetiro");
                                                                            Modal::confirmacao("confirma_MembrosRetiro");
                                                                            $arrColunas = array('Nome','Camisa','Pago','Nascimento','Telefone','Referência','Tel. Referência','Ações');
                                                                            $grid = new Grid();
                                                                            $grid->setColunasIndeces($arrColunas);
                                                                            $grid->criaGrid();
                                                                            $acao = "";
                                                                             
                                                                            foreach ($result as $res): 
                                                                                if(Valida::ValPerfil("EditarMembro")):
                                                                                    $acao = '<a href="'.PASTAADMIN.'Membros/EditarMembro/'.Valida::GeraParametro("mem/".$res['co_membro_retiro']).'" class="btn btn-primary tooltips" 
                                                                                                   data-original-title="Editar Registro" data-placement="top">
                                                                                                    <i class="fa fa-clipboard"></i>
                                                                                                </a>
                                                                                                <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'.$res['co_membro_retiro'].'" 
                                                                                                   href="#MembrosRetiro" data-original-title="Excluir Registro" data-placement="top">
                                                                                                    <i class="fa fa-trash-o"></i>
                                                                                                </a>';
                                                                                endif;
                                                                                $grid->setColunas(strtoupper($res['no_membro']));
                                                                                $grid->setColunas(strtoupper(FuncoesSistema::TamanhoCamisa($res['nu_camisa'])));
                                                                                $grid->setColunas(FuncoesSistema::SituacaoSimNao($res['st_pagamento']));
                                                                                $grid->setColunas(Valida::DataShow($res['dt_nascimento'],"d/m/Y"));
                                                                                $grid->setColunas($res['nu_tel1']);
                                                                                $grid->setColunas($res['no_responsavel']);
                                                                                $grid->setColunas($res['nu_tel_responsavel']);
                                                                                $grid->setColunas($acao,2);
                                                                                $grid->criaLinha($res['co_membro_retiro']);
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