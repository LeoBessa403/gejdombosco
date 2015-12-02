<div class="main-content">
        <div class="container">
                    <div class="row">
                                  <div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-grid-6"></i>
									<a href="#">
										Auditoria
									</a>
								</li>
								<li class="active">
									Detalhar
								</li>
								
							</ol>
							<div class="page-header">
								<h1>Auditoria <small>Detalhar</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
                            <div class="row">
					<div class="col-md-12">
                                                    <div class="panel panel-default">
                                                                <div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Auditoria
								</div>
								<div class="panel-body">    
                                                                        <?php
                                                                            echo PerfisAcesso::$Perfils[$result["ds_perfil"]];
                                                                            debug($result);
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