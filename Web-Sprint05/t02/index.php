<?php 
    function checkDivision($startRange = 1, $endRange = 60) : void {
        for($i = $startRange; $i <= $endRange; $i++) {
            $result = "The number ";
            $checked = false;
            $result .= $i;
            if($i % 2 === 0){
                $result .= ' is divisible by 2';
                $checked = true;
            }
            if($i % 3 === 0){
                if($checked)
                    $result .= ',';
                $result .= ' is divisible by 3';
                $checked = true;
            }
            if($i % 10 === 0){
                if($checked)
                    $result .= ',';
                $result .= ' is divisible by 10';
                $checked = true;
            }
            if(!$checked) {
                $result .= ' -';
            }
            $result .= "\n";
            echo($result);
        }
    }
?>
