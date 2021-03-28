<?php

class Team {
    public function __construct($id, $arr) {
        $this->id = $id;
        $this->avengers = $arr;
    }

    public function battle($damage): void {
        for($i = 0; $i < count($this->avengers); $i++)
            $this->avengers[$i]->hp -= $damage;
    }
    public function calculate_losses($cloned_team): void {
        $count = 0;
        for($i = 0; $i < count($this->avengers); $i++)
            if($this->avengers[$i]->hp <= 0)
                $count++;

        if($count == 0)
            echo "We haven't lost anyone in this battle!\n";
        else
            echo "In this battle we lost $count Avenger(s).\n";
    }
}    

?>