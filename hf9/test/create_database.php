<?php

class CreateDatabase
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

    public function create()
    {
        $conn = new mysqli($this->host, $this->username, $this->password);

        if ($conn->connect_error) {
            die("Failed to connect to database: " . $conn->connect_error);
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $this->database";

        if ($conn->query($sql) === false) {
            die("Hiba az adatbázis ($this->database) létrehozásakor: " . $conn->error);
        }

        $conn->select_db($this->database);

        $sql = "CREATE TABLE IF NOT EXISTS customers (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL
        )";

        if ($conn->query($sql) === false) {
            die("Hiba az ügyfelek tábla létrehozásakor: " . $conn->error);
        }

        $sql = "CREATE TABLE IF NOT EXISTS orders (
            id INT PRIMARY KEY AUTO_INCREMENT,
            customer_id INT NOT NULL,
            product_name VARCHAR(255) NOT NULL,
            quantity INT NOT NULL,
            FOREIGN KEY (customer_id) REFERENCES customers(id)
        )";

        if ($conn->query($sql) === false) {
            die("Hiba a rendelések tábla létrehozásakor: " . $conn->error);
        }

        echo "Az adatbázis sikeresen létrehozva!";
        $conn->close();
    }
}

$createDatabase = new CreateDatabase("localhost", "root", "", "webshop");
$createDatabase->create();
?>
