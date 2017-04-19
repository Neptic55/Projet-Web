<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BDE CESI LYON</title>
    <link href="page.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet"  href="{{ asset('css/shopHome.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php
include_once 'PHP\singleton.php';
include_once 'PHP\config.php';
include_once 'PHP\API.php';
include_once 'PHP\errors.php';
 
	?>


	<div class="container-fluid">
		<div class="row" id="leheader">
			<img src="img\logo.png" alt="identite" class="col-md-2" id="img1">
			
			
			<nav class="col-lg-offset-1 col-md-1">
				<a href="#activite"><h1>Activités</h1></a>
				<a href="#boutique"><h1>Boutique</h1></a>
				<a href="#reseau"><h1>Réseaux sociaux</h1></a>
			</nav>
			<nav class="col-lg-offset-1 col-md-1">
				<a href="#photo"><h1>Photos</h1></a>
				<a href="#contact"><h1>Nous contacter</h1></a>
			</nav>
			
			<div class="col-lg-offset-3 col-md-3" id="connexion">
				<form class="form-horizontal" role="form" method="post" action="PHP/connexion.php">
				<h2 class="col-md-offset-6 col-md-3">Connexion</h2>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-6 control-label">Email</label>
						<div class="col-md-6">
						<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-6 control-label">Mot de passe</label>
						<div class="col-sm-6">
						  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-6 col-sm-6">
						  <div class="checkbox">
							<label>
							  <input type="checkbox"> Se souvenir de moi
							</label>
						  </div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-6 col-sm-6">
						  <button type="submit" class="btn btn-default">Connexion</button>
						</div>
					</div>
				</form>

				<button type="submit" class="btn btn-default"><a href="inscription.php">S'inscrire</a></button>

				<form class="form-horizontal" action="PHP\deconnexion.php">
				<button type="button" class="btn btn-default">Deconnexion</button>
				</form>




			<?php if ($_SESSION['id'] == 0){ echo "<p> DECONNECTE  </p>";}
				else{ echo "<img src='img/sphere.png'>";}
			?>


			</div>
		</div>

		<div class="row" id="activite">
			 <nav class="col-md-1" id="navigation">
			<h2>Activités</h2>
			</nav>
			<section class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">News</div>
				<div class="panel-body">Remplir ce tableau de news.</div>
			</div>
			</section>
			<section class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Liste d'activités</div>
				<div class="panel-body">
				<li> <a href="pagebasket.html">Basket</a></li>
				<li> <a href="pagepeinture.html">Peinture</a></li>
				<li> <a href="pagecinéma.html">Cinéma</a></li>
				<li> <a href="pagefootball.html">Football</a></li>
				<li> <a href="pagemusique.html">Musique</a></li>
				<li> <a href="pagejeux.html">Jeux-vidéos</a></li>
				</div>
			</div>
			</section>
			<section class="col-md-3">
			<h3>Proposition d'activités</h3>
			<form action="/ma-page-de-traitement" method="post">
				<div>
					<label for="nom">Nom :</label>
					<input type="text" id="nom" />
				</div>
				<div>
					<label for="nom">Promo :</label>
					<input type="text" id="promo" />
				</div>
				<div>
					<label for="message">Message :</label>
					<textarea id="message"></textarea>
				</div>
				
				<div class="button">
					<button type="submit">Envoyer votre message</button>
				</div>
			</form>
			</section>
		</div>
		
		<div class="row" id="photo">
			 <nav class="col-md-1" id="navigation">
			<h2>Photos</h2>
			</nav>
			<section class="col-lg-offset-1 col-md-2">
			<button type="button" class="btn"><a href="album.html">Voir toutes les photos</a></button>
			</section>
			<section class="col-lg-offset-1 col-md-3">
			Vous pouvez voir tout les photos en cliquant sur le bouton de gauche et ajouter des photos avec un choix d'album en cliquant sur le bouton de droite
			</section>
			<section class="col-lg-offset-1 col-md-2">
				<!-- Debut du formulaire -->
				<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<fieldset>
						<legend>Formulaire</legend>
						  <p>
							<label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
							<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
							<input name="fichier" type="file" id="fichier_a_uploader" />
							<input type="submit" name="submit" value="Uploader" />
						  </p>
					  </fieldset>
				</form>
				<!-- Fin du formulaire -->
			</section>
		</div>
		
		<div class="row" id="boutique">
			 <nav class="col-md-1" id="navigation">
			<h2>Boutique</h2>
			</nav>
			<section class="col-lg-offset-2 col-md-3" >
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
					<div class="item active">
					  <img src="img/gobelet.jpg" alt="gobelet">
					  <div class="carousel-caption">
					  <h3>Gobelet</h3>
					  </div>
					</div>
					<div class="item">
					  <img src="img/sweat.jpg" alt="sweat">
					  <div class="carousel-caption">
					  <h3>Sweat</h3>
					  </div>
					</div>
					<div class="item">
					  <img src="img/pull.jpg" alt="pull">
					  <div class="carousel-caption">
					  <h3>Pull</h3>
					  </div>
					</div>
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</section>
			<section class="col-lg-offset-2 col-md-1">		
				<button type="button" class="btn"><a href="boutique.html">Accès Boutique</a></button>		
			</section>
		</div>
		
		<div class="row" id="contact">
			 <nav class="col-md-1" id="navigation">
			<h2>Nous contacter</h2>
			</nav>
			<section class="col-lg-offset-1 col-md-5">
			<form action="/ma-page-de-traitement" method="post" class="text-center">
				<div>
					<label for="nom">Nom :</label>
					<input type="text" id="nom" />
				</div>
				<div>
					<label for="nom">Promo :</label>
					<input type="text" id="promo" />
				</div>
				<div>
					<label for="courriel">Courriel :</label>
					<input type="email" id="courriel" />
				</div>
				<div>
					<label for="nom">Sujet :</label>
					<input type="text" id="sujet" />
				</div>
				<div>
					<label for="message">Message :</label>
					<textarea id="message"></textarea>
				</div>
				
				<div class="button">
					<button type="submit">Envoyer votre message</button>
				</div>
			</form>
			</section>
			<section class="col-lg-offset-1 col-md-2">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11130.044145182013!2d4.766208327129194!3d45.780988700911045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ecea4de46df3%3A0x5a501576826999d8!2sCentre+de+formation+CESI+Lyon!5e0!3m2!1sfr!2sfr!4v1492268005724" width="510" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</section>
		</div>
		 
		<footer class="row" id="reseau">
			<section class="col-md-1" id="navigation">
				<h2>Réseaux Sociaux</h2>
			</section>
			<section class="col-md-6">
				Réseaux Sociaux
				<div class="fb2"><p> Pour accéder à notre page fb clique<a href="https://www.facebook.com/BDECesiLyon/?fref=ts">ici</a> ou sur l'image !</p>
				<a href="https://www.facebook.com/BDECesiLyon/?fref=ts"><img src="img\Facebook.png" alt="identite" id="fb"></a></div>
			</section>
			<section class="col-md-5">
				Copyrights
			</section>
		</footer>
	
	</div>



</body>
</html>