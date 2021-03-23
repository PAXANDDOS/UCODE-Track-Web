<?php 
    class StrFrequency {
        public function __construct($string) {
            $this->string = $string;
        }
        public function letterFrequencies()
        {
            $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $arr = array();
            for($i = 0; $i < strlen($alphabet); $i++) {
                $counter = 0;
                for($j = 0; $j < strlen($this->string); $j++)
                    if(strtoupper($this->string[$j]) === $alphabet[$i])
                        $counter++;
                if($counter > 0)
                    $arr[$alphabet[$i]] = $counter;
            }
            return $arr;
        }
        public function wordFrequencies()
        {
            $str = strtoupper($this->string); 
            $words = str_word_count($str, 1);
            $arr = array();
            foreach($words as $word1) {
                $counter = 0;
                foreach ($words as $word2) {
                    if ($word1 === $word2)
                        $counter++;
                }
                $word1 = preg_replace('/[\W]/', '', $word1);
                $arr[$word1] = $counter;
            }
            return $arr;
        }
        public function reverseString()
        {
            $result = preg_replace('/[\W\d]/', ' ', strrev($this->string));
            return $result;
        }
    }
?>
