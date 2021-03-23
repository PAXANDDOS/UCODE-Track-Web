<?php 
    class Tower extends Building
    {
        protected $elevator;
        protected $arcCapacity;
        protected $height;

        public function hasElevator() {
            return $this->elevator;
        }
        public function setElevator($elevator) {
            $this->elevator = $elevator;
        }

        public function getArcCapacity() {
            return $this->arcCapacity;
        }
        public function setArcCapacity($arcCapacity) {
            $this->arcCapacity = $arcCapacity;
        }

        public function getHeight() {
            return $this->height;
        }
        public function setHeight($height) {
            $this->height = $height;
        }

        public function getFloorHeight(): float {
            return $this->height / $this->floors;
        }

        public function toString() : string {
            $props = ["Elevator : " . ($this->elevator ? '+':'-'),
                "Arc reactor capacity : " . $this->arcCapacity,
                "Height : " . $this->height,
                "Floor height : " . $this->getFloorHeight(),
            ];

            $str = "";
            foreach ($props as $p)
                $str = $str . $p . "\n";
            return parent::toString() . $str;
        }
    }
?>