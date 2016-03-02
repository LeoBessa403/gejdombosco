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
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-calendar"></i>
									AGENDA GEJ
								</div>
								<div class="panel-body">
                                                                        <div class="col-sm-12" style="margin-top: 15px;">
										<div id='calendar'></div>
									</div>
								</div>
							</div>
							<!-- end: FULL CALENDAR PANEL -->
                                            </div>
                                            <!-- end: PAGE CONTENT-->
                                            <div class="col-md-6">
                                                    <div class="panel panel-default">
                                                                <div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									TAREFAS DOS EVENTOS
								</div>
								<div class="panel-body">    
                                                                    <div>
                                                                        <h4>LEGENDA</h4>
                                                                        <span class="label label-warning"><i class="fa fa-exclamation-triangle"></i> NÃO INICIADA</span>
                                                                        <span class="label label-info"><i class="fa fa-info-circle"></i> EM ANDAMENTO</span>
                                                                        <span class="label label-success"><i class="fa fa-check-circle"></i> CONCLUIDA</span>
                                                                        <span class="label label-danger"><i class="fa fa-times-circle"></i> INATIVA</span>
                                                                    </div>
                                                                    <br/>
                                                                        <?php
                                                                            Modal::load(); 
                                                                            Modal::deletaRegistro("Tarefa");
                                                                            Modal::confirmacao("confirma_Tarefa");
                                                                            Modal::Foto();
                                                                            $arrColunas = array('Título','Prioridade','Status','Data Inicio','Data Fim','Evento','Ações');
                                                                            $grid = new Grid();
                                                                            $grid->setColunasIndeces($arrColunas);
                                                                            $grid->criaGrid();
                                                                             
                                                                            foreach ($resultTarefa as $res): 
                                                                                $acao = '<a href="'.PASTAADMIN.'Tarefa/DetalharTarefa/'.Valida::GeraParametro("taf/".$res['co_tarefa']).'" class="btn btn-dark-grey tooltips" 
                                                                                               data-original-title="Detalhar Registro" data-placement="top">
                                                                                                <i class="clip-book"></i>
                                                                                            </a>';
                                                                                $grid->setColunas($res['ds_titulo']);
                                                                                $grid->setColunas(FuncoesSistema::StatusPrioridade($res['st_prioridade']));
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
				</div>
			</div>
            </div>