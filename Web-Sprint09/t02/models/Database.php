<?php

class User extends Model {
    public $id;
    public $username;
    public $password;
    public $name;
    public $email;

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
                $this->password = null;
                $this->name = null;
                $this->email = null;
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
        }
    }
    public function check()
    {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT * FROM $this->table WHERE username='$this->username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if (!$pdo)
                echo '<script>alert("No user found in database!");</script>';
            else {
                if($pdo['password'] == $this->password)
                    echo '<script>alert("Login successful!");</script>';
                else
                    echo '<script>alert("Incorrect password!");</script>';
            }
        }
    }
    public function renew()
    {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT * FROM $this->table WHERE username='$this->username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if (!$pdo)
                echo '<script>alert("No user found in database!");</script>';
            else {
                $email = $pdo['email'];
                $pass = substr($pdo['password'], 0, 9);
                $passHash = md5($pass);
                $text = "\nYou have requested a renewal of your password.\nDo not give your password to anyone!\n\nYour new password is $pass\n\nDon't lose it anymore;)\n";
                mail($email, "Password reminder.", $text);
                echo ("<script>alert(\"Your new password was sent to $email\");</script>");
                $this->update($pdo['username'], $pdo['name'], $pdo['email'], $passHash);
            }
        }
    }
    public function update($username, $name, $email, $password)
    {
        if ($this->connection->getConnectionStatus()) {
            $sql = "UPDATE users SET name=:name, email=:email, password=:password WHERE username=:username";
            $stmt = $this->connection->connection->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
        }
    }
}

?>