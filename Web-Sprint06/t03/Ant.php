<?php

class Ant {
    public function __construct($name, $role, $date, $fights, $legs) {
        error_reporting(0);
        $this->name = $name;
        $this->role = $role;
        $this->date = $date;
        $this->fights = $fights;
        $this->legs = $legs;
    }

    public function __wakeup() : void {
        echo "name: $this->name\nrole_in_army: $this->role\ndate_of_entry: $this->date\nnumber_of_fights: $this->fights\nnumber_of_legs: $this->legs\n";
    }
}

?>