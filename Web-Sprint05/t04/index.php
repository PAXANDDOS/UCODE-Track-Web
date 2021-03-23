<?php 
    function total($addCount, $addPrice, $currentTotal = 0) : float {
        $result = $addCount * $addPrice + $currentTotal;
        return $result;
    }
?>
