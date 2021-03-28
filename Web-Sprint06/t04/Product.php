<?php

class Product {
    public function __construct($name, $kcal_per_portion) {
        $this->name = $name;
        $this->kcal_per_portion = $kcal_per_portion;
    }
    public function getName(){
        return $this->name;
    }
    public function getKcal(){
        return $this->kcal_per_portion;
    }
}

?>