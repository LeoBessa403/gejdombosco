<div class="main-content">
        <div class="container">
                    <div class="row">
                                  <div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-grid-6"></i>
									<a href="#">
										Livros
									</a>
								</li>
								<li class="active">
									Listar
								</li>
								
							</ol>
							<div class="page-header">
								<h1>Livros <small>Listar Livros</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
                            <div class="row">
					<div class="col-md-12">
                                                <div class="panel panel-default">
                                                                <div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Livros da Biblioteca
								</div>
								<div class="panel-body">    
                                                                    <!--MODAL DE CÓDIGOS DO LIVRO-->
                                                                    <div class="modal in modal-overflow fade" id="Codigo" tabindex="-1" role="dialog" aria-hidden="true">
                                                                            <div class="modal-header btn-primary">
                                                                                    <h4 class="modal-title">Códigos do Livro</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <ul id="codigos_livro"></ul>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                    <button class="btn btn-danger" data-dismiss="modal">
                                                                                            Fechar
                                                                                    </button>
                                                                            </div>
                                                                    </div>
                                                                    
                                                                        <?php
                                                                            Modal::load(); 
                                                                            Modal::deletaRegistro("Biblioteca");
                                                                            Modal::confirmacao("confirma_Biblioteca");
                                                                            Modal::Foto();
                                                                            $arrColunas = array('Título','Autor','Editora','Publicação','Ações');
                                                                            $grid = new Grid();
                                                                            $grid->setColunasIndeces($arrColunas);
                                                                            $grid->criaGrid();
                                                                            foreach ($result as $res): 
                                                                            $acao = '';
                                                                                    $acao .= '<a data-toggle="modal" role="button" class="btn btn-med-grey fotos" id="'.$res['co_livro'].'" 
                                                                                                   href="#Foto" title="'.$res['no_titulo'].'" data-placement="top">
                                                                                                    <i class="fa fa-camera"></i>
                                                                                                </a>
                                                                                                <a href="'.PASTAADMIN.'Biblioteca/CadastroLivro/'.Valida::GeraParametro("liv/".$res['co_livro']).'" class="btn btn-primary tooltips" 
                                                                                                   data-original-title="Editar Registro" data-placement="top">
                                                                                                    <i class="fa fa-clipboard"></i>
                                                                                                </a>
                                                                                                <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'.$res['co_livro'].'" 
                                                                                                   href="#Biblioteca" data-original-title="Excluir Registro" data-placement="top">
                                                                                                    <i class="fa fa-trash-o"></i>
                                                                                                </a>
                                                                                                <a data-toggle="modal" role="button" class="btn btn-info tooltips codigo_livro" id="'.$res['co_livro'].'" 
                                                                                                   href="#Codigo" data-original-title="Códigos do Livro" data-placement="top">
                                                                                                    <i class="clip-barcode"></i>
                                                                                                </a>';
                                                                                $grid->setColunas($res['no_titulo']);
                                                                                $grid->setColunas($res['no_autor']);
                                                                                $grid->setColunas($res['no_editora']);
                                                                                $grid->setColunas($res['nu_ano_publicacao']);
                                                                                $grid->setColunas($acao,4);
                                                                                $grid->criaLinha($res['co_livro']);
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