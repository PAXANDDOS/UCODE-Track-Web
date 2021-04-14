<?php

require_once 'application/models/Model_database.php';
class User extends Model_database {
    public $id;
    public $username;
    public $password;
    public $name;
    public $email;
    public $avatar_name;

    public function __construct() {
        parent::__construct("users");
    }
    public function __destruct() {
        $this->connection = null;
    }

    public function findUsername($username)
    {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT * FROM $this->table WHERE username='$username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if ($pdo) {
                if($username == $pdo["username"])
                    return true;
                else return false;
            }
        }
    }
    public function findEmail($email)
    {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT * FROM $this->table WHERE email='$email'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if ($pdo) {
                if($email == $pdo["email"])
                    return true;
                else return false;
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
                $this->avatar_name = null;
            }
        }
    }
    public function save()
    {
        if ($this->connection->getConnectionStatus()) {
            $sql = "INSERT INTO `users` (username, name, email, password, avatar_name) VALUES (:username, :name, :email, :password, :avatar_name)";
            $stmt = $this->connection->connection->prepare($sql);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":avatar_name", $this->avatar_name);
            $stmt->execute();
        }
    }
    public function renew()
    {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT * FROM $this->table WHERE username='$this->username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            $email = $pdo['email'];
            $pass = substr($pdo['password'], 0, 9);
            $passHash = md5($pass);
            $text = "\nYou have requested a renewal of your password.\nDo not give your password to anyone!\n\nYour new password is $pass\n\nDon't lose it anymore;)\n";
            mail($email, "Password reminder.", $text);
            $this->update($pdo['username'], $pdo['name'], $pdo['email'], $passHash);
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
    public function checkPass($username, $password)
    {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT * FROM $this->table WHERE username='$username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if($pdo['password'] == $password)
                return true;
            else
                return false;
        }
    }
    public function getAvatar($username) {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT avatar_name FROM $this->table WHERE username='$username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            return $pdo['avatar_name'];
        }
    }
    public function getTotalGames($username) {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT total_games FROM $this->table WHERE username='$username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if(isset($pdo['total_games']))
                return $pdo['total_games'];
        }
    }
    public function getTotalWins($username) {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT total_wins FROM $this->table WHERE username='$username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if(isset($pdo['total_wins']))
                return $pdo['total_wins'];
        }
    }
    public function getTotalLoses($username) {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT total_loses FROM $this->table WHERE username='$username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            if(isset($pdo['total_loses']))
                return $pdo['total_loses'];
        }
    }
    public function incrementTotalGames($username) {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT total_games FROM $this->table WHERE username='$username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            $totalGames = $pdo['total_games'];
            $totalGames += 1;

            $sql = "UPDATE $this->table SET total_games=:total_games WHERE username=:username";
            $stmt = $this->connection->connection->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":total_games", $totalGames);
            $stmt->execute();
        }
    }
    public function incrementTotalWins($username) {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT total_wins FROM $this->table WHERE username='$username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            $totalWins = $pdo['total_wins'];
            $totalWins += 1;

            $sql = "UPDATE $this->table SET total_wins=:total_wins WHERE username=:username";
            $stmt = $this->connection->connection->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":total_wins", $totalWins);
            $stmt->execute();
        }
    }
    public function incrementTotalLoses($username) {
        if ($this->connection->getConnectionStatus()) {
            $result = $this->connection->connection->query("SELECT total_loses FROM $this->table WHERE username='$username'");
            $pdo = $result->fetch(PDO::FETCH_ASSOC);
            $totalLoses = $pdo['total_loses'];
            $totalLoses += 1;

            $sql = "UPDATE $this->table SET total_loses=:total_loses WHERE username=:username";
            $stmt = $this->connection->connection->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":total_loses", $totalLoses);
            $stmt->execute();
        }
    }
    public function updateAvatar($username, $avatar_name) {
        if ($this->connection->getConnectionStatus()) {
            $sql = "UPDATE $this->table SET avatar_name=:avatar_name WHERE username=:username";
            $stmt = $this->connection->connection->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":avatar_name", $avatar_name);
            $stmt->execute();
        }
    }
}

?>