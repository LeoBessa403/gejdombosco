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
									Listar
								</li>
								
							</ol>
							<div class="page-header">
								<h1>Auditoria <small>Listar Registros</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
                            <div class="row">
					<div class="col-md-12">
                                                    <div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-calendar"></i>
									Full Calendar
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
										<h4>Draggable categories</h4>
										<div id="event-categories">
											<div class="event-category label-green" data-class="label-green">
												<i class="fa fa-move"></i>
												Reunião
											</div>
											<div class="event-category label-default" data-class="label-default">
												<i class="fa fa-move"></i>
												Ensaio da Música
											</div>
											<div class="event-category label-purple" data-class="label-purple">
												<i class="fa fa-move"></i>
												Ensaio do Teatro
											</div>
											<div class="event-category label-orange" data-class="label-orange">
												<i class="fa fa-move"></i>
												Tarefas
											</div>
											<div class="event-category label-yellow" data-class="label-yellow">
												<i class="fa fa-move"></i>
												Encontro
											</div>
											<div class="event-category label-teal" data-class="label-teal">
												<i class="fa fa-move"></i>
												Generic
											</div>
											<div class="event-category label-beige" data-class="label-beige">
												<i class="fa fa-move"></i>
												To Do
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="grey" id="drop-remove" />
													Remove after drop
												</label>
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
                <div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">Gerenciador de Eventos</h4>
			</div>
			<div class="modal-body"></div>
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