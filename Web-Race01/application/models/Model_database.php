<?php

class DatabaseConnection {
    public $connection;
    public function __construct($host, $port, $username, $password, $database) {
        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "::Connection failed: ".$e->getMessage().'\n';
        }
    }
    public function __destruct() {
        $this->connection = null;
    }
    public function getConnectionStatus()
    {
        if(isset($this->connection))
            return true;
        return false;
    }
}

abstract class Model_database
{
    public $connection;
    public $table;

    abstract public function findUsername($username);
    abstract public function findEmail($email);
    abstract public function save();
    abstract public function delete();
    abstract public function checkPass($username, $password);
    abstract public function renew();
    abstract public function update($username, $name, $email, $password);
    abstract public function getAvatar($username);
    abstract public function getTotalGames($username);
    abstract public function getTotalWins($username);
    abstract public function getTotalLoses($username);
    abstract public function incrementTotalGames($username);
    abstract public function incrementTotalWins($username);
    abstract public function incrementTotalLoses($username);
    abstract public function updateAvatar($username, $avatar_name);

    public function __construct($table) {
        $this->setConnection();
        $this->setTable($table);
    }

    protected function setTable($table) {
        $this->table = $table;
    }
    protected function setConnection() {
        $this->connection = new DatabaseConnection('localhost', null, 'marvel', 'securepass', 'marvel_heroes');
    }
}

?>