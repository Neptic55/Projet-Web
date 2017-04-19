<?php
include_once 'singleton.php';
include_once 'config.php';
include_once 'errors.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

if ($password1 != $password2){  //verif password
    alert("Your password isn't the same in both inputs");
    echo "<script>document.location.href='../inscription.php'</script>";
}else{
    $PDO = singleton::getInstance();
    $query = $PDO->prepare("INSERT INTO members (name, surname, avatar, email, role, password, permissionLevel)
                                      VALUES (:name, :surname, 'img\default-avatar.png', :email, 'student', :password, 1)");
    $query->execute(array(':name'=> $name, ':surname'=>$surname, ':email'=>$email, ':password'=>$password1) );
}
echo "<script>document.location.href='../page.php'</script>";
