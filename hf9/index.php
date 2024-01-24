<?php

include("database.php");
include("customer.php");
include("transaction.php");

$db1 = new Database("localhost", "root", "", "testingidkwhat");

$db1->connect();

$customer1 = new Customer(1, "anna", "anna", 100, $db1);
$customer1->getByUsername("anna");

$customer2 = new Customer(2, "sara", "sara", 100, $db1);
$customer2->getByUsername("sara");

$customer3 = new Customer(3, "emoke", "emoke", 100, $db1);
$customer3->getByUsername("emoke");

$tr1 = new Transaction(1, 1, 3, 345, new DateTime(), $db1);