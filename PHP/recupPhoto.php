<?php

if(!empty($_FILES)) {

    $img = $_FILES['img'];
    $ext = strtolower(substr($img['name'],-3,));
    $allow_ext = array("jpg",'png','gif','jpeg');
    if(in_array($ext,$allow_ext)) {
        move_uploaded_file($img['tmp_name'], "albums/" . $img['name']);
    }
    else {
        $erreur = "Votre fichier n'est pas une image";
    }
}

if(isset($erreur)){
    echo $erreur;
}
?>