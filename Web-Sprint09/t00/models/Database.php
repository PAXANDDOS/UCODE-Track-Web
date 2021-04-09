<?php

class User extends Model {
    public $id;
    public $username;
    public $password;
    public $name;
    public $email;
    public $role;

    public function __construct() {
        parent::__construct("users");
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
                $this->username = $pdo["username"];
                $this->password = $pdo["password"];
                $this->name = $pdo["name"];
                $this->email = $pdo["email"];
                $this->role = $pdo["role"];
            }
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
                $this->id = null;
                $this->username = null;
                $this->name = null;
                $this->email = null;
                $this->password = null;
                $this->role = null;
            }
        }
    }
    public function save()
    {
        if ($this->connection->getConnectionStatus()) {
            $sql = "INSERT INTO `users` (username, name, email, password) VALUES (:username, :name, :email, :password)";
            $stmt = $this->connection->connection->prepare($sql);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);
            $stmt->execute();
            echo ('<script>alert('.$this->username.'registered successfuly</script>');
        }
    }
}

?>