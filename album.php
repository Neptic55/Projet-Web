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
	<body>
	<div class="container-fluid">
			<div class="row" id="leheader">
				<img src="img\logo.jpg" alt="identite" class="col-lg-offset-5 col-md-5" id="img1">
			</div>
	</div>
		<?php
		$dos = "albums/general/miniature/";
		$dir = opendir($dos);
		while ($file = readdir($dir)){
			$allow_ext = array("jpg",'png','gif','jpeg');
			$ext = strtolower(substr($file,-3));

		}
		?>

		<a href="Photo.php" id="clique"><div class="miniature">

			<?php
			$liste = array();
				opendir('albums/general/miniature/');
				for($i=0; $f=readdir(); $i++){
					$liste[$i] = $f ;
				} 

				foreach ($liste as $photo) {
					echo "<img src='albums/general/miniature/$photo' /> ";
					}
			?>
		</div></a>
	</body>
</html>