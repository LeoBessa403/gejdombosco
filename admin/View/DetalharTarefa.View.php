<div class="main-content">
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-home-3"></i>
									<a href="#">
										Tarefa
									</a>
								</li>
								<li class="active">
									Tarefa
								</li>								
							</ol>
							<div class="page-header">
								<h1>Tarefa <small> Detalhes da Tarefa</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT --> 
                                        <div class="row">
                                            <div class="col-sm-6" style="padding: 10px; background-color: #fbfbfb; 
                                                 margin-left: 15px;">
                                                
                                                <div class="panel panel-default">
                                                        <div class="panel-heading" style="font-weight: bolder; color: #069;">
									<i class="fa fa-external-link-square"></i>
									Detalhes da Tarefa
								</div>
                                                    <div class="panel-body">
                                                                <p><span style="font-weight: bolder; color: #900;">Prioridade:</span><br/>
                                                               <big><b>
                                                                   <?php echo FuncoesSistema::StatusPrioridade($result['st_prioridade']); ?>
                                                                   </b></big></p>
                                                                <p><span style="font-weight: bolder; color: #900;">Status:</span><br/>
                                                               <big><b>
                                                                   <?php echo FuncoesSistema::StatusTarefaView($result['st_status']); ?>
                                                                   </b></big></p>
                                                                <p><span style="font-weight: bolder; color: #900;">Título:</span><br/>
                                                               <big><b>
                                                                   <?php echo $result['ds_titulo']; ?>
                                                                   </b></big></p>
                                                                <p><span style="font-weight: bolder; color: #900;">Descrição da Tarefa:</span><br/>
                                                                <big><b><?php echo $result['ds_descricao']; ?>
                                                                    </b></big></p>   
                                                                <p><span style="font-weight: bolder; color: #900;">Criada por:</span><br/>
                                                                <big><b><?php echo $result['no_usuario']; ?>
                                                                    </b></big></p>   
                                                                <p><span style="font-weight: bolder; color: #900;">Cadastrada Em:</span><br/>
                                                                <big><b><?php echo Valida::DataShow($result['dt_cadastro'],"d/m/Y H:i:s"); ?>
                                                                    </b></big></p>   
                                                                <p><span style="font-weight: bolder; color: #900;">Inicio Em:</span><br/>
                                                                <big><b><?php echo $result['dt_inicio']; ?>
                                                                    </b></big></p>   
                                                                <p><span style="font-weight: bolder; color: #900;">Termino Em:</span><br/>
                                                                <big><b><?php echo $result['dt_fim']; ?>
                                                                    </b></big></p>   
                                                                    <?php if(!empty($result['dt_conclusao'])): ?>
                                                                            <p><span style="font-weight: bolder; color: #900;">Concluída Em:</span><br/>
                                                                            <big><b><?php echo $result['dt_conclusao']; ?>
                                                                                </b></big></p>   
                                                                    <?php endif; ?>
                                                                <p><span style="font-weight: bolder; color: #900;">Para o Evento:</span><br/>
                                                                <big><b><?php echo $result['no_evento']; ?>
                                                                    </b></big></p>   
                                                                <p><span style="font-weight: bolder; color: #900;">A Realizar Todos:</span><br/>
                                                                <big><b style="text-transform: capitalize;"><?php echo PerfisAcesso::$Perfils[$result['co_perfil']]; ?>
                                                                    </b></big></p>   
                                                    
                                                            </div>
                                                    
                                                    </div>
                                                    <a href="<?php echo PASTAADMIN.'Index/Index'; ?>" class="btn btn-primary tooltips" 
                                                        data-original-title="Editar Registro" data-placement="top">
                                                         Voltar ao Painel Inicial <i class="clip-arrow-right-2"></i>
                                                    </a>
                                                    <br/><br/>
                                            </div>
                                            
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>