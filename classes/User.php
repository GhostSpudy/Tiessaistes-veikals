<?php

namespace classes;

class User {

    protected $loggin;
    protected $password;
    protected $name;
    protected $surname;
    protected $email;

    public function __construct($array = array()) {
        $this->loggin = $array["loggin"];
        $this->password = password_hash($array["password"], PASSWORD_DEFAULT);
        $this->name = $array["name"];
        $this->surname = $array["surname"];
        $this->email = $array["email"];
    }

}

?>