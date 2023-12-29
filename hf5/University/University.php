<?php
require_once "AbstractUniversity.php";

class University extends AbstractUniversity
{
    // TODO Implement all the methods declared in parent
    /**
     * @var Subject[]
     */
    public $subjects = [];

    /**
     * Method accepts the name and code of the Subject, creates instance of the class,
     * adds the instance in $subjects array and returns created instance
     *
     * @param string $code
     * @param string $name
     * @return Subject
     */
    public function addSubject(string $code, string $name): Subject
    {
        $subject = new Subject($code, $name);
        $this->subjects[] = $subject;
        return $subject;
    }

    /**
     * Method accepts subject code and Student. Finds subject in $subjects array based on code and adds student to its array.
     *
     * @param string   $subjectCode
     * @param \Student $student
     * @return mixed
     */
    public function addStudentOnSubject(string $subjectCode, Student $student)
    {
        if (array_key_exists($subjectCode, $this->subjects)) {
            $this->subjects[$subjectCode] = $student;
        }
    }

    /**
     * Method returns students for given subject
     *
     * @param string $subjectCode
     * @return mixed
     */
    public function getStudentsForSubject(string $subjectCode)
    {
        if (array_key_exists($subjectCode, $this->subjects)) {
            $subject = $this->subjects[$subjectCode];
            return $subject->getStudents();
        }
    }

    /**
     * This method returns number of total students registered on all subjects
     *
     * @return int
     */
    public function getNumberOfStudents(): int
    {
        $totalNumber = 0;
        foreach ($this->subjects as $subject) {
            $totalNumber += count($subject->getStudents());
        }
        return $totalNumber;
    }

    /**
     * Method must iterate over $subjects, print the subject name then "-" 25 times,
     * then iterate over students of the subject and print student name and student number in format
     * StudentName - StudentNumber
     * Student2Name - Student2Number
     *
     * @return mixed
     */
    public function print()
    {
        echo "hi";
        foreach ($this->subjects as $subject) {
            echo $subject->getName();
            $students = $subject->getStudents();
            foreach ($students as $student) {
                echo $student->getName();
            }
        }
    }
}
