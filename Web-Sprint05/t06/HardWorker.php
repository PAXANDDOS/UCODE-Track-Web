<?php 
    class HardWorker 
    {
        protected $name;
        protected $age;
        protected $salary;

        public function __construct() {
            $this->name;
            $this->age;
            $this->salary;
        }

        public function setName($name)
        {
            $this->name = $name;
        }
        public function getName()
        {
            return $this->name;
        }

        public function setAge($age)
        {
            if ($age >= 1 && $age <= 100) {
                $this->age = $age;
                return true;
            }
            else {
                return false;
            }
        }
        public function getAge()
        {
            return $this->age;
        }

        public function setSalary($salary)
        {
            if ($salary >= 100 && $salary <= 10000) {
                $this->salary = $salary;
                return true;
            }
            else {
                return false;
            }
        }
        public function getSalary()
        {
            return $this->salary;
        }

        public function toArray() {
            return array('name' => $this->name, 'age' => $this->age, 'salary' => $this->salary,);
        }
    }
?>