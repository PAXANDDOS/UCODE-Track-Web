<?php
class NotePad
{
    public function __construct($notes) {
        $this->notes = $notes;
    }
    public function __toString() {
        $str = '<ul>';
        if ($this->notes)
            foreach ($this->notes as $note) {
                $str .= '<li><a href="?note_content='. 
                $note->getName().'">'. 
                $note->getDate().' > '. 
                $note->getName().'</a> <a href="?delete_note='.$note->getName().'">DELETE</a></li>';
            }
        $str .= '</ul>';
        return $str;
    }
    public function __serialize(): array {
        $serializeArr = [];
        foreach ($this->notes as $note)
            array_push($serializeArr, serialize($note));
        return $serializeArr;
    }
    public function __unserialize(array $data): void {
        $this->notes = [];
        if ($data)
            foreach ($data as $note)
                array_push($this->notes, unserialize($note));
    }
    public function getNoteWithName($name) {
        foreach ($this->notes as $note) {
            if ($name == $note->getName()) {
                return $note;
            }
        }
        return null;
    }
}
?>