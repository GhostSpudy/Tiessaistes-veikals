<?php

namespace classes;

use classes\DB;

require_once "Db.php";

class ChangeData {

    protected $id;
    protected $loggin;
    protected $currentPassword;
    protected $password;
    protected $newPassword;
    protected $name;
    protected $surname;
    protected $email;

    public function __construct($array = array(), $id) {
        $this->id = $id;
        $this->loggin = $array["loggin"];
        $this->currentPassword = $array["currentPassword"];
        $this->password = $array["password"];
        $this->name = $array["name"];
        $this->surname = $array["surname"];
        $this->email = $array["email"];

        $this->checkPassword();
    }

    private function checkPassword() {
        if ($this->password) {
            $db = new DB();

            $passwordQuery = $db->query("SELECT `password` FROM `users` WHERE `id` = '$this->id'");

            $passwordFromDB = $passwordQuery[0]['password'];
            
            if(password_verify($this->currentPassword, $passwordFromDB)) {
                $this->newPassword = password_hash($this->password, PASSWORD_DEFAULT);
            } else {
                echo "<span><font color='red'>Invalid current password</font></span><br>";
            }
        }
    }

    public function changeData() {
        $db = new DB();

        if ($this->password) {
            $db->query("UPDATE `users` SET `loggin` = '$this->loggin', `password` = '$this->newPassword', 
                        `name` = '$this->name', `surname` = '$this->surname', `email` = '$this->email' 
                        WHERE `users`.`id` = $this->id");
        } else {
            $db->query("UPDATE `users` SET `loggin` = '$this->loggin', `name` = '$this->name',
                        `surname` = '$this->surname', `email` = '$this->email' 
                        WHERE `users`.`id` = $this->id");
        }

        $db->closeConnect();

        header("Refresh:0");
        //header("Location: .");
    }
    
}

?>