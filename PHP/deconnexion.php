<?php
include_once 'singleton.php';
require_once 'errors.php';


if (isset($_SESSION)){
    session_destroy();
    alert("Vous êtes maintenant déconnecté");

}
else{
    alert
}