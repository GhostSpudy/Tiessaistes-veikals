<?php

namespace classes;

use classes\DB;

require_once "Db.php";

class ProductManagement extends DB {

    private $id;
    private $arr = array();
    private $toDelete = array();
    private $toBasket = array();
    private $selectAll = array();
    private $productArray = array();

    public function deleteProducts($arr = array()) {
        if ($arr) {
            $this->arr = $arr;

            for ($i = 0; $i < count($this->arr); $i++) {
                $this->toDelete[] = $this->arr[$i];
            }

            parent::execute("DELETE FROM `products` WHERE `id` IN (".implode($this->toDelete, ', ').")");

            parent::closeConnect();

            header("Refresh:0");
            //header("Location: .");
        }
    }

    public function showAllProduct() {
        $this->selectAll = parent::query("SELECT * FROM `products`");

        for ($i = 0; $i < count($this->selectAll); $i++) {
            $id = $this->selectAll[$i]["id"];
            $imageName = $this->selectAll[$i]["imageName"];
            $name = $this->selectAll[$i]["name"];
            $price = $this->selectAll[$i]["price"];
            $description = $this->selectAll[$i]["description"];

            echo '<div>';
            echo '<input type="checkbox" id="'.$id.'" name="selectedProduct[]" value="'.$id.'"><br>';
            echo '<div>';
            echo '<label for="'.$id.'">'
                    .'<img src="../images/'.$imageName.'" alt="'.$name.'" width="230" height="210">'.'<br>'
                    .$name.'<br>'
                    .$price. " $" .'<br>'
                    .$description.'
                </label><br>';
            echo '</div>';
            echo '</div>';
        }
    }

    public function showAllProductsToUnregisteredUsers() {
        $this->selectAll = parent::query("SELECT * FROM `products`");

        for ($i = 0; $i < count($this->selectAll); $i++) {
            $id = $this->selectAll[$i]["id"];
            $imageName = $this->selectAll[$i]["imageName"];
            $name = $this->selectAll[$i]["name"];
            $price = $this->selectAll[$i]["price"];
            $description = $this->selectAll[$i]["description"];

            echo '<div style="padding-bottom: 5px" >';
            echo '<div>';
            echo '<label for="'.$id.'">'
                    .'<img src="images/'.$imageName.'" alt="'.$name.'" width="230" height="210">'.'<br>'
                    .$name.'<br>'
                    .$price. " $" .'<br>'
                    .$description.'
                </label><br>';
            echo '</div>';
            echo '</div>';
        }
    }

    public function showAllProductsInBasket($id) {
        $this->id = $id;
        $this->selectAll = parent::query("SELECT * FROM `basket` WHERE `id_basket` = $this->id");

        for ($i = 0; $i < count($this->selectAll); $i++) {
            $id = $this->selectAll[$i]["product_id"];
            $imageName = $this->selectAll[$i]["imageName"];
            $name = $this->selectAll[$i]["name"];
            $price = $this->selectAll[$i]["price"];
            $description = $this->selectAll[$i]["description"];

            echo '<div>';
            echo '<input type="checkbox" id="'.$id.'" name="selectedProduct[]" value="'.$id.'"><br>';
            echo '<div>';
            echo '<label for="'.$id.'">'
                    .'<img src="../images/'.$imageName.'" alt="'.$name.'" width="230" height="210">'.'<br>'
                    .$name.'<br>'
                    .$price. " $" .'<br>'
                    .$description.'
                </label><br>';
            echo '</div>';
            echo '</div>';
        }
    }

    public function deleteProductsFromBasket($arr = array(), $id) {
        if ($arr) {
            $this->id = $id;
            $this->arr = $arr;

            for ($i = 0; $i < count($this->arr); $i++) {
                $this->toDelete[] = $this->arr[$i];
            }

            parent::execute("DELETE FROM `basket` WHERE `id_basket` = $this->id AND `product_id` IN (".implode($this->toDelete, ', ').")");
            
            parent::closeConnect();
    
            header("Refresh:0");
            //header("Location: .");
        }
    }


    public function addProductToBasket($arr = array(), $id) {
        if ($arr) {
            $this->id = $id;
            $this->arr = $arr;

            for ($i = 0; $i < count($this->arr); $i++) {
                $this->toBasket[] = $this->arr[$i];
            }

            $this->getSelectedProduct($this->toBasket);

            for ($i = 0; $i < count($this->toBasket); $i++) {
                $productId = $this->productArray[$i][0]['id'];
                $imageName = $this->productArray[$i][0]['imageName'];
                $name = $this->productArray[$i][0]['name'];
                $price = $this->productArray[$i][0]['price'];
                $description = $this->productArray[$i][0]['description'];

                parent::execute("INSERT INTO `basket` (`id_basket`, `product_id`, `imageName`, `name`, `price`, `description`) 
                                VALUES ('$this->id', '$productId', '$imageName', '$name', '$price', '$description')");
            }
        }
    }

    private function getSelectedProduct($idArray = array()) {
        for ($i = 0; $i < count($idArray); $i++) {
            $this->productArray[] = parent::query("SELECT * FROM `products` WHERE `id` = $idArray[$i]");
        }
    }
}

?>