<?php

error_reporting(E_ERROR | E_PARSE);
class Heroes extends Model {
    public $id;
    public $name;
    public $description;
    public $race;
    public $class_role;

    public function __construct() {
        parent::__construct("heroes");
    }
    public function __destruct() {
        $this->connection = null;
    }

    public function find($id)
    {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT * FROM $this->table WHERE id=$id");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if ($pdo) {
                $this->id = $pdo["id"];
                $this->name = $pdo["name"];
                $this->description = $pdo["description"];
                $this->race = $pdo["race"];
                $this->class_role = $pdo["class_role"]; 
                echo("id: ".$this->id."\n".
                "name: ".$this->name."\n".
                "description: ".$this->description."\n".
                "race: ".$this->race."\n".
                "class_role: ".$this->class_role."\n");
            }
            else echo("Row with id: ".$id." not found\n");
        }
    }
    public function delete()
    {    
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT id FROM " . $this->table . " WHERE id = " . $this->id . ";");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if ($pdo["id"]) {
                $sql = "DELETE FROM $this->table WHERE id=$this->id";
                $stmt = $this->connection->connection->prepare($sql);
                $stmt->execute();
                echo("id: ".$this->id." Deleted\n");
                $this->id = null;
                $this->name = null;
                $this->description = null;
                $this->race = null;
                $this->class_role = null;
            }
            else echo("Nothing Deleted\n");
        }
    }
    public function save()
    {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT id, name FROM " . $this->table . " WHERE id = " . $this->id . ";");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if (!$pdo["name"]) {
                $sql = "INSERT INTO `heroes` (id, name, description, race, class_role) VALUES (:id, :name, :description, :race, :class_role)";
                $stmt = $this->connection->connection->prepare($sql);
                $stmt->bindParam(":id", $this->id);
                $stmt->bindParam(":name", $this->name);
                $stmt->bindParam(":description", $this->description);
                $stmt->bindParam(":race", $this->race);
                $stmt->bindParam(":class_role", $this->class_role);
                $stmt->execute();
                echo($this->name." Added\n");
            }
            else {
                $sql = "UPDATE heroes SET id=:id, name=:name, description=:description, race=:race, class_role=:class_role  WHERE id=:id";
                $stmt = $this->connection->connection->prepare($sql);
                $stmt->bindParam(":id", $this->id);
                $stmt->bindParam(":name", $this->name);
                $stmt->bindParam(":description", $this->description);
                $stmt->bindParam(":race", $this->race);
                $stmt->bindParam(":class_role", $this->class_role);
                $stmt->execute();
                echo($this->name." Updated\n");
            }
        }
    }
}

?>