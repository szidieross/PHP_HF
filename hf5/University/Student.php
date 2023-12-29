<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:40 PM
 */

/**
 * Class Student
 */
class Student
{
    private string $name;
    private string $studentNumber;

    // TODO Generate constructor with both arguments.
    public function __construct(string $name, string $studentNumber)
    {
        $this->name = $name;
        $this->studentNumber = $studentNumber;
    }
    // TODO Generate getters and setters for both arguments

    public function getName(): string
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    public function setStudentNumber($studentNumber)
    {
        $this->studentNumber = $studentNumber;
    }

}
