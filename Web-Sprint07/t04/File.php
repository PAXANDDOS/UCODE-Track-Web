<?php

    class File {
        public function __construct($path) {
            $this->path = $path;
            if(!file_exists('tmp'))
                mkdir('tmp', 0777);
            $this->file = fopen($path, 'a+');
        }
        public function __destruct() {
            fclose($this->file);
        }
        public function write($data) {
            fwrite($this->file, $data);
        }
    }

?>