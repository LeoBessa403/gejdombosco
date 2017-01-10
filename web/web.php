<?php
require_once 'library/Config.inc.php';
//    $back = new Backup();

//    $ip = "200.130.2.5"; 
//    $query = @unserialize(file_get_contents(IP_LOCALIZACAO.$ip));
//    debug($query,1);
?>
<!DOCTYPE html>
<!-- Template Name: Clip-One - Frontend | Build with Twitter Bootstrap 3 | Version: 1.0 | Author: ClipTheme -->
<!--[if IE 8]>
<html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]>
<html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
    <title>SITE | GEJ Dom Bosco</title>
    <!-- start: META -->
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/><![endif]-->
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/bootstrap/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo PASTASITE; ?>fonts/style.css">
    <link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo PASTASITE; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo PASTASITE; ?>css/main-responsive.css">
    <link rel="stylesheet" href="<?php echo PASTASITE; ?>css/theme_blue.css" type="text/css" id="skin_color">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/css3-animation/animations.css">

    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/iCheck/skins/all.css">
    <link rel="stylesheet"
          href="<?php echo PASTAADMIN; ?>plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/perfect-scrollbar/src/perfect-scrollbar.css">

    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="stylesheet" href="<?= PASTAADMIN; ?>plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?= PASTAADMIN; ?>plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet"
          type="text/css"/>
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/revolution_slider/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/flex-slider/flexslider.css">
    <link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/colorbox/example2/colorbox.css">
    <!-- start: CSS REQUIRED FOR FULLCALENDARIO -->
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/fullcalendar/fullcalendar/fullcalendar.css">
    <!-- start: CSS REQUIRED FOR DATAPICKER -->
    <link rel="stylesheet" href="<?php echo INCLUDES; ?>Jcalendar.css">
    <!-- start: CSS REQUIRED FOR SELECT -->
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/select2/select2.css">
    <!-- start: CSS REQUIRED FOR UPLOAD -->
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
    <!-- start: CSS REQUIRED FOR CHECK -->
    <link rel="stylesheet"
          href="<?php echo PASTAADMIN; ?>plugins/bootstrap-switch/static/stylesheets/bootstrap-switch.css">
    <!-- start: CSS REQUIRED FOR CHECK -->
    <link rel="stylesheet" href="<?php echo PASTAADMIN; ?>plugins/DataTables/media/css/DT_bootstrap.css">
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: HTML5SHIV FOR IE8 -->
    <!--[if lt IE 9]>
    <script src="<?php echo PASTASITE; ?><?php echo PASTASITE; ?>plugins/html5shiv.js"></script>
    <![endif]-->
    <!-- end: HTML5SHIV FOR IE8 -->
    <!-- GOOGLE ANALITCS -->
    <?php if (ID_ANALITCS): ?>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', '<?php echo ID_ANALITCS; ?>', 'auto');
            ga('send', 'pageview');

        </script>
    <?php endif; ?>
    <!-- FIM / GOOGLE ANALITCS -->
</head>
<!-- end: HEAD -->
<body>
<!-- start: HEADER -->
<header class="colored-top-bar">
    <div class="clearfix" id="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <!-- start: TOP BAR CALL US -->
                    <div class="callus">
                        Contatos: (61)9327-4991 - E-Mail:
                        <a href="mailto:contato@gejdomboscoweb.com.br">
                            contato@gejdomboscoweb.com.br
                        </a>
                    </div>
                    <!-- end: TOP BAR CALL US -->
                </div>
                <div class="col-sm-6">
                    <!-- start: TOP BAR SOCIAL ICONS -->
                    <div class="social-icons">
                        <ul>
                            <li class="social-facebook tooltips" data-original-title="Facebook" data-placement="bottom">
                                <a target="_blank" href="https://www.facebook.com/gej.dombosco">
                                    Facebook
                                </a>
                            </li>
                            <li class="social-twitter tooltips" data-original-title="Twitter" data-placement="bottom">
                                <a target="_blank" href="http://www.twitter.com">
                                    Twitter
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end: TOP BAR SOCIAL ICONS -->
                </div>
            </div>
        </div>
    </div>
    <!-- end: TOP BAR -->
    <div role="navigation" class="navbar navbar-default navbar-fixed-top space-top">
        <!-- start: TOP NAVIGATION CONTAINER -->
        <div class="container">
            <div class="navbar-header">
                <!-- start: RESPONSIVE MENU TOGGLER -->
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- end: RESPONSIVE MENU TOGGLER -->
                <!-- start: LOGO -->
                <a class="navbar-brand" href="<?php echo PASTASITE; ?>">
                    <img src="<?php echo PASTASITE; ?>/img/logo1.png" width="170"/>
                </a>
                <!-- end: LOGO -->
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="<?php echo PASTASITE; ?>">
                            Página Inicial
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown">
                            Cadastros <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!--										<a href="-->
                                <?php //echo PASTASITE; ?><!--Index/CadastroMembro">-->
                                <!--											Membro GEJ-->
                                <!--										</a>-->
                                <a href="<?php echo PASTASITE; ?>MembroWeb/CadastroRetiroCarnaval">
                                    5º Retiro de Carnaval
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a target="_blank" href="<?php echo PASTAADMIN; ?>Index/Index/PrimeiroAcesso">
                            Área Administrativa
                        </a>
                    </li>
                    <li class="menu-search">
                        <!-- start: SEARCH BUTTON -->
                        <a href="#" data-placement="bottom" data-toggle="popover">
                            <i class="clip-search-3"></i>
                        </a>
                        <!-- end: SEARCH BUTTON -->
                        <!-- start: SEARCH POPOVER -->
                        <div class="popover bottom search-box">
                            <div class="arrow"></div>
                            <div class="popover-content">
                                <!-- start: SEARCH FORM -->
                                <form class="" id="searchform" action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Pesquisar">
                                            <span class="input-group-btn">
                                                <button class="btn btn-main-color btn-squared" type="button">
                                                    <i class="clip-search-3"></i>
                                                </button>
                                            </span>
                                    </div>
                                </form>
                                <!-- end: SEARCH FORM -->
                            </div>
                        </div>
                        <!-- end: SEARCH POPOVER -->
                    </li>
                </ul>
            </div>
        </div>
        <!-- end: TOP NAVIGATION CONTAINER -->
    </div>
</header>
<!-- end: HEADER -->
<!-- start: MAIN CONTAINER -->
<div class="main-container">
    <!-- start: REVOLUTION SLIDERS -->
    <?php
    $url = new UrlAmigavel();
    $url->pegaControllerAction();
    ?>
</div>
<!-- end: MAIN CONTAINER -->
<!-- start: FOOTER -->
<footer id="footer" style="padding: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="newsletter">
                    <h4>Receber Notícias</h4>
                    <p>
                        Cadastre seu E-mail para receber novidades sobre o GEJ Dom Bosco
                    </p>
                    <form method="POST" action="#" id="newsletterForm">
                        <div class="input-group">
                            <input type="text" id="email" name="email" placeholder="Seu Email" class="form-control">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        Enviar
                                    </button>
                                </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <h4>O Grupo</h4>
                <div class="twitter" id="tweet">
                    Evangelizar os Jovens...
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-details">
                    <h4>Contatos</h4>
                    <ul class="contact">
                        <li>
                            <p>
                                <i class="fa fa-map-marker"></i><strong>Endereço:</strong> <span style="color: white;">Paróquia São
                                                                João Evangelista <br/>QS 405 Samambai Norte</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-envelope"></i><strong>CEP:</strong> <span style="color: white;">72000-000</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-phone"></i><strong>Telefone:</strong> <span style="color: white;">(61)9327-4991</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-envelope"></i><strong>Email:</strong>
                                <a href="mailto:contato@gejdomboscoweb.com.br">
                                    contato@gejdomboscoweb.com.br
                                </a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <h4>Rede Sociais</h4>
                <div class="social-icons">
                    <ul>
                        <li class="social-facebook tooltips" data-original-title="Facebook" data-placement="bottom">
                            <a target="_blank" href="https://www.facebook.com/gej.dombosco"
                               data-original-title="Facebook">
                                Facebook
                            </a>
                        </li>
                        <li class="social-twitter tooltips" data-original-title="Twitter" data-placement="bottom">
                            <a target="_blank" href="http://www.twitter.com">
                                Twitter
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a class="logo" href="#">
                        &copy; DESENVOLVIMENTO LEO BESSA <?php echo date("Y"); ?>
                    </a>
                </div>
                <div class="col-md-4">
                    <nav id="sub-menu">
                        <ul>
                            <li>
                                <a href="<?php echo PASTASITE; ?>Index/Blog">
                                    Perguntas Frequentes
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Contatos
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
<a id="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
<!-- end: FOOTER -->
<!-- end: FOOTER -->
<?php Modal::aviso("alerta"); ?>
<!-- start: MAIN JAVASCRIPTS -->
<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="<?php echo PASTASITE; ?>plugins/respond.min.js"></script>
<script src="<?php echo PASTASITE; ?>plugins/excanvas.min.js"></script>
<script src="<?php echo PASTASITE; ?>plugins/html5shiv.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="<?php echo INCLUDES; ?>jquery-2.0.3.js"></script>
<!--<![endif]-->
<script src="<?php echo INCLUDES; ?>jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo INCLUDES; ?>gera-grafico.js"></script>
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
<script src="<?php echo PASTASITE; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo PASTASITE; ?>plugins/jquery.transit/jquery.transit.js"></script>
<script src="<?php echo PASTASITE; ?>plugins/hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo PASTASITE; ?>plugins/jquery.appear/jquery.appear.js"></script>
<script src="<?php echo PASTASITE; ?>plugins/blockUI/jquery.blockUI.js"></script>
<script src="<?php echo PASTASITE; ?>plugins/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo PASTASITE; ?>js/main.js"></script>
<script src="<?php echo PASTAADMIN; ?>js/ui-animation.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="<?php echo PASTASITE; ?>plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script
    src="<?php echo PASTASITE; ?>plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo PASTASITE; ?>plugins/flex-slider/jquery.flexslider.js"></script>
<script src="<?php echo PASTASITE; ?>plugins/stellar.js/jquery.stellar.min.js"></script>
<script src="<?php echo PASTASITE; ?>plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="<?php echo PASTAADMIN; ?>plugins/select2/select2.min.js"></script>
<script src="<?php echo PASTAADMIN; ?>plugins/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
<script src="<?php echo PASTAADMIN; ?>plugins/fullcalendar/fullcalendar/fullcalendar.js"></script>
<script src="<?php echo PASTASITE; ?>js/index.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

<script type="text/javascript" src="<?php echo PASTAADMIN; ?>js/Funcoes.js"></script>
<script type="text/javascript" src="<?php echo INCLUDES; ?>validacoes.js"></script>
<script>
    jQuery(document).ready(function () {
        Funcoes.init();
        Main.init();
        Index.init();
        $.stellar();
        $('#co_tipo_pagamento').change(function () {
            var tipoPagamento = $(this).val();
            if(tipoPagamento == 1){
                $("#dinheiro").show();
                $("#cartao").hide();
                $("#deposito").hide()
            }else if(tipoPagamento == 2){
                $("#dinheiro").hide();
                $("#cartao").show();
                $("#deposito").hide()
            }else if(tipoPagamento == 3){
                $("#dinheiro").hide();
                $("#cartao").hide();
                $("#deposito").show()
            }else{
                $("#dinheiro").hide();
                $("#cartao").hide();
                $("#deposito").hide()
            }
        });
    });
</script>
</body>
</html>
