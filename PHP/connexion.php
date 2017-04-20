<?php
session_start();
include_once 'singleton.php';
include_once 'config.php';
include_once  'API.php';
include_once 'errors.php';


    if (!isset($_SESSION['id'])){   //première connexion
        $_SESSION['id']="";
    }

    $id=$_SESSION['id'];

    if ($id!=0) {alert('Vous êtes déja connecté');
        echo "<script>document.location.href='../page.php'     </script>";} //verif connexion

    else{
        if (empty($_POST['email']) || empty($_POST['password'])){   //oubli de champ
            alert("Un ou plusieurs champs sont vides");
            echo "<script>document.location.href='../page.php'     </script>";
        }
        else {
            $PDO = singleton::getInstance();
            $query = $PDO->prepare("SELECT * FROM members WHERE email = :email");   //va chercher l'enregistrement
            $query->execute(array(':email'=> $_POST['email']));

            $data = $query->fetch();
            if (md5($data['password']) == md5($_POST['password'])) {      //Connecté
                $_SESSION['username'] = $data['name'] . $data['surname'];
                $_SESSION['permissionLevel'] = $data['permissionLevel'];
                $_SESSION['idMember'] = $data['idMember'];
                $_SESSION['avatar'] = $data['avatar'];
                alert("Vous êtes bien connecté avec le compte $_SESSION[username]");
                $_SESSION['id']=1;

                echo "<script>document.location.href='../page.php'     </script>";




            } else {
                alert("Erreur durant l'authentification, mail ou mot de passe incorrect");
                echo "<script>document.location.href='../page.php'     </script>";
            } //erreur
            $query->CloseCursor();
        }


    }
