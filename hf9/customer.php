<?php

class Customer
{
    private string $password;
    private string $balance;
    private int $id;
    private Database $db;
    private string $username;

    public function __construct(int $id, string $username, string $password, float $balance, Database $db)
    {
        if (empty($id) || empty($username) || empty($password) || empty($balance) || empty($db)) {
            die("Az osszes adat megadasa kotelezo");
        }

        $this->id = $id;
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->balance = $balance;
        $this->db = $db;

        $conn = $db->getConnection();

        $sql = "INSERT INTO customers (username, password, balance) VALUES ( ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Hiba costumer hozzaadasanak elokeszitesenel: " . $conn->error);
        }

        $stmt->bind_param("ssd", $username, $password, $balance);

        if (!$stmt->execute()) {
            die("Hiba costumer hozzaadasa soran: " . $stmt->error);
        }

        $stmt->close();
        $conn->close();
    }

    public function verifyPassword(string $password)
    {
        return password_verify($password, $this->password);
    }

    public function updateBalance(float $amount)
    {
        $this->balance = $amount;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getByUsername(string $username)
    {
        $db = $this->db;

        $conn = $db->getConnection();


        $sql = "SELECT id, username, balance from customers WHERE username=?";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Hiba a lekerdezes elokeszitese soran: " . $conn->error);
        }

        $stmt->bind_param("s", $username);

        if (!$stmt->execute()) {
            die("Hiba lekerdezeskor: " . $stmt->error);
        }

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->id = $row["id"];
            $this->username = $row["username"];
            $this->balance = $row["balance"];
        } else {
            echo "Felhasznalonev nem talalhato.";
        }

        $stmt->close();
        $conn->close();
    }

    public function getByID(string $customer_id)
    {

    }

    public function getUsername()
    {
        return $this->username;
    }
}