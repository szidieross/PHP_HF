<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

echo "hi im percy jackson<br/>";

$uni=new University();
$uni->addSubject("1","Math");
$uni->print();
echo "<br/>hi im percy jackson";

//ToDo
