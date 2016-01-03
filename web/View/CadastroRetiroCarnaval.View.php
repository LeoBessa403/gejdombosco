<div class="main-content">
        <div class="container">
                <h4>Cadastro Participantes</h4>
                <?php
                    if($result):
                         Valida::Mensagem(strtoupper(Mensagens::OK_SALVO_MEMBRO_RETIRO_CARNAVAL), 1);
                    endif;
                    if($resultAlt):
                         Valida::Mensagem(strtoupper(Mensagens::MEMBRO_JA_CADASTRADO), 2);
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