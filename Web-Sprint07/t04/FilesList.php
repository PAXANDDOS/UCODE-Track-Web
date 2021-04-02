<?php

class FilesList {
    public function __construct($path) {
        $this->path = $path;
    }

    public function toList()
    {
        if(file_exists($this->path)) {
            echo("<h1>List of files</h1><ul>");
            foreach (scandir($this->path) as $file) {
                if($file == "." || $file == "..")
                    continue;
                echo("<li><a href=\"?file=$file\"> $file </a></li>");
            }
            echo("</ul>");
        }
    }
}

?>