<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'inscription BDE</title>
    <link href="page.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet"  href="{{ asset('css/shopHome.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container-fluid">
		<div class="row" id="leheader">
			<img src="img\logo.jpg" alt="identite" class="col-lg-offset-5 col-md-5" id="img1">
		</div>

		<div class="row">
			<form action="PHP/subscribe.php" method="post" class="col-lg-offset-5 col-md-5">
				<div>
					<label for="courriel">Email :</label>
					<input type="email" id="courriel" name="email"/>
				</div>
				<div>
					<label for="nom">Prénom :</label>
					<input type="text" id="nom" name="name"/>
				</div>
				<div>
					<label for="nom">Nom :</label>
					<input type="text" id="surname" name="surname"/>
				</div>
				<div>
						<label for="inputPassword3">Mot de passe</label>
						 <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password1">
				</div>
				<div>
						<label for="inputPassword3">Confirmer le mot de passe</label>
						 <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password2">
				</div>
				<div class="button">
					<button type="submit">Envoyer inscription</button>
				</div>
			</form>
		</div>
	</div>

</body>
</html>