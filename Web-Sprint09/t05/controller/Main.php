<?php

require_once(__DIR__ . "/../view/View.php");

interface ControllerInterface {
    public function __construct();
    public function execute();
}

class Main implements ControllerInterface {
    public function __construct() {
        $this->view = new View(__DIR__ . '/../view/templates/main.html');
    }
    public function execute(Type $var = null)
    {
        $this->view->render();
    }
}

?>