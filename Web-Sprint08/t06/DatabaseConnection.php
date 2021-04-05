<?php

class DatabaseConnection {
    public $connection;
    public function __construct($host, $port, $username, $password, $database) {
        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "::Connected successfully\n";
        } catch(PDOException $e) {
            echo "::Connection failed: ".$e->getMessage().'\n';
        }
    }
    public function __destruct() {
        $this->connection = null;
        echo "::Connection closed\n";
    }
    public function getConnectionStatus()
    {
        if(isset($this->connection))
            return true;
        return false;
    }
}

?>