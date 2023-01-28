<?php

class Subjects extends Controller
{

  public function __construct()
  {
    $this->subjectModel = $this->model('Subject');
  }
  public function index()
  {
    $subjects = $this->subjectModel->showallSubjects();

    $data = [
      'subjects' => $subjects
    ];

    $this->view('admin/subjects/index', $data);
  }
  public function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'name' => trim($_POST['name']),

        'name_err' => '',

      ];

      // Validate first name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please enter name';
      }


      // Make sure there are no errors
      if (empty($data['name_err'])) {
        // Validation passed
        //Execute
        if ($this->subjectModel->insertSubject($data)) {
          // Redirect to login
          flash('subject_message', 'Subject Added');
          redirect('/subjects');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors

        $subjects = $this->subjectModel->showallSubjects();

        $data['subjects'] = $subjects;

        $this->view('admin/subjects/insert', $data);
      }
    } else {

      $subjects = $this->subjectModel->showallSubjects();

      $data = [
        'name' => '',

        'name_err' => '',

        'subjects' => $subjects

      ];

      $this->view('admin/subjects/insert', $data);
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
  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->subjectModel->deleteSubject($id)) {
        flash('subject_deleted_msg', 'Subject Deleted');
        redirect('subjects');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('pages');
    }
  }
  public function show($id)
  {
    $subject = $this->subjectModel()->getSubjectId($id);

    $data = [
      'subject' => $subject
    ];
    $this->view();
  }
  public function update()
  {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'name' => trim($_POST['name']),
        'id_subject' => trim($_POST['id_subject']),

        'name_err' => ''
      ];


      // Validate for name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please enter a subject';
      }

      if (empty($data['name_err'])) {
        if ($this->subjectModel->update($data)) {
          flash('subject_updated', 'Subject Updated');
          redirect('subjects');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('admin/subjects/update', $data);
      }
    }
  }
}
