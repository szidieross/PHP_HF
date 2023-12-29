<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

//ToDo
echo "<pre>";

$uni = new University();
$student1 = new Student("Annabeth", "01");
$student2 = new Student("Percy", "02");
echo ($student1->getStudentNumber());
echo ($student1->getName());
echo "<br/>";

$subject1=new Subject("1","Maths");
echo($subject1->getCode());
echo($subject1->getName());
$subject1->setStudent($student1);
$subject1->setStudent($student2);
echo "<br/>";
var_dump($subject1->getStudents());



$uni->addSubject("1", "Math");
$uni->addStudentOnSubject("1", $student1);
$uni->print();
echo "<br/>hi im percy jackson";

echo "</pre>";
