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

    public function connect()
    {
        $conn = new mysqli($this->host, $this->username, $this->password);

        $sql = "CREATE DATABASE IF NOT EXISTS $this->database";

        if ($conn->query($sql) === false) {
            die("Hiba az atadbasis ($this->database) letrehozasaban");

        }

        $conn->select_db($this->database);

        echo "Adatbazis ($this->database) sikeresen letrehozva";
    }
}