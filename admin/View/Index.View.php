<div class="main-content">
				<!-- end: SPANEL CONFIGURATION MODAL FORM -->
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-home-3"></i>
									<a href="#">
										Início
									</a>
								</li>
							</ol>
							<div class="page-header">
								<h1>Recados Importantes <small>Agenda e Tarefas</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
                                        <div class="row"></div>
					
                                            <div class="col-md-6">
                                                <div>
                                                    <h4>LEGENDA</h4>
                                                    <span class="label label-warning"><i class="fa fa-exclamation-triangle"></i> NÃO INICIADA</span>
                                                    <span class="label label-info"><i class="fa fa-info-circle"></i> EM ANDAMENTO</span>
                                                    <span class="label label-success"><i class="fa fa-check-circle"></i> CONCLUIDA</span>
                                                    <span class="label label-danger"><i class="fa fa-times-circle"></i> INATIVA</span>
                                                </div>
                                                <br/>
                                                    <div class="panel panel-default">
                                                                <div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									TAREFAS DOS EVENTOS
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
                                                                             
                                                                            foreach ($resultTarefa as $res): 
                                                                                $acao = '<a href="'.PASTAADMIN.'Tarefa/DetalharTarefa/'.Valida::GeraParametro("taf/".$res['co_tarefa']).'" class="btn btn-dark-grey tooltips" 
                                                                                               data-original-title="Detalhar Registro" data-placement="top">
                                                                                                <i class="clip-book"></i>
                                                                                            </a>';
                                                                                $grid->setColunas($res['ds_titulo']);
                                                                                $grid->setColunas(FuncoesSistema::StatusTarefa($res['st_status']));
                                                                                $grid->setColunas(Valida::DataShow($res['dt_inicio'],"d/m/Y"));
                                                                                $grid->setColunas(Valida::DataShow($res['dt_fim'],"d/m/Y"));
                                                                                $grid->setColunas($res['no_evento']);
                                                                                $grid->setColunas($acao,1);
                                                                                $grid->criaLinha($res['co_tarefa']);
                                                                            endforeach;
                                                                           
                                                                            $grid->finalizaGrid();
                                                                        ?>
                                                                 </div>
							</div>
							<!-- end: DYNAMIC TABLE PANEL -->
						</div>
                                            
                                                <div class="col-md-6">
                                                    <div class="panel panel-default">
                                                                <div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									AGENDA
								</div>
								<div class="panel-body">    
                                                                        <?php
                                                                            Modal::load(); 
                                                                            Modal::deletaRegistro("Evento");
                                                                            Modal::confirmacao("confirma_Evento");
                                                                            Modal::Foto();
                                                                            $arrColunas = array('Capa','Evento','Realizado em','Local','Ações');
                                                                            $grid = new Grid();
                                                                            $grid->setColunasIndeces($arrColunas);
                                                                            $grid->criaGrid();
                                                                             
//                                                                            foreach ($result as $res): 
//                                                                                $acao = '<a href="'.PASTAADMIN.'evento/CadastroEvento/'.Valida::GeraParametro("eve/".$res['co_evento']).'" class="btn btn-primary tooltips" 
//                                                                                               data-original-title="Editar Registro" data-placement="top">
//                                                                                                <i class="fa fa-clipboard"></i>
//                                                                                            </a>
//                                                                                            <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'.$res['co_evento'].'" 
//                                                                                               href="#Evento" data-original-title="Excluir Registro" data-placement="top">
//                                                                                                <i class="fa fa-trash-o"></i>
//                                                                                            </a>';
//                                                                             $acao .= ' <a data-toggle="modal" role="button" class="btn btn-med-grey fotos" id="'.$res['co_evento'].'" 
//                                                                                                   href="#Foto" title="'.$res['no_evento'].'" data-placement="top">
//                                                                                                    <i class="fa fa-camera"></i>
//                                                                                                </a>';
//                                                                                $grid->setColunas(strtoupper($res['co_foto_capa']));
//                                                                                $grid->setColunas(strtoupper($res['no_evento']));
//                                                                                $grid->setColunas(Valida::DataShow($res['dt_realizado'],"d/m/Y"));
//                                                                                $grid->setColunas($res['ds_local']);
//                                                                                $grid->setColunas($acao,3);
//                                                                                $grid->criaLinha($res['co_evento']);
//                                                                            endforeach;
                                                                           
                                                                            $grid->finalizaGrid();
                                                                        ?>
                                                                 </div>
							</div>
                                        
                                        
                                        </div>
                                        <!-- end: PAGE CONTENT-->
				</div>
			</div>