<div class="main-content">
        <div class="container">
                <!-- start: PAGE HEADER -->
                <div class="row">
                    <div class="col-sm-12">
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                                    <li>
                                            <i class="clip-grid-6"></i>
                                            <a href="#">
                                                    Tarefa
                                            </a>
                                    </li>
                                    <li class="active">
                                            Cadastro / Edição
                                    </li>

                            </ol>
                            <div class="page-header">
                                    <h1>Tarefa <small>Cadastro / Edição</small></h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                    </div>
                </div>
                <?php
                    Modal::load();
                ?>
            <div class="row">
                <div style="margin-left: 20px;">
                        <h4>LEGENDA</h4>
                        <span class="label label-warning"><i class="fa fa-exclamation-triangle"></i> NÃO INICIADA</span>
                        <span class="label label-info"><i class="fa fa-info-circle"></i> EM ANDAMENTO</span>
                        <span class="label label-success"><i class="fa fa-check-circle"></i> CONCLUIDA</span>
                        <span class="label label-danger"><i class="fa fa-times-circle"></i> INATIVA</span>
                    </div>
                 <?php

                    echo $form;
                 ?>

            </div>
                <!-- end: PAGE CONTENT-->
        </div>
</div>
<!-- end: PAGE -->