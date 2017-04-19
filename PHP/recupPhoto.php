<?php

if(!empty($_FILES)) {
    require("imgClass.php");
    $img = $_FILES['img'];
    $ext = strtolower(substr($img['name'],-3));
    $allow_ext = array("jpg",'png','gif','jpeg');
    if(in_array($ext,$allow_ext)) {
        move_uploaded_file($img['tmp_name'], "../albums/general/" . $img['name']);
        Img::creerMin("../albums/general/" . $img['name'],"../albums/general/miniature",$img['name'],215,112);
    }
    else {
        $erreur = "Votre fichier n'est pas une image";
    }
}

if(isset($erreur)){
    echo $erreur;
}

$dos = "image/min";
$dir = opendir($dos);
while ($file = readdir($dir)){
    $allow_ext = array("jpg",'png','gif','jpeg');
    $ext = strtolower(substr($file,-3));
    if(in_array($ext,$allow_ext)) {
        echo $file;
    }
}
?>