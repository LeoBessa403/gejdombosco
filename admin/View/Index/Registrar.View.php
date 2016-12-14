<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]>
<html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]>
<html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
    <title><?php echo DESC; ?></title>
    <!-- start: META -->
    <meta charset="utf-8"/>
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/><![endif]-->
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>fonts/style.css">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>css/main-responsive.css">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/iCheck/skins/all.css">
    <link rel="stylesheet"
          href="<?php echo PASTAADMIN; ?>plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/perfect-scrollbar/src/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>css/theme_navy.css" type="text/css" id="skin_color">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/css3-animation/animations.css">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>css/print.css" type="text/css" media="print"/>
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->

    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR SELECT -->
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/select2/select2.css">
    <!-- start: CSS REQUIRED FOR UPLOAD -->
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body class="login example1">
<div class="main-login col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" style="margin-top: 0;">
    <div class="logo">
        <a style="color: whitesmoke;" href="<?php echo PASTASITE; ?>">
            <?php echo DESC; ?>
        </a>
    </div>
    <!-- start: LOGIN BOX -->
    <div class="box-login">
        <h3>Cadastrar Usuario do Sistema</h3>
            <?php
                echo $form;
            ?>
        <!-- end: COPYRIGHT -->
    </div>
    <div class="copyright" style="color: #ccc;">
        <?php echo date("Y"); ?> &copy; LEO BESSA
    </div>
    <?php Modal::aviso("alerta"); ?>
    <!-- start: MAIN JAVASCRIPTS -->
    <!--[if lt IE 9]>
    <script src="<?php echo PASTAADMIN;?>plugins/respond.min.js"></script>
    <script src="<?php echo PASTAADMIN;?>plugins/excanvas.min.js"></script>
    <script type="text/javascript" src="<?php echo INCLUDES;?>jquery-1.10.2.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="<?php echo INCLUDES; ?>jquery-2.0.3.js"></script>
    <!--<![endif]-->
    <!--<script src="<?php echo PASTAADMIN; ?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>-->
    <script src="<?php echo INCLUDES; ?>jquery-ui.js"></script>
    <script src="<?php echo PASTAADMIN; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo INCLUDES; ?>jquery.mask.js"></script>
    <script type="text/javascript" src="<?php echo INCLUDES; ?>jquery.maskMoney.js"></script>
    <?php echo '<script type="text/javascript">
                        function constantes(){    
                                var dados = {
                                    "HOME" : "' . HOME . '",
                                    "INATIVO" : "' . INATIVO . '",
                                    "PASTAUPLOADS" : "' . PASTAUPLOADS . '"                                        
                                    };
                                return dados;
                        }
                </script>'; ?>
    <script type="text/javascript" src="<?php echo INCLUDES; ?>validacoes.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

    <script src="<?php echo PASTAADMIN; ?>plugins/select2/select2.min.js"></script>
    <script src="<?php echo PASTAADMIN; ?>plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script src="<?php echo PASTAADMIN; ?>js/Funcoes.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
        jQuery(document).ready(function () {
            Funcoes.init();
            <?php
            if ($erro == "ERRO"):
                echo 'Funcoes.Alerta("' . $mensagem . '")';
            elseif ($erro == "OK"):
                echo 'Funcoes.Sucesso("' . Mensagens::OK_SALVO . '")';
            endif;
            ?>
        });
    </script>
</body>
<!-- end: BODY -->
</html>