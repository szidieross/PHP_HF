<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

//ToDo
echo "<pre>";

echo "<h1>Note to self: add exceptions</h1>";

$uni = new University();

$student1 = new Student("Annabeth", "001");
$student2 = new Student("Percy", "002");
$student3 = new Student('Charlie', '003');
$student4 = new Student('Clarisse', '004');

$subj1 = $uni->addSubject("1", "Math");
$subj2 = $uni->addSubject("2", "Physics");
$subj3 = $uni->addSubject("3", "Gym");
$uni->addStudentOnSubject("1", $student1);
$uni->addStudentOnSubject("1", $student2);
$uni->addStudentOnSubject("2", $student1);
$uni->addStudentOnSubject("3", $student2);
$uni->addStudentOnSubject("3", $student3);
$uni->addStudentOnSubject("3", $student4);
echo ($uni->print());

echo "<h4>Number of Students: " . $uni->getNumberOfStudents() . "</h4>";

var_dump($uni->getStudentsForSubject("3"));

// echo "<h2>deleting student " . $student1->getName() . " from " . $subj2->getName() . ".>/h2>";
$subj2->deleteStudent($student1);

// echo "<h2>deleting student " . $student4->getName() . " from " . $subj3->getName() . ".>/h2>";
$uni->deleteStudentOnSubject("3", $student4);

$uni->deleteSubject($subj1);
$uni->deleteSubject($subj2);

echo "<h2>setting grade</h2>";

$student1->setGrade($subj1, 10);
$student1->setGrade($subj2, 9);
echo ($student1->getGrade('1'));
echo "<br/>Avg: " . ($student1->getAvgGrade());


echo ($uni->print());

echo "</pre>";
