<?php

class Product{
    // Proprieties
    public $id;
    public $name;
    public $image;
    public $price;

    // Construct Method
    function __construct($id, $name, $image, $price){
        $this->id = $id;
        //$this->nome = $nome;
        $this->fixName($name);
        $this->image = $image;
        $this->price = $price;
    }


    // Normal Methods (functions)
    function setPrice($price){
        $this->price = $price;
    }

    function getPrice(){
        echo $this->price;
    }

    function setName($name){
        $this->name = $name;
    }

    function getName(){
        echo $this->name;
    }

    // Function to just fix the name (plus)
    function fixName($name){
        $this->name = trim(str_replace("'","*",$name));
    }
}

?>