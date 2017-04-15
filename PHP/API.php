<?php

include_once 'singleton.php';
include_once 'config.php';


interface model
{
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
}