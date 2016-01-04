<div class="main-content">
        <div class="container">
                    <div class="row">
                                  <div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-grid-6"></i>
									<a href="#">
										Agenda
									</a>
								</li>
								<li class="active">
									Listar Compromissos
								</li>
								
							</ol>
							<div class="page-header">
								<h1>Agenda <small>Listar Compromissos</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
                            <div class="row">
					<div class="col-md-12">
                                                    <div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-calendar"></i>
									Agenda GEJ
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="panel-body">
									<div class="col-sm-9">
										<div id='calendar'></div>
									</div>
									<div class="col-sm-3">
										<h4>Categorias</h4>
										<div id="event-categories">
											<div class="event-category label-green" data-class="label-green">
												<i class="fa fa-move"></i>
												Reunião
											</div>
											<div class="event-category label-default" data-class="label-default">
												<i class="fa fa-move"></i>
												Ensaio
											</div>
											<div class="event-category label-purple" data-class="label-purple">
												<i class="fa fa-move"></i>
												Encontro
											</div>
											<div class="event-category btn-dark-grey" data-class="btn-dark-grey">
												<i class="fa fa-move"></i>
												Formação
											</div>
											<div class="event-category label-danger" data-class="label-danger">
												<i class="fa fa-move"></i>
												Evento
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- end: FULL CALENDAR PANEL -->
                                            
                                        </div>
                            </div>
                            <!-- end: PAGE CONTENT-->
                    </div>
            </div>
			<!-- end: PAGE -->
                <!-- start: MODAL DE EDIÇÃO -->         
                <div id="event-management" class="modal fade in modal-overflow" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-header btn-info">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">Gerenciador de Eventualidades</h4>
			</div>
                    <div class="modal-body">
                        <?php echo $result; ?>
                    </div>
			<div class="modal-footer">
				<button type='submit' class='btn btn-success save-event'>
					<i class='fa fa-check'></i> Criar
				</button>
				<button type="button" class="btn btn-danger remove-event no-display">
					<i class='fa fa-trash-o'></i> Deletar
				</button>
				<button type="button" data-dismiss="modal" class="btn btn-light-grey">
					Fechar
				</button>
			</div>
		</div>
                <!-- end: MODAL DE EDIÇÃO -->        