 <?php
    require('../library/Config.inc.php');
    $id = "CadastroUsuario";
    if(!empty($_POST[$id])):
        
        $dados = $_POST; 
        $dados['dt_cadastro']   = Valida::DataAtualBanco();
        $dados['ds_sexo']       = $dados['ds_sexo'][0]; 
        $dados['no_usuario']    = trim($dados['no_usuario']);
        $dados['ds_code']       = base64_encode(base64_encode($dados['ds_senha']));
        unset($dados[$id],$dados["ds_senha_confirma"]);  

        $user['no_usuario'] = $dados['no_usuario'];
        $userNome = UsuarioModel::PesquisaUsuarioCadastrado($user);
        $email['ds_email'] = $dados['ds_email'];
        $userEmail = UsuarioModel::PesquisaUsuarioCadastrado($email);
        $login['ds_login'] = $dados['ds_login'];
        $userLogin = UsuarioModel::PesquisaUsuarioCadastrado($login);
        
        $erro = false;
        if($userNome):
            $Campo[] = "Nome do Usuário";
            $erro = true;
        endif;    
        if($userEmail):
            $Campo[] = "E-mail";
            $erro = true;
        endif;    
        if($userLogin):
            $Campo[] = "Login";
            $erro = true;
        endif;    
        
        if($erro):
            $mensagem = "Já exite usuário cadastro com o mesmo ".implode(", ", $Campo).", Favor Verificar.";
        else:
            if($_FILES["ds_foto"]["tmp_name"]):
                $foto = $_FILES["ds_foto"];
                $nome = Valida::ValNome($dados['no_usuario']);
                $up = new Upload();
                $up->UploadImagem($foto, $nome, "usuarios");
                $dados['ds_foto'] = $up->getNameImage();
            endif;
            $idUsuario = UsuarioModel::CadastraUsuario($dados);
            if($idUsuario):
                $email = new Email();
        
                // Índice = Nome, e Valor = Email.
                $emails = array(
                            $dados['no_usuario'] => $dados['ds_email']
                        );
                $Mensagem = "<h2>Seu cadastro foi realizado com sucesso</h2><br/>"
                          . "Aguarde a Ativação do seu Usuário ".$dados['ds_login'];

                $email->setEmailDestinatario($emails)
                      ->setTitulo("Email de  Teste Pra Todos")
                      ->setMensagem($Mensagem);

                // Variável para validação de Emails Enviados com Sucesso.
                //$EmailEnviado = $email->Enviar();
            endif;
        endif;
    endif;  
?>
<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title><?php echo DESC;?></title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>fonts/style.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>css/main-responsive.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>css/main.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>css/theme_navy.css" type="text/css" id="skin_color">
                <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/css3-animation/animations.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>css/print.css" type="text/css" media="print"/>
                <!--[if IE 7]>
                    <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
                <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
               
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR FULLCALENDARIO -->
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/fullcalendar/fullcalendar/fullcalendar.css">
                <!-- start: CSS REQUIRED FOR DATAPICKER -->
		<link rel="stylesheet" href="<?php echo INCLUDES;?>Jcalendar.css">
                <!-- start: CSS REQUIRED FOR SELECT -->
                <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/select2/select2.css"> 
                <!-- start: CSS REQUIRED FOR UPLOAD -->
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
                <!-- start: CSS REQUIRED FOR CHECK -->
                <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/bootstrap-switch/static/stylesheets/bootstrap-switch.css">
                <!-- start: CSS REQUIRED FOR CHECK -->
                <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/DataTables/media/css/DT_bootstrap.css">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="shortcut icon" href="favicon.ico" />
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login example1">
		<div class="main-login col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" style="margin-top: 0;">
			<div class="logo">
                            <a style="color: whitesmoke;" href="<?php echo PASTASITE;?>">
                                    <?php echo DESC;?>
                            </a>
			</div>
			<!-- start: LOGIN BOX -->
			<div class="box-login">
				<h3>Cadastrar Usuario do Sistema</h3>
                                    
                                <div class="panel-body" style="padding: 0;">
                                    <form action="#" role="form" id="CadastroUsuario" name="CadastroUsuario" method="post" enctype="multipart/form-data" class="formulario">                                                         
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="no_membro" class="control-label">
                                                    Nome Completo <span class="symbol required"></span>
                                                </label>
                                                <input class="form-control ob nome" id="no_usuario" name="no_usuario" value="" type="text">
                                                <span class="help-block" id="no_membro-info">
                                                    <i class="fa fa-info-circle"></i> O Nome deve ser Completo Mínimo de 10 Caracteres
                                                </span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="ds_email" class="control-label"> 
                                                    E-mail <span class="symbol required"></span>
                                                </label>
                                                <input class="form-control ob email" id="ds_email" name="ds_email" value="" type="text">
                                                <span class="help-block" id="ds_email-info"><i class="fa fa-info-circle"></i> Para recuperar a senha.</span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="ds_sexo" class="control-label"> 
                                                    Sexo
                                                </label>
                                                <select id='ds_sexo' name='ds_sexo[]' class='form-control search-select'>;
                                                     <option value="">Selecione um Sexo</option>
                                                     <option value="M">Masculino</option>
                                                     <option value="F">Femionino</option>
                                                 </select>
                                            </div>
                                            <div class="form-group">
                                                    <label>
                                                            Foto de Perfil
                                                    </label>
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="assets/images/avatar-1-xl.jpg" alt="">
                                                            </div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                                            <div class="user-edit-image-buttons">
                                                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-folder-open-o"></i> Selecionar Arquivo</span>
                                                                    <span class="fileupload-exists"><i class="fa fa-folder-open-o"></i> Trocar</span>
                                                                            <input type="file" class="file-input" id="ds_foto" name="ds_foto" />
                                                                    </span>
                                                                    <a href="#" class="btn fileupload-exists btn-bricky" data-dismiss="fileupload">
                                                                            <i class="fa fa-trash-o"></i> Remover
                                                                    </a>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ds_login" class="control-label"> 
                                                    Usuário do Sistema <span class="symbol required"></span>
                                                </label>
                                                <input class="form-control ob" id="ds_login" name="ds_login" value="" type="text">
                                                <span class="help-block" id="ds_login-info"><i class="fa fa-info-circle"></i> Mínimo de 6 Caracteres</span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="ds_senha" class="control-label"> 
                                                    Senha <span class="symbol required"></span>
                                                </label>
                                                <input class="form-control senha ob" id="ds_senha" name="ds_senha" value="" type="password">
                                                <span class="help-block" id="ds_senha-info">.</span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="ds_senha_confirma" class="control-label"> 
                                                    Confirmação da Senha <span class="symbol required"></span>
                                                </label>
                                                <input class="form-control confirma-senha ob" id="ds_senha_confirma" name="ds_senha_confirma" value="" type="password">
                                                <span class="help-block" id="ds_senha_confirma-info">.</span>
                                            </div>
                                            
                                                <button data-style="zoom-out" class="btn btn-success ladda-button" type="submit" value="CadastroUsuario" name="CadastroUsuario">
                                                    <span class="ladda-label"> Salvar </span>
                                                    <i class="fa fa-save"></i>
                                                    <span class="ladda-spinner"></span>
                                                </button>
                                                <button data-style="expand-right" class="btn btn-danger ladda-button" type="reset">
                                                    <span class="ladda-label"> Limpar </span>
                                                    <i class="fa fa-ban"></i>
                                                    <span class="ladda-spinner"></span>
                                                </button>
                                                <a href="login.php" data-style="expand-right" class="btn btn-primary ladda-button" type="reset" style="float: right;">
                                                    <span class="ladda-label"> Voltar </span>
                                                    <i class="clip-arrow-left-2"></i>
                                                    <span class="ladda-spinner"></span>
                                                </a>
                                        </div>
                                    </form>
			</div>
			<!-- end: COPYRIGHT -->
		</div>
                        
                        
                        
                        
			<div class="copyright" style="color: #ccc;">
				<?php echo date("Y");?> &copy; LEO BESSA
			</div>
		<?php Modal::aviso("alerta") ;?>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
                    <script src="<?php echo PASTAADMIN;?>plugins/respond.min.js"></script>
                    <script src="<?php echo PASTAADMIN;?>plugins/excanvas.min.js"></script>
                    <script type="text/javascript" src="<?php echo INCLUDES;?>jquery-1.10.2.js"></script>
		<![endif]-->                
		<!--[if gte IE 9]><!-->
		<script src="<?php echo INCLUDES;?>jquery-2.0.3.js"></script>
		<!--<![endif]-->
                <!--<script src="<?php echo PASTAADMIN;?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>-->
                <script src="<?php echo INCLUDES;?>jquery-ui.js"></script>
                <script src="<?php echo PASTAADMIN;?>plugins/bootstrap/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="<?php echo INCLUDES;?>gera-grafico.js"></script>
                <script type="text/javascript" src="<?php echo INCLUDES;?>jquery.mask.js"></script>
                <script type="text/javascript" src="<?php echo INCLUDES;?>jquery.maskMoney.js"></script>
                 <?php echo '<script type="text/javascript">
                        function constantes(){    
                                var dados = {
                                    "HOME" : "'.HOME.'",
                                    "INATIVO" : "'.INATIVO.'",
                                    "PASTAUPLOADS" : "'.PASTAUPLOADS.'"                                        
                                    };
                                return dados;
                        }
                </script>'; ?>
                <script type="text/javascript" src="<?php echo INCLUDES;?>validacoes.js"></script>               
		<script src="<?php echo PASTAADMIN;?>plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/blockUI/jquery.blockUI.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<!--<script src="<?php //echo PASTAADMIN;?>plugins/less/less-1.5.0.min.js"></script>-->
		<script src="<?php echo PASTAADMIN;?>plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
		<script src="<?php echo PASTAADMIN;?>js/main.js"></script>
		<script src="<?php echo PASTAADMIN;?>js/ui-animation.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo PASTAADMIN;?>plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
		
                <script src="<?php echo PASTAADMIN;?>plugins/select2/select2.min.js"></script>                 
		<script src="<?php echo PASTAADMIN;?>plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>                
		<script src="<?php echo PASTAADMIN;?>plugins/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
                <script src="<?php echo PASTAADMIN;?>js/Funcoes.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
                                Funcoes.init();
                                Main.init();
                                <?php 
                                    if($erro):
                                        echo 'Funcoes.Alerta("'.$mensagem.'")';   
                                    else:    
                                        echo 'Funcoes.Sucesso("'.Mensagens::OK_SALVO.'")';   
                                    endif;
                                ?>
			});
		</script>   
	</body>
	<!-- end: BODY -->
</html>