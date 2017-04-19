<!DOCTYPE html>
<html lang="fr">
	<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
     <script type="text/javascript" src="zoombox/zoombox.js"></script>
	 <link href="zoombox/zoombox.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
	<body>
<?php
$dos = "albums/general/miniature/";
$dir = opendir($dos);
while ($file = readdir($dir)){
    $allow_ext = array("jpg",'png','gif','jpeg');
    $ext = strtolower(substr($file,-3));

}
?>

	<div class="miniature">

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




	</div>
	</body>
</html>