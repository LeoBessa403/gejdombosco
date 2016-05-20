<style>
    .btn {position: relative;} 
    .btn .badge{position: absolute; padding: 1px 4px; margin-left: -6px; margin-top: 3px;} 
</style>
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
                                                                    <!--MODAL RESERVA DO LIVRO-->
                                                                    <div class="modal in modal-overflow fade" id="Reserva" tabindex="-1" role="dialog" aria-hidden="true">
                                                                            <div class="modal-header btn-success">
                                                                                    <h4 class="modal-title">Reservar Livro</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <ul id="codigos_livro">Você quer realmente Reservar o Livro <b></b>?</ul>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                    <button aria-hidden="true" data-dismiss="modal" class="btn btn-bricky cancelar">
                                                                                            Fechar
                                                                                    </button>
                                                                                    <button class="btn btn-success" data-dismiss="modal" id="">
                                                                                            OK
                                                                                    </button>
                                                                            </div>
                                                                    </div>
                                                                    <!--MODAL LISTA DE ESPERA DO LIVRO-->
                                                                    <div class="modal in modal-overflow fade" id="ListaEspera" tabindex="-1" role="dialog" aria-hidden="true">
                                                                            <div class="modal-header btn-warning">
                                                                                    <h4 class="modal-title">Lista de Espera</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <ul id="codigos_livro">Você quer entrar na Lista de Espera do Livro <b></b>?</ul>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                    <button aria-hidden="true" data-dismiss="modal" class="btn btn-bricky cancelar">
                                                                                            Fechar
                                                                                    </button>
                                                                                    <button class="btn btn-success" data-dismiss="modal" id="">
                                                                                            OK
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
                                                                            $campos = 2;
                                                                            foreach ($result as $res): 
                                                                                $acao = '<a data-toggle="modal" role="button" class="btn btn-med-grey fotos" id="'.$res['co_livro'].'" 
                                                                                                       href="#Foto" title="'.$res['no_titulo'].'" data-placement="top">
                                                                                                        <i class="fa fa-camera"></i>
                                                                                                    </a>';
                                                                            
                                                                                    if(array_key_exists($res['co_livro'], $livros_disp)): 
                                                                                        $acao .= '  <a data-toggle="modal" role="button" class="btn btn-success tooltips pesquisa_livro Reserva" id="'.$res['co_livro'].'" 
                                                                                                       href="#Reserva" data-original-title="Reservar Livro" data-placement="top">
                                                                                                        <i class="fa fa-book"></i>
                                                                                                        <span class="badge badge-inverse">'.$livros_disp[$res['co_livro']].'</span> 
                                                                                                    </a>';
                                                                                    else:
                                                                                        $acao .= '  <a data-toggle="modal" role="button" class="btn btn-warning tooltips pesquisa_livro ListaEspera" id="'.$res['co_livro'].'" 
                                                                                                       href="#ListaEspera" data-original-title="Lista de Espera" data-placement="top">
                                                                                                        <i class="fa fa-book"></i>
                                                                                                    </a>';
                                                                                    endif;                
                                                                                if(Valida::ValPerfil("GeranciarBiblioteca")):
                                                                                        $acao .= ' <a href="'.PASTAADMIN.'Biblioteca/CadastroLivro/'.Valida::GeraParametro("liv/".$res['co_livro']).'" class="btn btn-primary tooltips" 
                                                                                                       data-original-title="Editar Registro" data-placement="top">
                                                                                                        <i class="fa fa-clipboard"></i>
                                                                                                    </a>
                                                                                                    <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="'.$res['co_livro'].'" 
                                                                                                       href="#Biblioteca" data-original-title="Excluir Registro" data-placement="top">
                                                                                                        <i class="fa fa-trash-o"></i>
                                                                                                    </a>
                                                                                                    <a href="'.PASTAADMIN.'Biblioteca/GerenciarLivro/'.Valida::GeraParametro("liv/".$res['co_livro']).'" class="btn btn-info tooltips" 
                                                                                                       data-original-title="Gerenciar Livro" data-placement="top">
                                                                                                        <i class="fa-gears fa"></i>
                                                                                                    </a>';
                                                                                                    $campos = 5;
                                                                                endif;
                                                                                    $grid->setColunas($res['no_titulo']);
                                                                                    $grid->setColunas($res['no_autor']);
                                                                                    $grid->setColunas($res['no_editora']);
                                                                                    $grid->setColunas($res['nu_ano_publicacao']);
                                                                                    $grid->setColunas($acao,$campos);
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