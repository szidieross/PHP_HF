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

    public function connect()
    {
        $conn = new mysqli($this->host, $this->username, $this->password);

        // $sql = "DROP DATABASE IF EXISTS $this->database";
        // if ($conn->query($sql) === false) {
        //     throw new Exception("Error dropping the database $this->database: " . $conn->error);
        // }

        $sql = "CREATE DATABASE IF NOT EXISTS $this->database";

        if ($conn->query($sql) === false) {
            die("Hiba az atadbasis ($this->database) letrehozasaban");
        }

        $conn->select_db($this->database);

        echo "Adatbazis ($this->database) sikeresen letrehozva";

        // customer tabla hozzaadasa

        $sql = "CREATE TABLE IF NOT EXISTS customers(
            id INT PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            balance INT
        )";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Hiba customers tabla letrehozasanak elokeszitesenel: " . $conn->error);
        }

        if (!$stmt->execute()) {
            die("Hiba customers tabla letrehozasanal: " . $stmt->error);
        }

        // transactions tabla letrehozasa

        $sql = "CREATE TABLE IF NOT EXISTS transactions(
            id INT PRIMARY KEY AUTO_INCREMENT,
            senderId INT NOT NULL,
            receiverId INT NOT NULL,
            amount FLOAT NOT NULL,
            transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (senderId) REFERENCES customers(id),
            FOREIGN KEY (receiverId) REFERENCES customers(id)
        )";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Hiba transactions table letrehozasanak elokeszitesenel: " . $conn->error);
        }

        if (!$stmt->execute()) {
            die("Hiba transactions table letrehozasanal: " . $stmt->error);
        }
    }
}