<?php

namespace classes;

use classes\DB;

require_once "Db.php";

class CheckUser {

    protected $loggin;
    protected $password;

    public function __construct($array = array()) {
        $this->loggin = $array["loggin"];
        $this->password = $array["password"];
    }

    public function checkUserData() {
        $db = new DB();

        $checkQuery = $db->query("SELECT `id`, `password`, `name` FROM `users` WHERE `loggin` = '$this->loggin'");
        
        if($checkQuery && password_verify($this->password, $checkQuery[0]['password'])) {
            session_start();

            $_SESSION['data'][] = $checkQuery[0]['id'];
            $_SESSION['data'][] = $checkQuery[0]['name'];

            header('Location: productList.php');
        } else {
            echo "<span><font color='red'>Wrong data</font></span><br>";
        }
    }

}

?>