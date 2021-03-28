<?php

class Ingestion extends Product {
    public function __construct($meal_type, $id) {
        $this->meal_type = $meal_type;
        $this->id = $id;
        $this->day_of_diet;
        $this->products;
    }

    public function get_from_fridge($product): void {
        if(($this->products[$product]->kcal_per_portion) > 200)
            throw new EatException("Too many calories in $product for $this->meal_type");
    }

    public function setProduct($obj) {
        $this->products[$obj->getName()] = $obj;
    }

    public function getProducts() {
        return $this->products;
    }
}

?>