<?php

namespace classes;

use classes\DB;

require_once "Db.php";

class GetUserData {

    private $arr = array();
    private $toDelete = array();

    public function getUserData($id) {
        $db = new DB();
        
        $userData = $db->query("SELECT * FROM `users` WHERE `id` = $id");

        return $userData[0];
    }
    
    private function getAllUserData() {
        $db = new DB();

        return $db->query("SELECT * FROM `users`");
    }

    public function showAllUsers() {
        $userData = $this->getAllUserData();

        echo "<table style='max-width:90%; min-width:60%' align='center'>"; 
        echo "<td><b>LOGGIN</b></td><td><b>NAME</b></td><td><b>SURNAME</b></td><td><b>EMAIL</b></td><td>Select User</td>"; 
        for ($i = 0; $i < count($userData); $i++) {
            echo "<tr>"; 
            echo "<td>".$userData[$i]["loggin"]."</td><td>".$userData[$i]["name"]."</td><td>".$userData[$i]["surname"]."</td><td>".$userData[$i]["email"]."</td>
                        <td style='width:85px' ><input type='checkbox' id=".$userData[$i]['id']." name='delete[]' value=".$userData[$i]['id']."><br></td>"; 
            echo "</tr>"; 
        } 
		echo "</table>"; 
    }

    public function deleteUsers($arr = array()) {
        if ($arr) {
            $this->arr = $arr;
            $db = new DB();

            for ($i = 0; $i < count($this->arr); $i++) {
                $this->toDelete[] = $this->arr[$i];
            }

            $db->execute("DELETE FROM `users` WHERE `id` IN (".implode($this->toDelete, ', ').")");

            $db->closeConnect();

            header("Refresh:0");
            //header("Location: .");
        }
    }

    public function deleteOnlyOneUser($id) {
        $db = new DB();

        $db->execute("DELETE FROM `users` WHERE `id` = $id");

        $db->closeConnect();

        header('Location: ../user/logOut.php');
    }

}

?>