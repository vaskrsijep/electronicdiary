<?php

class Grades extends Controller
{

    public function __construct()
    {
        $this->gradeModel = $this->model('Grade');
    }
    public function index()
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 3) {
                $this->view('grades/index');
            } else {
                $this->logout();
            }
        } else {
            $this->view('users/login');
        }
    }

    public function edit($id)
    {
        $subject = $this->subjectModel->getSubjectId($id);

        $data = [
            'subject' => $subject
        ];

        $this->view('/admin/subjects/edit', $data);
    }
    // this method gets average grade of entire school from Grade model
    public function showSchoolStatistics()
    {
        $schoolGradesDB = $this->gradeModel->showAvgGradeOfSchool();

        $arrayOfGrades = [];

        foreach ($schoolGradesDB as $key => $value) {
            array_push($arrayOfGrades, [
                "average_grade" => $schoolGradesDB[$key]->average_grade,
                "id_subject" => $schoolGradesDB[$key]->id_subject,
                "name" => $schoolGradesDB[$key]->name
            ]);
        }

        echo (json_encode($arrayOfGrades));
    }

    public function displayAvgGRadeByClasses()
    {
        $id_class = $_POST['idSchoolClass'];

        $averageGradesByClasses = $this->gradeModel->showAvgGradesByClasses($id_class);

        echo (json_encode($averageGradesByClasses));
    }


    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->gradeModel->delete($id)) {
                flash('grade_deleted_msg', 'Grade Deleted');
                redirect('users\t_students');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('users');
        }
    }

    public function updateTrimester()
    {

        if ($this->gradeModel->updateTrimester($_POST)) {
            //redirect('teacher');
        };
    }
}
