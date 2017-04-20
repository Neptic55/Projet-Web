<?php
session_start();
include_once 'singleton.php';
require_once 'errors.php';


if ($_SESSION['id'] != 0){
    session_abort();
    alert("Vous êtes maintenant déconnecté");
    session_start();
    $_SESSION['id'] = 0;

}
else{
    alert("Vous n'êtes pas connecté, impossible de se déconnecter");
}
echo "<script>document.location.href='../page.php'</script>";