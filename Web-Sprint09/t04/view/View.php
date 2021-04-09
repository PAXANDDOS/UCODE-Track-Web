<?php

class View {
    public function __construct($url) {
        $this->url = $url;
    }

    public function render()
    {
        $data = file_get_contents($this->url);
        // $data = str_replace("<", "&#60;", $data);
        // $data = str_replace(">", "&#62;", $data);
        // $data = str_replace("<br />", "", $data);
        // $data = nl2br($data);
        echo $data;
    }
}

?>