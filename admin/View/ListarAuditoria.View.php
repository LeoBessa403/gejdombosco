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
                                                                            $arrColunas = array('Operaçao','Tabela','Realizado em','Usuário','Ações');
                                                                            $grid = new Grid();
                                                                            $grid->setColunasIndeces($arrColunas);
                                                                            $grid->criaGrid();
                                                                             
                                                                            foreach ($result as $res): 
                                                                                $acao = '<a href="'.PASTAADMIN.'Auditoria/DetalharAuditoria/'.Valida::GeraParametro("aud/".$res['co_auditoria']).'" class="btn btn-primary tooltips" 
                                                                                               data-original-title="Editar Registro" data-placement="top">
                                                                                                <i class="fa fa-clipboard"></i>
                                                                                            </a>';
                                                                                $tabela = str_replace("tb_", "", $res['no_tabela']); 
                                                                                $tabela = str_replace("_", " ", $tabela);
                                                    
                                                                                $grid->setColunas(FuncoesSistema::OperacaoAuditoria($res['no_operacao']));
                                                                                $grid->setColunas(strtoupper($tabela));
                                                                                $grid->setColunas(Valida::DataShow($res['dt_realizado'],"d/m/Y - H:i:s"));
                                                                                $grid->setColunas(($res['no_usuario'] ? $res['no_usuario'] : 'Via Site'));
                                                                                $grid->setColunas($acao,1);
                                                                                $grid->criaLinha($res['co_auditoria']);
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