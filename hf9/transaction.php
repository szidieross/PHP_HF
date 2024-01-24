<?php

class Transaction
{
    private int $senderId;
    private float $amount;
    private int $receiverId;
    private int $id;
    private DateTime $transactionDate;
    private string $db;

    public function __construct($id, $senderId, $receiverId, $amount, $transactionDate, $db)
    {
        $this->id = $id;
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
        $this->amount = $amount;
        $this->transactionDate = $transactionDate;
        $this->db = $db;
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