<?php 
	session_start();
	?>
<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BDE CESI LYON</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/shopHome.css')}}">
    <link rel="stylesheet" href="page.css">
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
		<?php if ($_SESSION['id'] == 0)	{ echo "<div class='col-md-2' id='connexion'><img src='img/reddot.png' width=50px height=50px class='col-sm-offset-10'></div>";}	//IMAGE CO/DECO
				else{ echo "<img src='img/greendot.png' width=100px height=100px>";}
		?>
			
<?php
if($_SESSION['id'] == 0){
	echo "<div class=' col-md-4' id='connexion'>
				<form class='form-horizontal' role='form' method='post' action='PHP/connexion.php'>
				<h2 class='col-md-offset-6 col-md-3'>Connexion</h2>
					<div class='form-group'>
						<label for='inputEmail3' class='col-sm-6 control-label'>Email</label>
						<div class='col-md-6'>
						<input type='email' class='form-control' id='inputEmail3' placeholder='Email' name='email'>
						</div>
					</div>
					<div class='form-group'>
						<label for='inputPassword3' class='col-sm-6 control-label'>Mot de passe</label>
						<div class='col-sm-6'>
						  <input type='password' class='form-control' id='inputPassword3' placeholder='Password' name='password'>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-offset-6 col-sm-6'>
						  <div class='checkbox'>
							<label>
							  <input type='checkbox'> Se souvenir de moi
							</label>
						  </div>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-offset-6 col-sm-1'>
						  <button type='submit' class='btn btn-default'>Connexion</button>
						</div>
						<div class='col-sm-offset-2 col-sm-1'>  
						<button type='button' class='btn btn-default'><a href='inscription.php'>S'inscrire</a></button>
						</div>
					</div>
				</form>
"
;}
?>
			<?php	
			if ($_SESSION['id'] == 1) {
							echo "
			<div class='col-sm-offset-4 col-sm-1' id='connexion'>
				<form class='form-horizontal' role='form' action='PHP\deconnexion.php'>
				<button type='submit' class='btn btn-default'>Deconnexion</button>
				</form>
			</div>
			";
			}


			?>





			</div>
		</div>

		<div class="row" id="activite">
			 <nav class="col-md-1" id="navigation1">
			<h2>Activités</h2>
			</nav>
			<section class="col-md-4">
			<div class="panel panel-default" id="decal5">
				<div class="panel-heading">News</div>
				<div class="panel-body" >Remplir ce tableau de news.</div>
			</div>
			</section>
			<section class="col-md-4">
			<div class="panel panel-default" id="decal6">
				<div class="panel-heading">Liste d'activités</div>
				<div class="panel-body">
				<li> <a href="construct.php">Basket</a></li>
				<li> <a href="construct.php">Peinture</a></li>
				<li> <a href="construct.php">Cinéma</a></li>
				<li> <a href="construct.php">Football</a></li>
				<li> <a href="construct.php">Musique</a></li>
				<li> <a href="construct.php">Jeux-vidéos</a></li>
				</div>
			</div>
			</section>
			<section class="col-md-3" style='color: black;'>
			<h3>Proposition d'activités</h3>
			<form action="PHP/proposition.php" method="post" name="ideaForm">
				

				<p>Nom de l'activité</p>
				<input type="text" name="ideaTitle"/>
				

				<p>Message</p>
				<input type="text" name="idea"/>
				
				
				<div class="button">
					<button type="submit">Envoyer votre idée</button>
				</div>
			</form>
			</section>
		</div>
		
		<div class="row" id="photo">
			 <nav class="col-md-1" id="navigation2">
			<h2>Photos</h2>
			</nav>
			<section class="col-lg-offset-1 col-md-2">
			<button type="button" class="btn" id="decal1"><a href="album.php">Voir toutes les photos</a></button>
			</section>
			<section class="col-lg-offset-1 col-md-3" id="decal2">
			Vous pouvez voir tout les photos en cliquant sur le bouton de gauche et ajouter des photos avec un choix d'album en cliquant sur le bouton de droite
			</section>
			<section class="col-lg-offset-1 col-md-2" id="decal3">
				<form method="post" action="PHP/recupPhoto.php" enctype="multipart/form-data" name="picture">
					<input type="file" name="img"/>
					<input type="submit" name="Envoyer"/>
				</form>
			</section>
		</div>
		
		<div class="row" id="boutique">
			<nav class="col-md-1" id="navigation3">
			<h2>Boutique</h2>
			</nav>
			<section class="col-lg-offset-2 col-md-3" id="decal4">
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
				<button type="button" class="btn" id="decal7"><a href="boutique.php">Accès Boutique</a></button>		
			</section>
		</div>
		
		<div class="row" id="contact">
			 <nav class="col-md-1" id="navigation4">
			<h2>Nous contacter</h2>
			</nav>
			<section class="col-lg-offset-1 col-md-5">
			<form action="construct.php" method="post" class="text-center" id="decal8" style='color: white;'>
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
			<section class="col-lg-offset-1 col-md-2" id="decal9">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11130.044145182013!2d4.766208327129194!3d45.780988700911045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ecea4de46df3%3A0x5a501576826999d8!2sCentre+de+formation+CESI+Lyon!5e0!3m2!1sfr!2sfr!4v1492268005724" width="510" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</section>
		</div>
		 
		<footer class="row" id="reseau" style='color: white;'>
			<section class="col-md-1" id="navigation5">
				<h2>Réseaux Sociaux</h2>
			</section>
			<section class="col-md-6">
				Réseaux Sociaux
				<div class="fb2"><p> Pour accéder à notre page fb clique<a href="https://www.facebook.com/BDECesiLyon/?fref=ts" >ici</a> ou sur l'image !</p>
				<a href="https://www.facebook.com/BDECesiLyon/?fref=ts"><img src="img\Facebook.png" alt="identite" id="fb" width=50%></a></div>
			</section>
			<section class="col-md-5">
				Copyrights
			</section>
		</footer>
	
	</div>



</body>
</html>