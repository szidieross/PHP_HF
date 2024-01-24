<?php

include("database.php");
include("customer.php");

$db1=new Database("localhost","root", "", "testingidkwhat");

$db1->connect();

$customer1=new Customer(1,"anna","anna",100,$db1);

$customer1->getByUsername("anna");

$customer1=new Customer(1,"emoke","emoke",100,$db1);

$customer1->getByUsername("emoke");