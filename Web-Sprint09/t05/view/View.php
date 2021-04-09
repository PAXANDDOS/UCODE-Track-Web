<?php

class View {
    public function __construct($url) {
        $this->url = $url;
    }

    public function render()
    {
        $data = file_get_contents($this->url);
        echo $data;
    }
}

?>