<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Mon site pro</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="public/assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="public/assets/css/main.css">

</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="public/assets/images/logo.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.php">Accueil</a></li>
					<li><a href="index.php?action=listPosts">BLOG</a></li>
					<li><a class="btn" href="admin.php?action=SignUp">Inscription</a></li>
					<li><a class="btn" href="admin.php?action=SignIn">Connexion</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">Issany Imane</h1>
				<p class="tagline">Je suis le morceau de code qui manque a votre entreprise</p>
				<p><a class="btn btn-default btn-lg" role="button" href="#section">en savoir plus</a> <a class="btn btn-action btn-lg" role="button">Mon CV</a></p>
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">A propos</h2>
		<p class="text-muted">
		Après un bac S et un BTS SIO je me retrouve au cœur du langage PHP grâce a la formation Développeur d’application - PHP/Symfony, avec cette formation proposer par openclassroom j’ai acquis de l’autonomie, détermination, curiosité, adaptation au besoin d’un client, flexibilité, ainsi que la maitrise des langages suivants : HTML/CSS/PHP et l’analyse d’un cahier des charges en apportant une réponse convenable aux demandes du client.
		</p>
	</div>
	<!-- /Intro-->
		
	<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
		<div class="container" id="section">
			
			<h3 class="text-center thin">Pourquoi m'engager</h3>
			
			<div class="row">
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-cogs fa-5"></i>Résultat a la hauteur de l'attende du client</h4></div>
					<div class="h-body text-center">
						<p>Je met mes compétences a votre service pour un résultat impécable et un rendu 
						qui correspond a la demande du client </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-flash fa-5"></i>le respect des délais un engagement</h4></div>
					<div class="h-body text-center">
						<p>Afin de vous proposer un service de qualité, je vous informerais a l'avance
						du délais nécessaire pour la livraison du produit finale </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-heart fa-5"></i>Créativité et flexibilité</h4>
					</div>
					<div class="h-body text-center">
						<p>je saurais m'adapté a vos exigences est attentes ainsi que vous diriger vers le design qui répondra au mieux a vos attentes</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-smile-o fa-5"></i>dans l'attentes de vos 
					retours</h4>
					</div>
					<div class="h-body text-center">
						<p>Si mes services vous ont satisfait je serais dans l'attentes de vos retours afin
						de m'améliorer et vous proposer une meilleur qualité et prendre compte de vos demandes</p>
					</div>
				</div>
			</div> <!-- /row  -->	
		</div>
	</div>
	<!-- /Highlights -->

	

  		<div class="jumbotron top-space">
  			<header class="page-header">
					<h1 class="page-title">Contact</h1>
				</header>
				
				<p>
					N'hésiter pas a me contacter, je vous répondrais dans les plus proche délais. 
				</p>
				<br>

			<form method="POST">
				<div class="row">
					<div class="col-sm-4">
						<input name="lastname" class="form-control" type="text" placeholder="Nom">
					</div>
					<div class="col-sm-4">
						<input name="firstname" class="form-control" type="text" placeholder="Prénom">
					</div>
					<div class="col-sm-4">
						<input name="email" class="form-control" type="text" placeholder="E-mail">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12">
						<textarea name="message" placeholder="Votre message" class="form-control" rows="9"></textarea>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12 text-right">
						<input class="btn btn-action" type="submit" value="Envoyer">
					</div>
				</div>
			</form>
  		</div>

  		

</div>	<!-- /container -->
	
	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


	<footer id="footer" class="top-space">

		<!-- footer 1 div was removed -->

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="follow-me-icons clearfix">
				            	<a href=""><i class="fa fa-twitter fa-2"></i></a>
				             	<a href=""><i class="fa fa-dribbble fa-2"></i></a>
				                <a href=""><i class="fa fa-github fa-2"></i></a>
				                <a href=""><i class="fa fa-facebook fa-2"></i></a>
				            </p>  
				            <p class="simplenav">
				            	<a href="admin.php?action=admin">Interface Admin</a>
				            </p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2018,Issany Imane
							</p>
						</div>
					</div>
				</div> 
			</div>
		</div>

	</footer>	
		

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="public/assets/js/headroom.min.js"></script>
	<script src="public/assets/js/jQuery.headroom.min.js"></script>
	<script src="public/assets/js/template.js"></script>
</body>
</html>