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
    private array $grades = [];
    private array $courses = [];

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
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    public function setStudentNumber(string $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    public function setGrade(Subject $subject, float $grade): void
    {
        $students = $subject->getStudents();
        if (array_key_exists($this->getStudentNumber(), $students)) {
            $subjectCode = $subject->getCode();
            $this->grades[$subjectCode] = $grade;
            $subjectName = $subject->getName();
            $this->courses[$subjectCode] = $subjectName;
        } else {
            echo "<br/>" . $this->getName() . " did not take " . $subject->getName() . "<br/>";
        }
    }

    public function getGrade(string $subjectCode)
    {
        return $this->grades[$subjectCode];
    }

    public function getAvgGrade(): float
    {
        var_dump($this->grades);
        $average = 0;
        $numOfGrades = count($this->grades);
        if ($numOfGrades > 0) {
            $total = 0;
            foreach ($this->grades as $grade) {
                $total += $grade;
            }
            $average = $total / $numOfGrades;
        }
        return $average;
    }

    public function printGrades(): string
    {
        $output = "\n" . $this->getName() . "'s grades:\nCourse Name - Course Grade";

        if (count($this->grades) > 0) {
            foreach ($this->grades as $subjectCode => $grade) {

                $output .= "\n" . $this->courses[$subjectCode] . "\t\t" . $grade;
            }
        }else{
            $output .= "\nNo grades yet.\n";
        }
        
        var_dump($this->grades);

        return $output;
    }
}
