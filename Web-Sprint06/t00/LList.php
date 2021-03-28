<?php
class LList implements IteratorAggregate{
    public function __construct() {
        $this->head = null;
    }

	public function getFirst() {
        return $this->head->data;
    }
    public function getLast() {
        if($this->head) {
            $current = $this->head;
            while($current->next != null) {
                $current = $current->next;
            }
            return $current->data;
        }
    }
    public function add($value) {
        $node = new LLItem($value);
        if($this->head == null)
            $this->head = $node;
        else {
            $temp = $this->head;
            while($temp->next != null) {
                $temp = $temp->next;
            }
            $temp->next = $node; 
        }
    }
    public function addArr($array) {
        for($i = 0; $i < count($array); ++$i) {
            $this->add($array[$i]);
        }
    }
    public function remove($value) {
        $current = $this->head;
        $prev = $this->head;

        while($current->data != $value) {
            if($current->next == null)
                return null;
            else {
                $prev = $current;
                $current = $current->next;
            }
        }
        if($current == $prev)
            $this->head = $current->next;
        $prev->next = $current->next;
    }
    public function removeAll($value) {
        $current = $this->head;

        while($current) {
            if($current->data == $value)
                $this->remove($value);
            $current = $current->next;
        }
    }
    public function contains($value) {
        $current = $this->head;
        while($current) {
            if($current->data == $value)
                return true;
            $current = $current->next;
        }
        return false;
    }
    public function clear() {
        $current = $this->head;
        while($current) {
            $this->remove($current->data);
            $current = $current->next;
        }
    }
    public function count() {
        $current = $this->head;
        $count = 0;
        while($current) {
            $current = $current->next;
            $count++;
        }
        return $count;
    }
    public function toString() {
        $current = $this->head;
        $str = "";

        if($current != null)
            while($current != null) {
                if($current->next == null)
                    $str = $str.$current->data;
                else
                    $str = $str.$current->data.", ";
                $current = $current->next;
            }
        else
            return null;
        return $str;
    }
    public function getIterator() {
        for($current = $this->head; $current != null; $current = $current->next)
            yield $current->data;
    }
}
// Old version (does not work)
// class LList {
//     private $head = null;
//     private $size = 0;
// 	public function getFirst() {
//         return $this->head->data;
//     }
//     public function getLast() {
//         if($this->head == null) 
//             return null; 
//         $node = $this->head;
//         while($node) {
//             if(!$node->next)
//                 return node;
//             $node = $node->next;
//         }
//     }
//     public function add($value)
//     {
//         $node = new LLItem($value);
//         $current = null;
//         if($this->head == null)
//             $this->head = $node;
//         else {
//             $current = $this->head;
//             while($current->next)
//                 $current = $current->next;
//             $current->next = $node; 
//         }
//         $this->size++;
//     }
//     public function addArr($array)
//     {
//         $i = 0;
//         while($array[$i] <= 7){
//             $this->add($array[$i]);
//             $i++;
//         }
//     }
//     public function remove($value)
//     {
//         $current = $this->head;
//         $prev = null;
//         while($current != null) {
//             if($current->data === $value) {
//                 if($prev == null)
//                     $this->head = $current->next;
//                 else
//                     $prev->next = $current->next;
//                 return $this;
//             }
//             $prev = $current;
//             $current = $current->next;
//         }
//     }
//     public function removeAll($value)
//     {
//         $current = $this->head;
//         $prev = null;
//         while($current != null) {
//             if($current->data === $value) {
//                 if($prev == null)
//                     $this->head = $current->next;
//                 else 
//                     $prev->next = $current->next;
//                 $this->size--;
//             }
//             $prev = $current;
//             $current = $current->next;
//         }
//     }
//     public function contains($value)
//     {
//         $current = $this->head;
//         while($current != null) {
//             if($current->data === $value)
//                 return true;
//             $current = $current->next;
//        }
//        return false;
//     }
//     public function clear()
//     {
//         $current = $this->head;
//         while($current != null) {
//             if($current->data) {
//                 $this->head = $current->next;
//                 $this->size--;
//             }
//             $current = $current->next;
//         }
//     }
//     public function count()
//     {
//         return $this->size;
//     }
//     public function toString()
//     {
//         $current;
//         $str = "";
//         if ($this->head != null) {
//             $current = $this->head;
//             while($current) {
//                 $str = $str.$current->data;
//                 if ($current->next)
//                     $str = $str.", ";
//                 $current = $current->next;
//             }
//         }
//         return $str;
//     }
//     public function getIterator()
//     {
//         for($current = $this->head; $current != null; $current = $current->next) {
//             yield $current->data;
//         }
//     }
// }

?>