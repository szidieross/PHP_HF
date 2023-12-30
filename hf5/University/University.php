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
     * @var Student[]
     */
    public $students = [];

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
        $this->subjects[$code] = $subject;
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
        // var_dump($this->subjects);
        // echo "subjectcode: " . $subjectCode;
        // if (array_key_exists($subjectCode, $this->subjects)) {
        //     $subject=$this->subjects[$subjectCode];
        //     $studentName=$student->getName();
        //     $studentNumber=$student->getStudentNumber();
        //     $student=new Student($studentName,$studentNumber);
        //     echo($student->getName());
        //     $subject->addStudent($student);
        // }
        if (array_key_exists($subjectCode, $this->subjects)) {
            $subject = $this->subjects[$subjectCode];
            $subject->addStudent($student->getName(), $student->getStudentNumber());
        }
    }

    public function deleteStudentOnSubject(string $subjectCode, Student $student)
    {
        if (array_key_exists($subjectCode, $this->subjects)) {
            $subject = $this->subjects[$subjectCode];
            $subject->deleteStudent($student);
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
        $allStudents = [];
        foreach ($this->subjects as $subject) {
            $students = $subject->getStudents();
            foreach ($students as $student) {
                $studentNumber = $student->getStudentNumber();
                if (!in_array($studentNumber, $allStudents)) {
                    $allStudents[] = $studentNumber;
                }
            }
        }
        return count($allStudents);
    }

    public function deleteSubject(Subject $subject): void
    {
        $subjectCode = $subject->getCode();
        if (array_key_exists($subjectCode, $this->subjects)) {
            $subject = $this->subjects[$subjectCode];
            $studentNumber = count($subject->getStudents());
            if ($studentNumber > 0) {
                echo $subject->getName() . " subject can't be deleted";
            } else {
                unset($this->subjects[$subjectCode]);
            }
        }
    }

    public function sortStudentsByAvgGrade()
    {
        echo "<h1>sortStudentsByAvgGrade</h1>";
        foreach ($this->subjects as $subject) {
            $subjectStudents = $subject->getStudents();
            foreach ($subjectStudents as $student) {
                $studentNumber = $student->getStudentNumber();
                $studentName = $student->getName();

                if (!array_key_exists($studentNumber, $this->students)) {
                    $this->students[$studentNumber] = $studentName;
                    // echo $studentNumber . " - " . $studentName . " - ";
                    // echo ($student instanceof Student)."\n";
                    $avgGrade=$student->printGrades();
                    echo $avgGrade;

                }
            }

        }
        // var_dump($this->students);

        // foreach ($this->students as $student) {
        //     $avg=$student->getAvgGrade();
        //     echo $avg."\n";
        // }
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
        $output = "<h2>University Data</h2>";
        if (count($this->subjects) > 0) {
            foreach ($this->subjects as $subject) {
                $output .= "<h3>" . $subject->getName() . "</h3><ol>";

                $students = $subject->getStudents();
                if (count($students) > 0) {
                    foreach ($students as $student) {
                        $output .= "\t<li>" . $student->getName() . "</li>";
                    }
                } else {
                    $output .= "\nNo students yet.";
                }
                $output .= "</ol><br/>";
            }
        } else {
            $output = "We have no subjects or students yet.";
        }
        return $output;
    }
}
