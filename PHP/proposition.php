<?php
session_start();
include_once 'singleton.php';
include_once 'config.php';
include_once 'errors.php';


if (empty($_SESSION['proposition'])){
    alert("Le champ de proposition est vide");
    echo "<script>document.location.href='../page.php'</script>";
}
else{
    $PDO = singleton::getInstance();
    $query = $PDO->prepare("INSERT INTO idea (title, description, vote, idMembre) 
                                      VALUES (:title, :description, :vote, :idMembre)");
    $query->execute(array(':title'=> $_POST['ideaTitle'], ':description'=>$_POST['idea'], ':vote'=>0, 'idMember'=>$_SESSION['idMember']));

}
echo "<script>document.location.href='../page.php'</script>";