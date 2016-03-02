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
									Perfis da Funcionalidade
								</li>								
							</ol>
							<div class="page-header">
								<h1>Perfis da Funcionalidade<small> Realizar Cadastro e Edição</small></h1>
							</div>
                                                        <p>Funcionalidade: </br>
                                                            <h3 style="font-family: serif; font-style: italic; margin-top: 0; padding-top: 0;">
                                                                <?php echo $funcionalidade[0]['no_funcionalidade']; ?>
                                                            </h3>
                                                            <div class="col-sm-3">
                                                                <label>
                                                                    <input id='todas' name='todas' type='checkbox' class="todas"/>
                                                                    Todos Perfis
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
                                                    Modal::load();
                                                ?>            
                                    <div class="row">
                                            
                                        <div class="panel-body">
                                            <form action="<?php echo HOME; ?>admin/Funcionalidade/PerfilFuncionalidades" role="form" id="funcionalidades-perfil" name="funcionalidades-perfil" method="post"  enctype="multipart/form-data" class="formulario"> 

                                                        
                                            <?php
                                                $bloqueados = array(1,2,3);
                                                foreach ($perfis as $perf):
                                                    if(!in_array($perf["co_perfil"], $bloqueados)):
                                                        $checked = "";
                                                        foreach ($perfis_func as $value) {
                                                            if($perf["co_perfil"] == $value['co_perfil']):
                                                                $checked = "checked";
                                                            endif;
                                                        }
                                            ?>
                                                <div class="col-sm-3">
                                                    <label>
                                                        <input id='fun-<?php echo $perf["co_perfil"]; ?>' name='perfis[]' value='<?php echo $perf["co_perfil"]; ?>' type='checkbox' class="funcionalidade"  <?php echo $checked; ?> />
                                                         <?php echo $perf["no_perfil"]; ?>
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
                                                    <input id="id_credenciado" name="co_funcionalidade" value="<?php echo $co_funcionalidade; ?>" type="hidden" />
                                                 </form>
                                               </div> 
                                          </div>
                                            
                                    </div>
                                    <!-- end: PAGE CONTENT-->
				</div>
			</div>