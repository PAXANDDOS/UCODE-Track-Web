<?php
    class Overload {
        private $data = array();

        public function __get($name) 
        {
            if (array_key_exists($name, $this->data))
                return $this->data[$name];
            return "NO DATA";
        }
        public function __set($name, $value) 
        {
            $this->data[$name] = $value;
        }
        
        public function __unset($name) 
        {
            if (array_key_exists($name, $this->data))
                unset($this->data[$name]);
            $this->data[$name] = NULL;
        }
        public function __isset($name) 
        {
            if (array_key_exists($name, $this->data))
                return isset($this->data[$name]);
            return $this->data[$name] = "NOT SET";
        }
    }
?>
