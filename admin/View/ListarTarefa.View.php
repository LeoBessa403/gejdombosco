<div class="main-content">
        <div class="container">
                    <div class="row">
                                  <div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-grid-6"></i>
									<a href="#">
										Tarefas
									</a>
								</li>
								<li class="active">
									Listar
								</li>
								
							</ol>
							<div class="page-header">
								<h1>Tarefas <small>Listar Tarefas</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
                            <div class="row">
					<div class="col-md-12">
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
									Tarefas dos Eventos
								</div>
								<div class="panel-body">    
                                                                        <?php
                                                                            Modal::load(); 
                                                                            Modal::deletaRegistro("Tarefa");
                                                                            Modal::confirmacao("confirma_Tarefa");
                                                                            Modal::Foto();
                                                                            $Operfil = new PerfisAcesso();
                                                                            $arrColunas = array('Título','Status','Data Inicio','Data Fim','Evento','Ações');
                                                                            $grid = new Grid();
                                                                            $grid->setColunasIndeces($arrColunas);
                                                                            $grid->criaGrid();
                                                                            foreach ($result as $res): 
                                                                            $acao = '';
                                                                                if($res['co_perfil'] != $Operfil->PerfilInicial):
                                                                                    $acao .= '<a href="'.PASTAADMIN.'Tarefa/CadastroTarefa/'.Valida::GeraParametro("taf/".$res['co_tarefa']).'" class="btn btn-primary tooltips" 
                                                                                                   data-original-title="Editar Registro" data-placement="top">
                                                                                                    <i class="fa fa-clipboard"></i>
                                                                                                </a>
                                                                                                ';
                                                                                endif;
                                                                                
                                                                                    $acao .= '<a href="'.PASTAADMIN.'Tarefa/DetalharTarefa/'.Valida::GeraParametro("taf/".$res['co_tarefa']).'" class="btn btn-dark-grey tooltips" 
                                                                                                   data-original-title="Detalhar Registro" data-placement="top">
                                                                                                    <i class="clip-book"></i>
                                                                                                </a>';
                                                                                    $botoes = 2;        
                                                                                if(Valida::ValPerfil("ExcluirTarefa")):
                                                                                    $acao .= ' '
                                                                                        . '<a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'.$res['co_tarefa'].'" 
                                                                                                   href="#Tarefa" data-original-title="Excluir Registro" data-placement="top">
                                                                                                    <i class="fa fa-trash-o"></i>
                                                                                                </a>';
                                                                                    $botoes = 3;            
                                                                                endif;            
                                                                                $grid->setColunas($res['ds_titulo']);
                                                                                $grid->setColunas(FuncoesSistema::StatusTarefa($res['st_status']));
                                                                                $grid->setColunas(Valida::DataShow($res['dt_inicio'],"d/m/Y"));
                                                                                $grid->setColunas(Valida::DataShow($res['dt_fim'],"d/m/Y"));
                                                                                $grid->setColunas($res['no_evento']);
                                                                                $grid->setColunas($acao,$botoes);
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