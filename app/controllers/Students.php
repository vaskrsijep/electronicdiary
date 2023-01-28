<?php

class Students extends Controller
{

  public function __construct()
  {
    $this->studentModel = $this->model('Student');

    $this->classModel = $this->model('School_Class');
  }



  public function index()
  {

    $students = $this->studentModel->showAllStudentsJoinClasses();

    $classes = $this->classModel->showAllClasses();


    $data = [

      'students' => $students,

      'classes' => $classes

    ];

    $this->view('admin/students/index', $data);
  }

  public function edit($id)
  {

    $student = $this->studentModel->getStudentById($id);

    $classes = $this->classModel->showAllClasses();


    $data = [

      'student' => $student,

      'classes' => $classes

    ];

    $this->view('/admin/students/edit', $data);
  }


  public function delete($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if ($this->studentModel->deleteStudent($id)) {

        flash('student_deleted_msg', 'Student Deleted');

        redirect('students');
      } else {

        die('Something went wrong');
      }
    } else {

      redirect('pages');
    }
  }


  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'first_name' => trim($_POST['first_name']),
        'last_name' => trim($_POST['last_name']),
        'id_school_class' => trim($_POST['id_school_class']),
        'student_id' => trim($_POST['student_id']),

        'first_name_err' => '',
        'last_name_err' => '',
        'id_school_class_err' => ''
      ];

      // Validate first name
      if (empty($data['first_name'])) {
        $data['first_name_err'] = 'Please enter first name';
      }

      // Validate last name
      if (empty($data['last_name'])) {
        $data['last_name_err'] = 'Please enter last name';
      }

      // Validate class 

      if (empty($data['id_school_class'])) {
        $data['id_school_class_err'] = 'Please select class';
      }

      // Make sure there are no errors
      if (empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['id_school_class_err'])) {
        // Validation passed
        //Execute
        if ($this->studentModel->update($data)) {
          // Redirect to login
          flash('student_updated', 'Student Updated');
          redirect('students');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors

        $this->view('admin/students/update', $data);
      }
    } else {
      $data = [

        'first_name' => '',
        'last_name' => '',
        'id_school_class' => '',
        'first_name_err' => '',
        'last_name_err' => '',
        'id_school_class_err' => '',
      ];


      $this->view('admin/students/update', $data); 
    }
  }
}
