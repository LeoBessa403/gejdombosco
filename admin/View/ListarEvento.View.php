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
                                                                            Modal::deletaRegistro("Eventos");
                                                                            Modal::confirmacao("confirma_Eventos");
                                                                            Modal::Foto();
                                                                            $arrColunas = array('Capa','Evento','Realizado em','Local','Ações');
                                                                            $grid = new Grid();
                                                                            $grid->setColunasIndeces($arrColunas);
                                                                            $grid->criaGrid();
                                                                             
                                                                            foreach ($result as $res): 
                                                                                $acao = '<a href="'.PASTAADMIN.'evento/CadastroEvento/'.Valida::GeraParametro("eve/".$res['co_evento']).'" class="btn btn-primary tooltips" 
                                                                                               data-original-title="Editar Registro" data-placement="top">
                                                                                                <i class="fa fa-clipboard"></i>
                                                                                            </a>
                                                                                            <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'.$res['co_evento'].'" 
                                                                                               href="#Evento" data-original-title="Excluir Registro" data-placement="top">
                                                                                                <i class="fa fa-trash-o"></i>
                                                                                            </a>';
                                                                             $acao .= ' <a data-toggle="modal" role="button" class="btn btn-med-grey fotos" id="'.$res['co_evento'].'" 
                                                                                                   href="#Foto" title="'.$res['no_evento'].'" data-placement="top">
                                                                                                    <i class="fa fa-camera"></i>
                                                                                                </a>';
                                                                                $grid->setColunas(strtoupper($res['co_foto_capa']));
                                                                                $grid->setColunas(strtoupper($res['no_evento']));
                                                                                $grid->setColunas(Valida::DataShow($res['dt_realizado'],"d/m/Y"));
                                                                                $grid->setColunas($res['ds_local']);
                                                                                $grid->setColunas($acao,3);
                                                                                $grid->criaLinha($res['co_evento']);
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