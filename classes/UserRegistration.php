<?php

namespace classes;

use classes\User;
use classes\DB;

require_once "User.php";
require_once "Db.php";

class UserRegistration extends User {

    public function addUserToDb() {
        $db = new DB();

        $db->execute("INSERT INTO `users` (`loggin`, `password`, `name`, `surname`, `email`) 
                    VALUES ('$this->loggin', '$this->password', '$this->name', '$this->surname', '$this->email')");

        $db->closeConnect();
    }
    
}

?>