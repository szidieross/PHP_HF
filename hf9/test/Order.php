<?php

class Order
{
    private int $id;
    private int $customerId;
    private string $productName;
    private int $quantity;

    public function __construct(int $id, int $customerId, string $productName, int $quantity)
    {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->productName = $productName;
        $this->quantity = $quantity;
    }

    public function __toString()
    {
        return "Order [id=$this->id, customerId=$this->customerId, productName=$this->productName, quantity=$this->quantity]";
    }
}
?>
