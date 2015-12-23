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
                                                                            Modal::deletaRegistro("Usuario");
                                                                            Modal::confirmacao("confirma_Usuario");
                                                                            
                                                                            $arrColunas = array('Nome','Login','Perfil','Situação','Ações');
                                                                            $grid = new Grid();
                                                                            $grid->setColunasIndeces($arrColunas);
                                                                            $grid->criaGrid();
                                                                            
                                                                             
                                                                            foreach ($result as $res): 
                                                                                $perfil = explode(",", $res['ds_perfil']);
                                                                                $controle = false;
                                                                                $perfis = "";
                                                                                foreach ($perfil as $value) {
                                                                                    if($controle):
                                                                                        $perfis .= ", ";
                                                                                    endif;
                                                                                    $perfis .= PerfisAcesso::$Perfils[trim($value)];
                                                                                    $controle = true;
                                                                                }
                                                                                $acao = '<a href="'.PASTAADMIN.'Usuario/CadastroUsuario/'.Valida::GeraParametro("usu/".$res['co_usuario']).'" class="btn btn-primary tooltips" 
                                                                                               data-original-title="Visualizar Registro" data-placement="top">
                                                                                                <i class="fa fa-clipboard"></i>
                                                                                            </a>
                                                                                            <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'.$res['co_usuario'].'" 
                                                                                               href="#Usuario" data-original-title="Excluir Registro" data-placement="top">
                                                                                                <i class="fa fa-trash-o"></i>
                                                                                            </a>';
                                                                                $grid->setColunas(strtoupper($res['no_usuario']));
                                                                                $grid->setColunas($res['ds_login']);
                                                                                $grid->setColunas($perfis);
                                                                                $grid->setColunas(FuncoesSistema::SituacaoUsuario($res['st_situacao']));
                                                                                $grid->setColunas($acao,2);
                                                                                $grid->criaLinha($res['co_usuario']);
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