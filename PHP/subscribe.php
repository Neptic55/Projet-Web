<?php
include_once 'singleton.php';
include_once 'config.php';
include_once 'errors.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];


$PDO = singleton::getInstance();
$query = $PDO->prepare("SELECT * FROM members WHERE email = :email");
$query->execute(array(':email'=>$email));
$data = $query->fetch();


if ($password1 != $password2){  //verif password
    alert("Votre mot de passe n'est pas le même dans vos deux champs");
    echo "<script>document.location.href='../inscription.php'</script>";
}elseif(    $email != $data['email']){  //verif email n'existe pas

    if (empty($password1)){
        alert("Veuillez indiquer un mot de passe");
        echo "<script>document.location.href='../inscription.php'</script>";
    }
    else{
        $PDO = singleton::getInstance();
        //INSERT données
        $query = $PDO->prepare("INSERT INTO members (name, surname, avatar, email, role, password, permissionLevel)
                                      VALUES (:name, :surname, 'img/default-avatar.png', :email, 'student', :password, 1)");
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':surname', $surname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password1, PDO::PARAM_STR);

        $query->execute();
        $query->closeCursor();
    }

}
else{
    alert("Un compte est déja associé au mail entré");
    echo "<script>document.location.href='../inscription.php'</script>";
}
echo "<script>document.location.href='../page.php'</script>";
