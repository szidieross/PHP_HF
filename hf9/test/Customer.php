<?php

class Customer
{
    private int $id;
    private string $name;
    private string $email;

    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function __toString()
    {
        return "Customer [id=$this->id, name=$this->name, email=$this->email]";
    }
}
?>
