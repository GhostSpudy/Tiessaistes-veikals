<?php

namespace classes;

class Product {

    protected $imageTmpName;
    protected $imageName;
    protected $name;
    protected $price;
    protected $description;

    public function __construct($array = array(), $image = array()) {
        $this->imageTmpName = $image['image']['tmp_name'];
        $this->imageName = $image['image']['name'];
        $this->name = $array["name"];
        $this->price = $array["price"];
        $this->description = $array["description"];
    }

}

?>