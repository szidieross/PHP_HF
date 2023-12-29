<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:16 PM
 */

/**
 * Class Subject
 */
class Subject
{
    private string $code;
    private string $name;
    /**
     * @var Student[]
     */
    private array $students = [];

    // TODO Generate getters and setters

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }
    // TODO Generate constructor for all attributes. $students argument of the constructor can be empty

    public function __construct(string $code, string $name, Student $students = [])
    {
        $this->code = $code;
        $this->name = $name;
        $this->students = $students;
    }
    //ToDo
    /**
     * Method accepts student name and number, creates instance of the Student class, adds inside $students array
     * and returns created instance
     *
     * @param string $name
     * @param string $studentNumber
     * @return \Student
     */
    public function addStudent(string $studentName, string $studentNumber): Student
    {
        $student = new Student($studentName, $studentNumber);
        $this->students = $student;
        return $student;
    }

    // ToDo
    private function isStudentExists(string $studentNumber): bool
    {
        return 0;
    }

}
