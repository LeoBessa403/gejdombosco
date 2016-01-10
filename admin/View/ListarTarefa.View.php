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
                                                                            Modal::deletaRegistro("Tarefa");
                                                                            Modal::confirmacao("confirma_Tarefa");
                                                                            Modal::Foto();
                                                                            $arrColunas = array('Título','Status','Data Inicio','Data Fim','Evento','Ações');
                                                                            $grid = new Grid();
                                                                            $grid->setColunasIndeces($arrColunas);
                                                                            $grid->criaGrid();
                                                                             
                                                                            foreach ($result as $res): 
                                                                                $acao = '<a href="'.PASTAADMIN.'Tarefa/CadastroTarefa/'.Valida::GeraParametro("tar/".$res['co_tarefa']).'" class="btn btn-primary tooltips" 
                                                                                               data-original-title="Editar Registro" data-placement="top">
                                                                                                <i class="fa fa-clipboard"></i>
                                                                                            </a>
                                                                                            <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'.$res['co_tarefa'].'" 
                                                                                               href="#Tarefa" data-original-title="Excluir Registro" data-placement="top">
                                                                                                <i class="fa fa-trash-o"></i>
                                                                                            </a>';
                                                                                $grid->setColunas($res['ds_titulo']);
                                                                                $grid->setColunas($res['st_status']);
                                                                                $grid->setColunas(Valida::DataShow($res['dt_inicio'],"d/m/Y"));
                                                                                $grid->setColunas(Valida::DataShow($res['dt_fim'],"d/m/Y"));
                                                                                $grid->setColunas($res['co_evento']);
                                                                                $grid->setColunas($acao,2);
                                                                                $grid->criaLinha($res['co_tarefa']);
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