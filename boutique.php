<?php
include_once 'PHP\singleton.php';
include_once 'PHP\config.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Boutique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css" media="screen" charset="utf-8">
	</head>
	
	<body>
	<div id="header">
		<div class="wrap">
			<div class="menu">
				<a href="#" class="logo">Shoppi</a>
				<h1>La boutique des boutiques</h1>
				<ul class="panier">
					<li class="caddie"><a href="#">Caddie</a></li>
					<li class="items">
						Items
						<span>0</span>
					</li>
					<li class="total">
						TOTAL
						<span>0.0 €</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="home">
		<div class="row">
			<div class="wrap">
				<div class="box">
					<div class="product full">
						<a href="#">
							<img src="img/gobelet.jpg">
						</a>
						<div class="description">
							Verre
							<a href="#" class="price">5 $<a>
						</div>
						<a href="#" class="gift">
						Gift
						</a>
						<div class="rating">
							<span>Etoile :</span>
							<ul>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#" class="off">5</a></li>
							</ul>
						</div>
						<a class="add" href="#">
							add
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="pagination">
		<ul class="wrap">
			<li><a href="#">Prev</a></li>
			<li class="page">Page : <a href="#">2</a> of 3</li>
			<li><a href="#">Next</a></li>
		</ul>
	</div>
			
	</body>
</html>	
	