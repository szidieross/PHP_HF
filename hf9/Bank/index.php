<?php

include("database.php");
include("customer.php");
include("transaction.php");

$db1 = new Database("localhost", "root", "", "testingidkwhat");

$db1->connect();


$customer = new Customer(1, "anna", "anna", 100, $db1);
$customer->getByUsername("anna");

$customer = new Customer(2, "sara", "sara", 100, $db1);
$customer->getByUsername("sara");
$customer->getByID(7);

$customer = new Customer(3, "emoke", "emoke", 100, $db1);
$customer->getByUsername("emoke");

echo "<br/>" . $customer->getUsername();

$tr = new Transaction(1, 1, 2, 345, new DateTime(), $db1);
$tr = new Transaction(2, 1, 3, 345, new DateTime(), $db1);

$tr->getByCustomer(1);
$tr->getByCustomer(2);