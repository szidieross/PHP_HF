<?php

include("database.php");
include("customer.php");
include("transaction.php");

$db1 = new Database("localhost", "root", "", "testingidkwhat");

$db1->connect();

$customer1 = new Customer(1, "anna", "anna", 100, $db1);

$customer1->getByUsername("anna");

$customer1 = new Customer(3, "emoke", "emoke", 100, $db1);

$customer1->getByUsername("emoke");

$tr1 = new Transaction(1, 1, 3, 345, new DateTime(), $db1);