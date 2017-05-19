<!DOCTYPE html>
<html lang="fr">

	<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="zoombox/zoombox.js"></script>
	<link href="zoombox/zoombox.css" rel="stylesheet" type="text/css" media="screen" />
	<meta charset="UTF-8">
    <link href="page.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet"  href="{{ asset('css/shopHome.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<?php
		if(isset($_POST['submit_commentaire'])){
			if(isset($_POST['pseudo'],$_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire'])) {
				$pseudo=htmlspecialchars($_POST['pseudo']);
				$commentaire=htmlspecialchars($_POST['commentaire']);
			} else {
				$c_erreur = "Tous les champs doivent être complétés";
			}
		}
	
	
	
	?>
		<body>
		<div class="container-fluid">
			<div class="row" id="leheader">
				<img src="img\logo.jpg" alt="identite" class="col-lg-offset-5 col-md-5" id="img1">
			</div>
			<div class="row">
			<?php
			$_GET['varname']
			?>
			</div>
				<button type="button" class="btn" id="decal1">J'aime</button>
			<div class="row">
				<h2>Commentaire :</h2>
				<form method="POST">
					<input type="text" name="pseudo" placeholder="Votre pseudo"/>
					<textarea name="commentaire" placeholder="Votre commentaire"></textarea>
					<input type="submit" value="Poster mon commentaire" name="submit_commentaire" />
				</form>
			</div>
		</div>
		</body>
		
</html>