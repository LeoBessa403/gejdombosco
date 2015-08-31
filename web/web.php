<?php
    require_once 'library/Config.inc.php'; 
?>
<!DOCTYPE html>
<!-- Template Name: Clip-One - Frontend | Build with Twitter Bootstrap 3 | Version: 1.0 | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>SITE | AMIGOS DO PET</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
                <link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/bootstrap/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo PASTASITE; ?>fonts/style.css">
		<link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/animate.css/animate.min.css">
		<link rel="stylesheet" href="<?php echo PASTASITE; ?>css/main.css">
		<link rel="stylesheet" href="<?php echo PASTASITE; ?>css/main-responsive.css">
		<link rel="stylesheet" href="<?php echo PASTASITE; ?>css/theme_blue.css" type="text/css" id="skin_color">
                <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/css3-animation/animations.css">
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/revolution_slider/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/flex-slider/flexslider.css">
		<link rel="stylesheet" href="<?php echo PASTASITE; ?>plugins/colorbox/example2/colorbox.css">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: HTML5SHIV FOR IE8 -->
		<!--[if lt IE 9]>
		<script src="<?php echo PASTASITE; ?><?php echo PASTASITE; ?>plugins/html5shiv.js"></script>
		<![endif]-->
		<!-- end: HTML5SHIV FOR IE8 -->
	</head>
	<!-- end: HEAD -->
	<body>
		<!-- start: HEADER -->
		<header class="colored-top-bar">
			<div class="clearfix " id="topbar">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<!-- start: TOP BAR CALL US -->
							<div class="callus">
								Contatos: (82)3023-4747 - E-Mail:
								<a href="mailto:contato@amigosdopet.net">
									contato@amigosdopet.net
								</a>
							</div>
							<!-- end: TOP BAR CALL US -->
						</div>
						<div class="col-sm-6">
							<!-- start: TOP BAR SOCIAL ICONS -->
							<div class="social-icons">
								<ul>
									<li class="social-facebook tooltips" data-original-title="Facebook" data-placement="bottom">
										<a target="_blank" href="https://www.facebook.com/pages/Amigos-do-Pet/1450981475201108">
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
							<?php echo DESC;?>
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
                                                        <li>
                                                            <a href="<?php echo PASTASITE; ?>Index/Empresa">
									A Empresa
								</a>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown">
									Planos <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo PASTASITE; ?>Planos/ListarPlanos">
											Ver Planos
										</a>
										<a href="<?php echo PASTASITE; ?>Planos/Cobertura">
											Principais Coberturas
										</a>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown">
									Credenciados <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo PASTASITE; ?>Credenciados/ListarCredenciado">
											Rede Credenciada
										</a>
									</li>
								</ul>
							</li>
                                                        <li>
                                                            <a href="<?php echo PASTASITE; ?>Index/Blog">
									Blog
								</a>
							</li>
							<li>
                                                            <a target="_blank" href="<?php echo PASTAADMIN; ?>">
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
													</button> </span>
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
								Cadastre seu E-mail para receber novidades sobre a Amigos do Pet
							</p>
							<form method="POST" action="#" id="newsletterForm">
								<div class="input-group">
									<input type="text" id="email" name="email" placeholder="Seu Email" class="form-control">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default">
											Enviar
										</button> </span>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-3">
                                            <h4>A Empresa</h4>
						<div class="twitter" id="tweet">
							A empresa que cresce a cada dia reconhecida pela sua excelência de seu desempenho, comprometida com a melhoria da qualidade de vida dos animais e da população, gerando condições de assistência...
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-details">
							<h4>Contatos</h4>
							<ul class="contact">
								<li>
									<p>
                                                                            <i class="fa fa-map-marker"></i><strong>Endereço:</strong> <span style="color: white;">Bairro Jatiuca
                                                                            Rua Travessa Santo Antônio Nº 150</span>
									</p>
								</li>
								<li>
									<p>
										<i class="fa fa-envelope"></i><strong>CEP:</strong> <span style="color: white;">57035-692</span>
									</p>
								</li>
								<li>
									<p>
										<i class="fa fa-phone"></i><strong>Telefone:</strong> <span style="color: white;">(82)3023-4747</span>
									</p>
								</li>
								<li>
									<p>
										<i class="fa fa-envelope"></i><strong>Email:</strong>
                                                                                <a href="mailto:contato@amigosdopet.net">
                                                                                        contato@amigosdopet.net
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
									<a target="_blank" href="https://www.facebook.com/pages/Amigos-do-Pet/1450981475201108" data-original-title="Facebook">
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
								DESENVOLVIMENTO LEO BESSA
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
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="<?php echo PASTASITE; ?>plugins/respond.min.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/excanvas.min.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/html5shiv.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<!--<![endif]-->
		<script src="<?php echo PASTASITE; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/jquery.transit/jquery.transit.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/jquery.appear/jquery.appear.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/blockUI/jquery.blockUI.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo PASTASITE; ?>js/main.js"></script>
                <script src="<?php echo PASTAADMIN;?>js/ui-animation.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo PASTASITE; ?>plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/flex-slider/jquery.flexslider.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/stellar.js/jquery.stellar.min.js"></script>
		<script src="<?php echo PASTASITE; ?>plugins/colorbox/jquery.colorbox-min.js"></script>
		<script src="<?php echo PASTASITE; ?>js/index.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Index.init();
				$.stellar();
			});
		</script>
	</body>
</html>
