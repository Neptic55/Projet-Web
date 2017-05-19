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
		include_once 'PHP/singleton.php';
		$PDO = singleton::getInstance();
	
	if(isset($_GET['id']) and !empty($_GET['id'])) {
		
		$getid=htmlspecialchars($_GET['id']);
		
		$article = $bdd->prepare('SELECT * FROM projetbde WHERE id=?');
		$article->execute(array($getid));
		$article = $article->fetch();
		
		$likes = $bdd->prepare('SELECT id FROM likes WHERE id_article = ?');
		$likes->execute(array($id));
		$likes = $likes->rowCount();
		
		$dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ?');
		$dislikes->execute(array($id));
		$dislikes = $dislikes->rowCount();
		
		if(isset($_POST['submit_commentaire'])){
			if(isset($_POST['pseudo'],$_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire'])) {
				$pseudo=htmlspecialchars($_POST['pseudo']);
				$commentaire=htmlspecialchars($_POST['commentaire']);
				
				if(strlen($pseudo) < 25) {
					$ins = $bdd->prepare('INSERT INTO commentaire(pseudo, commentaire, id_article) VALUES (?,?,?)');
					$ins->execute(array($pseudo,$commentaire,$getid));
					$c_msg = "<span style='color:green'> Votre commentaire a bien été posté </span>";
				} else {
				$c_msg = "Erreur : Le pseudo doit faire moins de 25 caractères";
				}
			} else {
				$c_msg = "Erreur : Tous les champs doivent être complétés";
			}
		}
		
		$commentaire = $bdd->prepare('SELECT * FROM commentaire WHERE id_article = ? ORDER BY id DESC');
		$commentaire->execute(array($getid));
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
				<button type="button" class="btn"><a href="PHP/action.php?t=1&id=<?= $id ?>">J'aime</a>(<?= $likes ?>)</button>
				<button type="button" class="btn"><a href="PHP/action.php?t=2&id=<?= $id ?>">Je n'aime pas</a>(<?= $dislikes ?>)</button>
			<div class="row">
				<h2>Commentaire :</h2>
				<form method="POST">
					<input type="text" name="pseudo" placeholder="Votre pseudo"/>
					<textarea name="commentaire" placeholder="Votre commentaire"></textarea>
					<input type="submit" value="Poster mon commentaire" name="submit_commentaire" />
				</form>
				<?php if(isset($c_msg)) {echo $c_msg; } ?>
			</div>
			<?php while($c = $commentaire->fetch()) { ?>
				<b><?= $c['pseudo']?>:</b> <?= $c['commentaire']?><br />
			<?php } ?>
		</div>
		</body>
		
</html>