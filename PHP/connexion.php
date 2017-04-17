<?php
include_once 'singleton.php';
include_once 'config.php';
include_once  'API.php';
include_once 'errors.php';

session_start();
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
echo "BIENVENUE SUR LA PAGE DE CONNEXION";

if ($id!=0) alert('Vous êtes déja connecté');
if (empty($_POST['email']) || empty($_POST['password'])){   //oubli de champ
    alert("Un ou plusieurs champs sont vides");
}
else{
    $PDO = singleton::getInstance();
    $query = $PDO->prepare("SELECT * FROM members WHERE email = :email");
    $query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $query->execute();

    $data=$query->fetch();
    if ($data['password'] == md5($_POST['password'])){      //Connecté
        $_SESSION['username'] = $data['name'].$data['surname'];
        $_SESSION['permissionLevel'] = $data['permissionLevel'];
        $_SESSION['id'] = $data['idMember'];
        $_SESSION['avatar'] = $data['avatar'];
        alert("Vous êtes bien connecté avec le compte $_SESSION[username]");


    }
    else{ alert("Erreur durant l'authentification, mail ou mot de passe incorrect");  } //erreur
    $query->CloseCursor();


}