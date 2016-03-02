<div class="main-content">
        <div class="container">
                    <div class="row">
                                  <div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-grid-6"></i>
									<a href="#">
										Membros
									</a>
								</li>
								<li class="active">
									Listar
								</li>
								
							</ol>
							<div class="page-header">
								<h1>Participantes <small>Listar membros</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
                            <div class="row">
					<div class="col-md-12">
                                                    <div class="panel panel-default">
                                                                <div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Membros
								</div>
								<div class="panel-body">    
                                                                        <?php
                                                                            Modal::load(); 
                                                                            Modal::deletaRegistro("Membros");
                                                                            Modal::confirmacao("confirma_Membro");
                                                                            
                                                                            $arrColunas = array('Nome','Nascimento','Telefone','Ações');
                                                                            $grid = new Grid();
                                                                            $grid->setColunasIndeces($arrColunas);
                                                                            $grid->criaGrid();
                                                                             
                                                                            foreach ($result as $res): 
                                                                                $acao = '<a href="'.PASTAADMIN.'Membros/CadastroMembros/'.Valida::GeraParametro("memb/".$res['co_membro']).'" class="btn btn-primary tooltips" 
                                                                                               data-original-title="Visualizar Registro" data-placement="top">
                                                                                                <i class="fa fa-clipboard"></i>
                                                                                            </a>
                                                                                            <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'.$res['co_membro'].'" 
                                                                                               href="#Membros" data-original-title="Excluir Registro" data-placement="top">
                                                                                                <i class="fa fa-trash-o"></i>
                                                                                            </a>';
                                                                                $grid->setColunas(strtoupper($res['no_membro']));
                                                                                $grid->setColunas(Valida::DataShow($res['dt_nascimento'], "d/m/Y"));
                                                                                $grid->setColunas($res['nu_tel1']);
                                                                                $grid->setColunas($acao,2);
                                                                                $grid->criaLinha($res['co_membro']);
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