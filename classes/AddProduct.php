<?php

namespace classes;

use classes\Product;
use classes\DB;

require_once "Product.php";
require_once "Db.php";

class AddProduct extends Product {

    public function addProductToDb() {
        $db = new DB();

        $db->execute("INSERT INTO `products` (`imageName`, `name`, `price`, `description`) 
                    VALUES ('$this->imageName', '$this->name', '$this->price', '$this->description')");

        $db->closeConnect();

        move_uploaded_file($this->imageTmpName, '../images/' . $this->imageName);

        header('Location: productList.php');
    }

}

?>