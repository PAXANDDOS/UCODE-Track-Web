<?php 
    function firstUpper($string) : string {
        $result = strval($string);
        if(strcmp($result, "")) {
            $result = ucfirst(strtolower(trim($result)));
        }
        return $result;
    }
?>
