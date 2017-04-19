<?php

if(!empty($_FILES)) {

    $img= $_FILES['img'];
    move_uploaded_file($img['tmp_name'],"albums/".$img['name']);

}
?>