<?php

class Schedules extends Controller
{

    public function __construct()
    {

        $this->schedulesModel = $this->model('Schedule');

        $this->classModel = $this->model('School_Class');

        $this->subjectModel = $this->model('Subject');
    }



    public function index()
    {


        $classes = $this->classModel->showAllClasses();

        $data = [

            'classes' => $classes

        ];

        $this->view('admin/schedules/index', $data);
    }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                //monday
                'a1' => trim($_POST['a1']),
                'a2' => trim($_POST['a2']),
                'a3' => trim($_POST['a3']),
                'a4' => trim($_POST['a4']),
                'a5' => trim($_POST['a5']),
                'a6' => trim($_POST['a6']),
                'a7' => trim($_POST['a7']),
                'day1' => trim($_POST['day1']),



                //tuesday
                'b1' => trim($_POST['b1']),
                'b2' => trim($_POST['b2']),
                'b3' => trim($_POST['b3']),
                'b4' => trim($_POST['b4']),
                'b5' => trim($_POST['b5']),
                'b6' => trim($_POST['b6']),
                'b7' => trim($_POST['b7']),
                'day2' => trim($_POST['day2']),


                //wednesday
                'c1' => trim($_POST['c1']),
                'c2' => trim($_POST['c2']),
                'c3' => trim($_POST['c3']),
                'c4' => trim($_POST['c4']),
                'c5' => trim($_POST['c5']),
                'c6' => trim($_POST['c6']),
                'c7' => trim($_POST['c7']),
                'day3' => trim($_POST['day3']),

                //tuesday
                'd1' => trim($_POST['d1']),
                'd2' => trim($_POST['d2']),
                'd3' => trim($_POST['d3']),
                'd4' => trim($_POST['d4']),
                'd5' => trim($_POST['d5']),
                'd6' => trim($_POST['d6']),
                'd7' => trim($_POST['d7']),
                'day4' => trim($_POST['day4']),

                //friday

                'e1' => trim($_POST['e1']),
                'e2' => trim($_POST['e2']),
                'e3' => trim($_POST['e3']),
                'e4' => trim($_POST['e4']),
                'e5' => trim($_POST['e5']),
                'e6' => trim($_POST['e6']),
                'e7' => trim($_POST['e7']),
                'day5' => trim($_POST['day5']),


                'class_num1' => trim($_POST['class_num1']),
                'class_num2' => trim($_POST['class_num2']),
                'class_num3' => trim($_POST['class_num3']),
                'class_num4' => trim($_POST['class_num4']),
                'class_num5' => trim($_POST['class_num5']),
                'class_num6' => trim($_POST['class_num6']),
                'class_num7' => trim($_POST['class_num7']),
                'class_id' => trim($_POST['id_school_class']),

                'class_err' => ''

            ];

            // Validate class
            if (empty($data['class_id'])) {
                $data['class_err'] = 'Please choose class';
            }


            // Make sure there are no errors
            if (
                empty($data['class_err'])
            ) {
                // Validation passed
                //Execute
                if ($this->schedulesModel->insertSchedule($data)) {
                    // Redirect to login
                    flash('schedule_insert_message', 'Schedule Created');
                    redirect('schedules');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors

                $classes = $this->classModel->showAllClasses();

                $data['classes'] = $classes;

                $schedules = $this->schedulesModel->getClassWithSchedule();

                $data['schedule_class'] = $schedules;

                $subjects = $this->subjectModel->showallSubjects();

                $data['subjects'] = $subjects;

                $this->view('admin/schedules/insert', $data);
            }
        } else {
            $data = [
                'a1' => '',
                'a2' => '',
                'a3' => '',
                'a4' => '',
                'a5' => '',
                'a6' => '',
                'a7' => '',
                'day1' => '',

                'b1' => '',
                'b2' => '',
                'b3' => '',
                'b4' => '',
                'b5' => '',
                'b6' => '',
                'b7' => '',
                'day2' => '',

                'c1' => '',
                'c2' => '',
                'c3' => '',
                'c4' => '',
                'c5' => '',
                'c6' => '',
                'c7' => '',
                'day3' => '',

                'd1' => '',
                'd2' => '',
                'd3' => '',
                'd4' => '',
                'd5' => '',
                'd6' => '',
                'd7' => '',
                'day4' => '',

                'e1' => '',
                'e2' => '',
                'e3' => '',
                'e4' => '',
                'e5' => '',
                'e6' => '',
                'e7' => '',
                'day5' => '',
                'id_class' => '',
                'class_err' => ''

            ];

            $classes = $this->classModel->showAllClasses();

            $data['classes'] = $classes;

            $schedules = $this->schedulesModel->getClassWithSchedule();

            $data['schedule_class'] = $schedules;

            $subjects = $this->subjectModel->showallSubjects();

            $data['subjects'] = $subjects;

            $this->view('admin/schedules/insert', $data);
        }
    }

    public function edit($id)
    {

        $schedule = $this->schedulesModel->getScheduleById($id);

        $subjects = $this->subjectModel->showallSubjects();

        $data['subjects'] = $subjects;

        $data['schedule'] = $schedule;

        $this->view('admin/schedules/edit', $data);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'name' => trim($_POST['name']),

                'id_schedules' => trim($_POST['id_schedule']),

            ];


            //Execute
            if ($this->schedulesModel->update($data)) {
                // Redirect to login
                flash('schedule_update_message', 'Schedule Updated');
                redirect('schedules');
            } else {
                die('Something went wrong');
            }
            // } else {
            //     // Load view with errors

            //     $this->view('admin/schedules/update', $data);
            // }
        } else {
            $data = [

                'name' => '',


            ];


            $this->view('admin/schedules/update', $data);
        }
    }

    public function show()
    {

        $id = htmlspecialchars($_POST['id_class'] ?? '');

        $schedules = $this->schedulesModel->getScheduleByClassId($id);

        $data['schedules'] = $schedules;

        $class_name = $this->schedulesModel->getClassNameByClassId($id);

        $data['class_name'] =  $class_name;

        $classes = $this->classModel->showAllClasses();

        $data['classes'] = $classes;

        $data['id_clas'] = $id;

        $this->view('admin/schedules/index', $data);
    }

    public function delete($id = '')
    {

        if ($id == '') {
            die('Schedule not exists');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            if ($this->schedulesModel->deleteSchedule($id)) {

                flash('schedule_deleted_msg', 'Schedule Deleted');

                redirect('schedules');
            } else {

                die('Something went wrong');
            }
        } else {

            redirect('pages');
        }
    }

    public function school_calendar()
    {

        $class_id = (int) htmlspecialchars($_SESSION['teacher_class_id']);

        $schedules = $this->schedulesModel->show_schedule_by_teacher_class_id($class_id);

        $data = [

            'schedules' => $schedules

        ];

        $this->view('teacher/classes/schedule', $data);
    }
}
