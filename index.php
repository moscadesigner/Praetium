<?php include("idiomas.php");?>
<?php

	if(isset($_POST['email']))
	{
		$ignorar = array('campo1','campo2');
		$body = '<h1>Fale Conosco</h1>';
		
		foreach($_POST as $name => $value)
		{
			if(!in_array($name, $ignorar))
			{
				$campo_nome = str_replace("-", " ", ucfirst($name));
				$campo_valor = trim(utf8_decode ($value));
				
				$body .= '<b>' . $campo_nome . "</b>: " . $campo_valor . "<br />";
			}
		}
		
		include_once("_send.aut.mail/class.phpmailer.php");
		include_once("_send.aut.mail/getmail.php");
		
		//******************************************************
		//CONTA DE E-MAIL QUE VAI ENVIAR A MENSAGEM
		//******************************************************
		$smtp = 'email-ssl.com.br';
		$usuario = 'contato@parox.com.br';
		$from = $usuario;
		$senha = 'Novidade@01';
		//*****************************************************

		$assunto = "Contato pelo site";
		$de = 'PAROXISMO COLETIVO';
		$para = 'contato@parox.com.br'; //email que vai receber a mensagem
		
		$nome_destinatario = trim($_POST['nome']);
		$email_destinatario = trim($_POST['email']);
		$carta = $body;
		
		__send($smtp, $usuario, $senha, $de, $para, $assunto, $carta, false, $email_destinatario, $nome_destinatario, $from);
		
		print 'Enviado com sucesso';
		
		die();
	}

?>
<!DOCTYPE html>

	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Praetium</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Praetium desenvolvimento de negócios" />
	<meta name="keywords" content="Negócios, Business, Parceria em negócios, Hands-on, Metas comerciais" />
	<meta name="author" content="Parox.com.br" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="icon" type="image/png" sizes="16x16"  href="favicon.png">


	<!-- Google Webfonts -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons-->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme Style -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
		.link-play{
			color:#fff
		}
		.link-play:hover{
			color:#000 !important;
		}
	</style>
</head>


	<body>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  <h4 class="modal-title" id="myModalLabel"><?= $btn_entre_contato; ?></h4>
			</div>
			<div class="modal-body">
				<form id="frmForm">
				
					<div id="status" class="alert hidden" role="alert"></div>

					<div class="form-group">
						
						<div class="form-group">
							<label class="control-label">Nome</label>
							<input type="text" id="nome" name="nome" class="form-control" placeholder="Nome">
						</div>
					</div>
					<div class="form-group">
						<div class="">
							<label class="control-label">Email</label>
							<input type="text" id="email" name="email" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<div class="">
							<label class="control-label">Telefone</label>
							<input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefonte" onkeypress="mask(this);" onblur="mask(this);">
						</div>
					</div>

					<div class="form-group">
						<div class="">
							<label class="control-label">Mensagem</label>
							<textarea id="mensagem" name="mensagem" class="form-control" id="inputMensagem" placeholder="Mensagem"></textarea>
						</div>
					</div>
				
					<div class="form-group">
						<div>
							<button id="btnEnviar" type="button" value="enviar" onClick="enviar();" class="btn btn-default">Enviar</button>
						</div>
					</div>
				</form>
			</div>
		  </div>
		</div>
	  </div>

	<!--Menu principal -->
	<div id="fh5co-offcanvass">
		<ul>
			<li class=""><a href="#" data-nav-section="home"><?= $menu_rodape1; ?></a></li>
			<li><a href="#" data-nav-section="sobre"><?= $menu_rodape2; ?></a></li>
			<li><a href="#" data-nav-section="sobre"><?= $menu_rodape3; ?></a></li>
			<li><a href="#" type="button" data-toggle="modal" data-target="#myModal"><?= $menu_rodape4; ?></a></li>
		</ul>
		<h3 class="fh5co-lead"><?= $btn_entre_contato; ?></h3>
		<p class="fh5co-social-icons">
			<a href="#"><i class="icon-linkedin"></i></a>
		</p>
		<h3 class="fh5co-lead hidden-lg hidden-md hidden-sm">Escolha o idioma</h3>
		<p class="fh5co-social-icons">
			<button onclick="window.location.href='?id=pt'" type="button" class="hidden-lg hidden-md hidden-sm btn btn-xs idioma-menu">PT</button>
			<button onclick="window.location.href='?id=es'" type="button" class="hidden-lg hidden-md hidden-sm btn btn-xs idioma-menu">ES</button>
		</p>
	</div>

	<div id="fh5co-menu" class="navbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">

					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
					<!-- botão modal desktop -->
					<button type="button" class="btn btn-primary pull-right btn-xs hidden-xs" data-toggle="modal" data-target="#myModal" style="margin: 20px 20px 0 0;">
						<?= $btn_entre_contato; ?>
					</button>

					<a href="https://www.praetium.com.br/" class="navbar-brand">
						<img src="images/logo.png" alt="">
					</a>

					<div class="pull-right hidden-xs">
						<div class="btn-group btn-group-xs" role="group" aria-label="...">
							<div class="btn-group" role="group">
							  <button onclick="window.location.href='?id=pt'" type="button" class="btn btn-xs <?= $idiomaPT; ?> idioma">PT</button>
							</div>
							<div class="btn-group" role="group">
							  <button onclick="window.location.href='?id=es'" type="button" class="btn btn-xs <?= $idiomaES; ?> idioma">ES</button>
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-page">
		<div id="fh5co-wrap">
			<header id="fh5co-hero" data-section="home" name="fh5co-hero" role="banner" style="background: url(images/bg-home.jpg) top left; background-size: cover;" >
				<div class="fh5co-overlay"></div>
				<div class="fh5co-intro">
					<div class="container">
						<div class="row">

							<div class="col-lg-12 col-md-12 fh5co-text text-center">
								<h2 class="to-animate intro-animate-1"><?= $titulo_destaque; ?></h2>
								<p class="to-animate intro-animate-2"><?= $descricao_destaque; ?></p>
								<p class="to-animate intro-animate-3">
									<a href="#" data-nav-section="sobre" class="btn btn-primary btn-md">
										<?= $btn_saiba_mais; ?>
									</a>
									<!-- botão modal desktop -->
									<button type="button" class="btn btn-primary btn-lg hidden-xs" data-toggle="modal" data-target="#myModal">
										<?= $btn_entre_contato; ?>
									</button>

									<!-- botão modal mobile -->
									<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-md visible-xs" style="width:270px; margin: auto;">
										<?= $btn_entre_contato; ?>
									</button>
								</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 hidden">
								<img src="images/capa-parox-site.png" class="img-responsive hidden-xs to-animate intro-animate-3"  style="margin-top: 92px;">
							</div>

						</div>
					</div>
				</div>
			</header>
			<!-- END .header -->

			<div id="fh5co-main">
				<div id="fh5co-clients" class="hidden">
					<div class="container">
						<div class="row text-center">
							<div class="col-md-3 col-sm-6 col-xs-6 to-animate">
								<figure class="fh5co-client"><img src="images/client_1.png" alt=""></figure>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6 to-animate">
								<figure class="fh5co-client"><img src="images/client_2.png" alt=""></figure>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6 to-animate">
								<figure class="fh5co-client"><img src="images/client_3.png" alt=""></figure>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6 to-animate">
								<figure class="fh5co-client"><img src="images/client_4.png" alt=""></figure>
							</div>
						</div>
					</div>
				</div>


			    <div id="fh5co-features-2" data-section="sobre" name="fh5co-features-2">
					<div class="fh5co-features-2-content">
					    <div class="container">
					    	<div class="row">
					    		<div class="col-md-8 col-md-offset-2 fh5co-section-heading text-center">
									<h2 class="fh5co-lead to-animate"><?= $titulo_sobre; ?></h2>
									<p class="fh5co-sub to-animate"><?= $descricao_sobre; ?></p>
								</div>
					    		<div class="col-md-4 fh5co-text-wrap">
					    			<div class="row text-center">
						    			<div class="col-md-12 col-sm-6 col-xs-6 col-xxs-12 fh5co-text animate-object features-2-animate-4">
											<picture class="fh5co-icon"><img class="img-fluid"  style="margin: auto; width: 80px; height: 80px;" src="images/equipe.png"></picture>
											<h4 class="fh5co-uppercase-sm"><?= $titulo_equipe1; ?></h4>
											<p><?= $descricao_equipe1; ?></p>
										</div>
						    			<div class="col-md-12 col-sm-6 col-xs-6 col-xxs-12 fh5co-text animate-object features-2-animate-3">
						    				<picture class="fh5co-icon"><img class="img-fluid"  style="margin: auto; width: 80px; height: 80px;" src="images/hands-on.png"></picture>
											<h4 class="fh5co-uppercase-sm"><?= $titulo_equipe2; ?></h4>
											<p><?= $descricao_equipe2; ?></p>
										</div>


									</div>
					    		</div>
					    		<div class="col-md-4 col-md-push-4 fh5co-text-wrap">
					    			<div class="row text-center">
						    			<div class="col-md-12 col-sm-6 col-xs-6 col-xxs-12 fh5co-text animate-object features-2-animate-5">
						    				<picture class="fh5co-icon"><img class="img-fluid"  style="margin: auto; width: 80px; height: 80px;" src="images/grafico.png"></picture>
											<h4 class="fh5co-uppercase-sm"><?= $titulo_equipe3; ?></h4>
											<p><?= $descricao_equipe3; ?></p>
										</div>
										<div class="col-md-12 col-sm-6 col-xs-6 col-xxs-12 fh5co-text animate-object features-2-animate-6">
											<picture class="fh5co-icon"><img class="img-fluid"  style="margin: auto; width: 80px; height: 80px;" src="images/negoiacao.png"></picture>
											<h4 class="fh5co-uppercase-sm"><?= $titulo_equipe4; ?></h4>
											<p><?= $descricao_equipe4; ?></p>
										</div>

									</div>
					    		</div>
					    		<div class="col-md-4 col-md-pull-4 fh5co-image animate-object features-2-animate-2">
					    			<p class="text-center">
					    			<img src="images/iphone_blank_2.png" class="" alt="Paroxismo Coletivo Web Studio">
					    			</p>
					    		</div>

					    	</div>
					    </div>
					</div>
			    </div>
			</div>
		</div>

		<footer id="fh5co-footer" style="">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-footer-content">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<h3 class="fh5co-lead">Praetium Ltd.</h3>
							<p>
								<?= $endereco_rodape; ?>
							</p>
							<a href="https://www.parox.com.br/" class="">
								<img src="images/parox.png" alt="">
							</a>
						</div>
						<div class="col-md-4 col-sm-4">
							<h3 class="fh5co-lead"><?= $titulo_menu_rodape; ?></h3>
							<ul>
								<li class=""><a href="#" data-nav-section="home"><?= $menu_rodape1; ?></a><hr></li>
								<li><a href="#" data-nav-section="sobre"><?= $menu_rodape2; ?></a><hr></li>
								<li><a href="#" data-nav-section="sobre"><?= $menu_rodape3; ?></a><hr></li>
								<li><a href="#" type="button" data-toggle="modal" data-target="#myModal"><?= $menu_rodape4; ?></a></li>
							</ul>
						</div>
						<div class="col-md-4 col-sm-4">
							<h3 class="fh5co-lead"><?= $btn_entre_contato; ?></h3>
							<p>
								info@praetium.com.br <br>
								+55 (11) 91020-9999

							</p>
							<p class="fh5co-copyright">
								Copyright <small>&copy; 2023 Praetium Ltd.
								</small>
							</p>
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-linkedin"></i></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- Owl Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- toCount -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

	<script type="text/javascript">
		function enviar()
		{
			
			if ( $('#nome').val().length == 0 )
			{
				alert('O preenchimento do campo é obrigatório');
				$('#nome').focus();
				return false;
			}

			if ( $('#email').val().length == 0 )
			{
				alert('O preenchimento do campo é obrigatório');
				$('#email').focus();
				return false;
			}

			if(!validacaoEmail(document.getElementById('email')))
			{
				alert('O e-mail digitado é inválido!'); 
				$('#email').focus();
				return false; 
			}

			if ( $('#telefone').val().length == 0 )
			{
				alert('O preenchimento do campo é obrigatório');
				$('#telefone').focus();
				return false;
			}

			if ( $('#mensagem').val().length == 0 )
			{
				alert('O preenchimento do campo é obrigatório');
				$('#mensagem').focus();
				return false;
			}

			$('#status').html('Enviando mensagem');
			$( "#status" ).addClass( "alert-warning" );
			$( "#status" ).removeClass("hidden");
			$('#btnEnviar').attr('disabled', true);
			var form_data = $('#frmForm').serialize();

			$.ajax
			(
				{
					url: "index.php",
					data: form_data,
					type: 'POST', 
					success: function (resposta, status) 
					{
						$('#status').html(resposta);
						$('#btnEnviar').attr('disabled', false);
						$('#nome').val('');
						$('#email').val('');
						$('#telefone').val('');
						$('#mensagem').val('');
						$( "#status" ).addClass( "alert-success" );
						$( "#status" ).removeClass( "alert-warning" );
					},
					error: function(resposta)
					{
						alert('erro: ' + resposta.responseText);
						window.location.reload();
					},
					fail: function(resposta)
					{
						alert('erro: ' + resposta.responseText);
						window.location.reload();
					}
				}
			);
		}

		function mask(o) {
			setTimeout(function() {
				var v = mphone(o.value);
				if (v != o.value) {
				o.value = v;
				}
			}, 1);
			}  
			function mphone(v) {
			var r = v.replace(/\D/g, "");
			r = r.replace(/^0/, "");
			if (r.length > 10) {
				r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
			} else if (r.length > 5) {
				r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
			} else if (r.length > 2) {
				r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
			} else {
				r = r.replace(/^(\d*)/, "($1");
			}
		return r;
		}

		function validacaoEmail(field)
			{
				usuario = field.value.substring(0, field.value.indexOf("@"));
				dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
			
				if ((usuario.length >=1) &&
				(dominio.length >=3) &&
				(usuario.search("@")==-1) &&
				(dominio.search("@")==-1) &&
				(usuario.search(" ")==-1) &&
				(dominio.search(" ")==-1) &&
				(dominio.search(".")!=-1) &&
				(dominio.indexOf(".") >=1)&&
				(dominio.lastIndexOf(".") < dominio.length - 1)) 
				{
					return true;
				}
				else
				{
					return false;
					//alert("E-mail invalido");
				}
			}
	</script>


	</body>
</html>
