<div class="main-content">
        <div class="container">
                <?php
                    if($result):
                         Valida::Mensagem(Mensagens::OK_SALVO, 1);
                    endif;
                    if($resultAlt):
                         Valida::Mensagem(Mensagens::MEMBRO_JA_CADASTRADO, 2);
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