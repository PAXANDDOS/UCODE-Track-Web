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
            if (!$pdo) {
                echo '<script>
                        alert("No user found in database!");
                        window.location.href = "http://localhost:3000/t01/index.html";
                    </script>';
            }
            else {
                if($pdo['password'] == $this->password) {
                    echo '<script>
                        alert("Login successful!");
                    </script>';
                    echo ('
                    <head>
                    <link rel="stylesheet" href="style.css" type="text/css">
                    </head>
                    <body>
                    <div class="logged">
                    <h1>You are in!</h1>
                    <form action="index.php" method="post">
                        <label>You have logged in as <span>'.$pdo['username'].'</span></label>
                        <label>Your name is <span>'.$pdo['name'].'</span></label>
                        <label>Your email is <span>'.$pdo['email'].'</span></label>
                        <label>Role: <span>'.$pdo['role'].'</span></label>
                        <input type="text" name="logout" value="true" style="display: none">
                        <div class="submit"><input type="submit" value="Log out"></div>
                    </form>
                    </div>
                    </body>');
                }
                else {
                    echo '<script>
                        alert("Incorrect password!");
                        window.location.href = "http://localhost:3000/t01/index.html";
                    </script>';
                }
            }
        }
    }
}

?>