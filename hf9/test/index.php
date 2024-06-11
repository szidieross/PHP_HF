<?php

include("create_database");
include("Database.php");
include("Customer.php");
include("Order.php");

$db = new Database("localhost", "root", "", "webshop");
$conn = $db->getConnection();

$customerQuery = $conn->query("SELECT * FROM customers");
$customers = [];

while ($row = $customerQuery->fetch_assoc()) {
    $customer = new Customer($row['id'], $row['name'], $row['email']);
    $customers[] = $customer;
    echo $customer . "<br>";
}

$orderQuery = $conn->query("SELECT * FROM orders");
$orders = [];

while ($row = $orderQuery->fetch_assoc()) {
    $order = new Order($row['id'], $row['customer_id'], $row['product_name'], $row['quantity']);
    $orders[] = $order;
    echo $order . "<br>";
}

$conn->close();
?>