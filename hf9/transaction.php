<?php

class Transaction
{
    private int $senderId;
    private float $amount;
    private int $receiverId;
    private int $id;
    private string $transactionDate;
    private Database $db;

    public function __construct(int $id, int $senderId, int $receiverId, float $amount, DateTime $transactionDate, Database $db)
    {
        $this->id = $id;
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
        $this->amount = $amount;
        $this->transactionDate = $transactionDate->format('Y-m-d H:i:s');
        $this->db = $db;

        $conn = $db->getConnection();

        $sql = "INSERT INTO transactions (id, senderId, receiverId, amount, transaction_date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Hiba lekerdezes elokeszitesekor: " . $conn->error);
        }

        $stmt->bind_param("iiids", $id, $senderId, $receiverId, $amount, $this->transactionDate);

        if (!$stmt->execute()) {
            die("Hiba lekerdezeskor: " . $stmt->error);
        }

    }

    public function getByCustomer(int $customer_id)
    {
    }
    public function updatebalance(int $customer_id, float $amount)
    {
    }
    public function create(int $senderId, int $receiverId, float $amount)
    {
    }
}