<?php
    class Note {
        public function __construct($name, $importance, $content) {
            $this->date = date('Y-m-d h:i:s');
            $this->name = $name;
            $this->importance = $importance;
            $this->content = $content;
        }

        public function getDate() { return $this->date; }
        public function getName() { return $this->name; }
        public function getImportance() { return $this->importance; }
        public function getContent() { return $this->content; }
        public function setContent($content) { $this->content = $content; }

        public function __serialize(): array {
            return [
                "date" => $this->date,
                "name" => $this->name,
                "importance" => $this->importance,
                "content" => $this->content,
            ];
        }
        public function __unserialize(array $data): void  {
            $this->date = $data["date"];
            $this->name = $data["name"];
            $this->importance = $data["importance"];
            $this->content = $data["content"];
        }
        public function __toString() {
            $str = '<ul>';
            $str .= '<li>date: <b>'.$this->date.'</b></li>';
            $str .= '<li>name: <b>'.$this->name.'</b></li>';
            $str .= '<li>importance: <b>'.$this->importance.'</b></li>';
            $str .= '<li>content: <b>'.$this->content.'</b></li><br>';
            $str .= '</ul>';
            return $str;
        }
    }
?>