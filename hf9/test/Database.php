<?php

class Database
{
    private string $host;
    private string $username;
    private string $password;
    private string $database;

    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function getConnection()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Failed to connect to database: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>
