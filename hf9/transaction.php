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
        $db = $this->db;
        $conn = $db->getConnection();
        $sql = "SELECT id, senderId, receiverId, amount, transaction_date FROM transactions WHERE senderId=? OR receiverId=?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Hiba lekerdezes elokeszitesekor: " . $conn->error);
        }
        $stmt->bind_param("ii", $this->senderId, $this->receiverId);
        if (!$stmt->execute()) {
            die("Hiba lekerdezeskor: " . $stmt->error);
        }
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            echo "<h3>Transactions:</h3>";
            foreach ($rows as $row) {
                echo "Transaction: id={$row['id']}, senderId={$row['senderId']}, receiverId={$row['receiverId']}, amount={$row['amount']}, transaction date={$row['transaction_date']}<br/>";
            }
        } else {
            echo "No transactions for this customer";
        }

        $stmt->close();
        $conn->close();
    }
    public function updatebalance(int $customer_id, float $amount)
    {
    }
    public function create(int $senderId, int $receiverId, float $amount)
    {
    }

    public function __toString()
    {
        return "Transaction: id=$this->id, senderId=$this->senderId, receiverId=$this->receiverId, amount=$this->amount, transaction date=$this->transactionDate";
    }
}