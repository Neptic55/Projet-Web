<?php
include_once 'singleton.php';
require_once 'errors.php';


if (isset($_SESSION['username'])){
    session_destroy();
    alert("Vous êtes maintenant déconnecté");
    exit();

}
else{
    alert("Vous n'êtes pas connecté, impossible de se déconnecter");
}