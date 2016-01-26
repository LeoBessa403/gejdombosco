<div class="main-content">
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-home-3"></i>
									<a href="<?php echo PASTAADMIN;?>index/index">
										Home
									</a>
								</li>
								<li class="active">
									Funcionalidades do Perfil
								</li>								
							</ol>
							<div class="page-header">
								<h1>Funcionalidades do Perfil<small> Realizar Cadastro e Edição</small></h1>
							</div>
                                                        <p>Perfil: </br>
                                                            <h3 style="font-family: serif; font-style: italic; margin-top: 0; padding-top: 0;">
                                                                <?php echo $perfil[0]['no_perfil']; ?>
                                                            </h3>
                                                            <div class="col-sm-3">
                                                                <label>
                                                                    <input id='todas' name='todas' type='checkbox' class="todas"/>
                                                                    Todas Funcionalidades
                                                                </label><br><hr> 
                                                            </div> 
                                                        </p>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
                                        <style>
                                            .form-control {height: 25px; width: 100px;}
                                            .valor-apagar{display: none;}
                                        </style>
                                                                    
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
                                                        <?php
                                                            if($result):
                                                                 Valida::Mensagem(Mensagens::OK_SALVO, 1);
                                                            endif;
                                                            if($resultAlt):
                                                                 Valida::Mensagem(Mensagens::OK_ATUALIZADO, 1);
                                                            endif;
                                                        ?>
                                                                        
                                    <div class="row">
                                            
                                        <div class="panel-body">
                                            <form action="<?php echo HOME; ?>admin/Perfil/FuncionalidadesPerfil" role="form" id="funcionalidades-perfil" name="funcionalidades-perfil" method="post"  enctype="multipart/form-data" class="formulario"> 

                                                        
                                            <?php
                                                $bloqueados = array(1,9,10,11);
                                                foreach ($funcionalidade as $func):
                                                    if(!in_array($func["co_funcionalidade"], $bloqueados)):
                                                        $checked = "";
                                                        foreach ($fun_perfil as $value) {
                                                            if($func['co_funcionalidade'] == $value['co_funcionalidade']):
                                                                $checked = "checked";
                                                            endif;
                                                        }
                                            ?>
                                                <div class="col-sm-3">
                                                    <label>
                                                        <input id='fun-<?php echo $func["co_funcionalidade"]; ?>' name='funcionalidades[]' value='<?php echo $func["co_funcionalidade"]; ?>' type='checkbox' class="funcionalidade"  <?php echo $checked; ?> />
                                                         <?php echo $func["no_funcionalidade"]; ?>
                                                    </label><br><hr> 
                                                 </div>    
                                            <?php
                                                    endif;
                                                 endforeach;
                                            ?>
                                                
                                                <div class="col-sm-12">
                                                    <button data-style="zoom-out" class="btn btn-success ladda-button" type="submit" value="funcionalidades-perfil" name="funcionalidades-perfil" style="margin-top: 10px;">
                                                         <span class="ladda-label"> Salvar </span>
                                                         <i class="fa fa-save"></i>
                                                         <span class="ladda-spinner"></span>
                                                    </button>
                                                    <button data-style="expand-right" class="btn btn-danger ladda-button" type="reset" style="margin-top: 10px;">
                                                         <span class="ladda-label"> Limpar </span>
                                                         <i class="fa fa-ban"></i>
                                                         <span class="ladda-spinner"></span>
                                                    </button>
                                                    <input id="id_credenciado" name="co_perfil" value="<?php echo $co_perfil; ?>" type="hidden" />
                                                 </form>
                                               </div> 
                                          </div>
                                            
                                    </div>
                                    <!-- end: PAGE CONTENT-->
				</div>
			</div>