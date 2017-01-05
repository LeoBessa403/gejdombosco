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
                            Inscrição
                        </a>
                    </li>
                    <li class="active">
                        Inscrição
                    </li>
                </ol>
                <div class="page-header">
                    <h1>Inscrição
                        <small> Detalhes da Inscrição</small>
                    </h1>
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
                        Inscrição
                    </div>
                    <div class="panel-body">
                        <?php
                            foreach ($result as $key => $res){
                                $pre = substr($key, 0, 2);
                                $coluna = str_replace("_", " ", substr($key, 3, strlen($key)));
                        ?>
                        <div class="form-group">
                            <label for="form-field-22"
                                   style="font-weight: bolder; color: #666; text-transform: capitalize;">
                                <?= $coluna; ?>
                            </label>
                            <p><b>
                                    <?= $res; ?>
                                </b></p>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <a href="<?php echo PASTAADMIN . UrlAmigavel::$controller . '/Listar' . UrlAmigavel::$controller; ?>" class="btn btn-primary tooltips"
                   data-original-title="Editar Registro" data-placement="top">
                    Voltar <i class="clip-arrow-right-2"></i>
                </a>
                <br/><br/>
            </div>

        </div>
        <!-- end: PAGE CONTENT-->
    </div>
</div>