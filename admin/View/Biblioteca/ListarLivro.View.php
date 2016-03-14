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
                                                                        <?php
                                                                            Modal::load(); 
                                                                            Modal::deletaRegistro("Livro");
                                                                            Modal::confirmacao("confirma_Livro");
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
                                                                                                <a href="'.PASTAADMIN.'Livro/CadastroLivro/'.Valida::GeraParametro("liv/".$res['co_livro']).'" class="btn btn-primary tooltips" 
                                                                                                   data-original-title="Editar Registro" data-placement="top">
                                                                                                    <i class="fa fa-clipboard"></i>
                                                                                                </a>
                                                                                                <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'.$res['co_livro'].'" 
                                                                                                   href="#Livro" data-original-title="Excluir Registro" data-placement="top">
                                                                                                    <i class="fa fa-trash-o"></i>
                                                                                                </a>';
                                                                                $grid->setColunas($res['no_titulo']);
                                                                                $grid->setColunas($res['no_autor']);
                                                                                $grid->setColunas($res['no_editora']);
                                                                                $grid->setColunas($res['nu_ano_publicacao']);
                                                                                $grid->setColunas($acao,3);
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