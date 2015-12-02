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
                                                    Membros
                                            </a>
                                    </li>
                                    <li class="active">
                                            Cadastro / Edição
                                    </li>

                            </ol>
                            <div class="page-header">
                                    <h1>Membros <small>Cadastro / Edição</small></h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                    </div>
                </div>
                <?php
                    Modal::load();
                    if($result):
                         Valida::Mensagem(Mensagens::OK_SALVO, 1);
                    endif;
                    if($resultAlt):
                         Valida::Mensagem(Mensagens::OK_ATUALIZADO, 1);
                    endif;
                ?>
            <div class="row">

                 <?php

                    echo $form;
                 ?>

            </div>
                <!-- end: PAGE CONTENT-->
        </div>
</div>
<!-- end: PAGE -->