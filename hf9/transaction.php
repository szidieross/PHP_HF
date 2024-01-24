<?php

class Transaction
{
    private int $senderId;
    private float $amount;
    private int $receiverId;
    private int $id;
    private DateTime $transactionDate;
    private Database $db;

    public function __construct(int $id, int $senderId, int $receiverId, float $amount, DateTime $transactionDate, Database $db)
    {
        $this->id = $id;
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
        $this->amount = $amount;
        $this->transactionDate = $transactionDate;
        $this->db = $db;

        $conn = $db->getConnection();

        $sql = "INSERT INTO transactions (senderId, receiverId, amount, transaction_date)";
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