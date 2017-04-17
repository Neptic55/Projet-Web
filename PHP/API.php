<?php

include_once 'singleton.php';
include_once 'config.php';


interface model
{
    public function __construct($idMember, $name, $surname, $email, $role, $password, $permissionLevel, $avatar);
    public function comActivityDisplay($idActivity);
}

class userModel implements model
{
    public $idMember;
    public $name;
    public $surname;
    public $email;
    public $role;
    public $password;
    public $permissionLevel;
    public $avatar;

    public function __construct($idMember, $name, $surname, $email, $role, $password, $permissionLevel, $avatar)
    {
        $this->idMember = $idMember;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
        $this->permissionLevel = $permissionLevel;
        $this->avatar = $avatar;
    }

    public function comActivityDisplay($idActivity)     //display Activity comments
    {
        $PDO = singleton::getInstance();
        $rawresult = $PDO->query("SELECT * FROM comActivity WHERE idActivity = $idActivity");

        $comments = []; //create all comments array
        foreach ($rawresult as $line) {
            $newObject = new self($line['idCom'], $line['idMember'], $line['dateCom'], $line['commentary']);
            $newObject->id = $rawresult['id'];
            array_push($comments, $newObject);
        }
        return $comments;
    }
}
