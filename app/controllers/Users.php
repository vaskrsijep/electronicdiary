<?php
class Users extends Controller
{
    public function __construct()
    {

        $this->userModel = $this->model('User');

        $this->studentModel = $this->model('Student');

        $this->classModel = $this->model('School_class');

        $this->User_Student = $this->model('User_Student');

        $this->gradeModel = $this->model('Grade');

        $this->subjectModel = $this->model('Subject');

        $this->meetingModel = $this->model('Meeting');
    }

    public function insert()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form 
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            // Init data
            $data = [
                'name' => htmlspecialchars(trim($_POST['name'])),
                'email' => htmlspecialchars(trim($_POST['email'])),
                'password' => htmlspecialchars(trim($_POST['password'])),
                'confirm_password' => htmlspecialchars(trim($_POST['confirm_password'])),
                'user_role' => htmlspecialchars(trim($_POST['user_role'])),
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'id_school_class' => trim($_POST['id_school_class']),
                'teacher_class_id' => (int) trim($_POST['teacher_class_id']),
                'professor_class_id' =>  (int) trim($_POST['professor_class_id']),


                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'user_role_err' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'id_school_class_err' => '',
                'id_teacher_class_err' => '',

            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters.';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Validate User Role
            if (empty($data['user_role'])) {
                $data['user_role_err'] = 'Please select user role';
            } else {
                /* this 2nd condition checks out that value sent from dropdown menu(users/insert.php) matches
                    id_user_roles in values database
                 */
                if (is_numeric($data['user_role']) && in_array($data['user_role'], range(1, 4, 1), true)) {
                    $data['user_role_err'] = 'User role does not exist';
                }
            }

            // If user role is parent
            if ($data['user_role'] == 4) {
                // Validate first name
                if (empty($data['first_name'])) {

                    $data['first_name_err'] = 'Please enter Student first name';
                }

                // Validate last name
                if (empty($data['last_name'])) {
                    $data['last_name_err'] = 'Please enter Student last name';
                }

                // Validate class 

                if (empty($data['id_school_class'])) {
                    $data['id_school_class_err'] = 'Please select Student class';
                }
            }

            // if user role is teacher

            if ($data['user_role'] == 3) {
                // Validate teacher class
                if (empty($data['teacher_class_id'])) {

                    $data['id_teacher_class_err'] = 'Please select Teacher Class';
                }
            }

            // Make sure errors are empty
            if (
                empty($data['email_err'])
                && empty($data['name_err'])
                && empty($data['password_err'])
                && empty($data['confirm_password_err'])
                && empty($data['first_name_err'])
                && empty($data['last_name_err'])
                && empty($data['id_school_class_err'])
                && empty($data['id_teacher_class_err'])

            ) {

                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Add User
                if ($this->userModel->insert($data)) {

                    // Add Student

                    if (!empty($data['first_name'] && !empty($data['last_name']) && !empty($data['id_school_class']))) {

                        if ($this->studentModel->insertStudent($data)) {

                            if ($this->User_Student->insertInUserStudentTable()) {

                                flash('student_message', 'Student Added');
                                redirect('/students');
                            }
                        } else {
                            die('Something went wrong');
                        }
                    }

                    // Add in table class_masters

                    if (isset($data['professor_class_id'])) {

                        $this->userModel->insertInTableClass_masters($data);
                    }


                    flash('register_success', 'You have added a user');
                    redirect('/users/insert');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $classes = $this->classModel->showAllClasses();

                $data['classes'] = $classes;


                $this->view('users/insert', $data);
            }
        } else {
            // Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'user_role' => '',
                'first_name' => '',
                'last_name' => '',
                'id_school_class' => '',
                'teacher_class_id' => '',
                'professor_class_id' => '',

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'user_role_err' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'id_school_class_err' => '',
                'id_teacher_class_err' => '',
            ];

            $classes = $this->classModel->showAllClasses();

            $data['classes'] = $classes;

            // Load view
            $this->view('users/insert', $data);
        }
    }

    public function delete()
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["id_user"])) {

            $id = $_POST['id_user'];

            if ($this->userModel->deleteUser($id)) {

                flash('user_deleted_msg', 'User Deleted');
                $this->view('users/delete');
            } else {

                die('Something went wrong');
            }
        } else {
            $this->view('users/delete');
        }
    }

    public function edit($id)
    {
        $user = $this->userModel->getUserById($id);

        $data = [
            'user' => $user
        ];

        $this->view("users/edit", $data);
    }

    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'id_user_role' => trim($_POST['id_user_role']),
                'id_user' => trim($_POST['id_user']),

                'username_err' => '',
                'email_err' => '',
                'id_user_role_err' => '',
            ];

            // Validate Name
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate User Role
            if (empty($data['id_user_role'])) {
                $data['id_user_role_err'] = 'Please select user role';
            } else {
                /* this 2nd condition checks out that value sent from dropdown menu(users/insert.php) matches
                id_user_roles in values database
             */
                if (is_numeric($data['id_user_role']) && in_array($data['id_user_role'], range(1, 4, 1), true)) {
                    $data['id_user_role_err'] = 'User role does not exist';
                }
            }

            // Make sure there are no errors
            if (empty($data['username_err']) && empty($data['email_err'])) {
                // Validation passed
                //Execute
                if ($this->userModel->updateUser($data)) {
                    // Redirect to login
                    flash('user_updated', 'User Updated');
                    redirect('users');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors

                $this->view('users/update', $data);
            }
        } else {
            $data = [

                'username' => '',
                'email' => '',
                'id_user' => '',
                'id_user_role' => '',
                'username_err' => '',
                'email_err' => '',
                'id_user_role_err' => '',
            ];

            $this->view('users/update', $data);
        }
    }
    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [

                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    // Create Session
                    $this->createUserSession($loggedInUser);
                    $this->userModel->LoginTimeInsert();

                    /* id_user_role 1 is administrator,id_user role 2 is director,id_user_role 3 is teacher,
                        id_user_role 4 is parent so it will redirect it to proper page dependent of role */
                    if (isset($_SESSION['id_user_role']) && $this->isLoggedIn()) {
                        switch ($_SESSION['id_user_role']) {
                            case 1:
                                redirect('users/admin');
                                break;
                            case 2:
                                redirect('users/director');
                                break;
                            case 3:
                                redirect('users/teacher');
                                break;
                            case 4:
                                redirect('users/parent');
                                break;
                            default:
                                redirect('users/login');
                                break;
                        }
                    } else {
                        redirect('users/login');
                    }
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }
        } else {
            // Init data
            $data = [

                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['id_user'] = $user->id_user;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['id_user_role'] = $user->id_user_role;
        $_SESSION['teacher_class_id'] = $user->teacher_class_id;
    }

    public function logout()
    {
        $this->userModel->LogoutTimeUpdate();
        unset($_SESSION['id_user']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['id_user_role']);
        session_destroy();
        redirect('users/login');
    }

    public function logout_new() {
        $this->userModel->show_logs();
    }

    public function admin()
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 1) {
                $this->view('admin/index');
            } else {
                $this->logout();
            }
        } else {
            redirect('users/login');
        }
    }

    public function GetUserRoles()
    {
        $roles = $this->userModel->GetAllUserRoles();

        foreach ($roles as $key => $value) {
            $user_roles[$roles[$key]->id_user_role] = $roles[$key]->name;
        }

        return $user_roles;
    }

    /*  this function gets all data for user including username, email and user role from 
        User model sorted by role or empty array if user role is not selected
    */
    public function GetUsersByUserRole($id_user_role)
    {
        if ($id_user_role !== '') {
            $usersFromModel = $this->userModel->GetUsersByRoles($id_user_role);

            foreach ($usersFromModel as $key => $value) {
                $users[$key] = $value;
            }

            return $users;
        } else {
            return [];
        }
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['id_user'])) {
            return true;
        } else {
            return false;
        }
    }

    /* TEACHER PART */

    public function teacher()
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 3) {

                $number_of_students = $this->studentModel->count_students();

                $number_of_classes = $this->userModel->get_number_of_classes();

                //$next_meeting = $this->meetingModel->showNextMeeting();

                $data = [

                    'n_students' => $number_of_students,
                    'n_classes' => $number_of_classes
                    //'next_meeting' => $next_meeting
                ];

                $this->view('teacher/index', $data);
            } else {
                $this->logout();
            }
        } else {
            redirect('users/login');
        }
    }
    /* this method is enabling teacher/t_student/index page to show all students 
    from teacher's grade by using method contained in Student model*/
    public function t_students()
    {


        $students = $this->studentModel->showStudentsToTeacher();

        $data = [

            'students' => $students
        ];

        $this->view('teacher/t_students/index', $data);
    }


    public function grades()
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 3) {
                $this->view('teacher/grades/index');
            } else {
                $this->logout();
            }
        } else {
            $this->view('users/login');
        }
    }
    public function insertg($id)
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 3) {
                $grades = $this->gradeModel->showallgrades();
                $grade = $this->gradeModel->getGradeIdbyStudent($id);
                $subjects = $this->subjectModel->showAllSubjects();
                $allsubjects = $this->gradeModel->showgrade($id);
                $students = $this->studentModel->getStudentById($id);
                $gardeOptions = $this->gradeModel->showGradeOptions();
             
                $data = [
                    'allsubjects' => $allsubjects,
                    'grades' => $grades,
                    'grade' => $grade,
                    'subjects' => $subjects,
                    'student' => $students,
                    'gradeOptions' => $gardeOptions
                ];
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    $data2 = [
                        'grades' => $_POST['grades'],
                        'grade_status' => $_POST['grade_status'],
                        'school_class_id' => $_POST['school_class_id'],
                        'id_subject' => $_POST['id_subject'],
                        'id_student' => $_POST['id_student'],
                        //'grade_for' => $_POST['grade_for']
                    ];
                    
                    // Check which part of school year is

                    // get current date
                    $currentDate = strtotime(date('y-m-d'));

                    // Dates for first, second , third, fourth trimester
                 
                    //$beginOfFirstTrimester = strtotime("2019-09-02");
                    //$beginOfSecondTrimester = strtotime("2019-11-05");
                    $beginOfSecondTrimester = strtotime($gardeOptions[1]->start_from);
                    $beginOfThirdTrimester = strtotime($gardeOptions[2]->start_from);
                    $beginOfFourthTrimester = strtotime($gardeOptions[3]->start_from);

                    // compare current and defined dates for trimesters

                    if ($currentDate < $beginOfSecondTrimester) {

                        $data2['grade_for'] = 1;
                    } elseif ($currentDate < $beginOfThirdTrimester) {

                        $data2['grade_for'] = 2;
                    } elseif ($currentDate < $beginOfFourthTrimester) {

                        $data2['grade_for'] = 3;
                    } else {

                        $data2['grade_for'] = 4;
                    }

                    if (isset($_POST['submit'])) {
                        if ($this->gradeModel->insertGrade($data2)) {
                            flash('grades_message', 'grade added');
                        } else {
                            die('problem');
                        }
                    }
                }

                $this->view('teacher/grades/insertg', $data);
            } else {
                $this->logout();
            }
        } else {
            $this->view('users/login');
        }
    }

    // Showing all grades by subject for student

    public function showg($id)
    {


        $student = $this->studentModel->getStudentById($id);

        $student_grades = $this->gradeModel->showgrade($id);

        $data = [
            'student' => $student,
            'student_grades' => $student_grades
        ];

        if ($_SESSION['id_user_role'] == 3) {
            $this->view('teacher/grades/showg', $data);
        } else if ($_SESSION['id_user_role'] == 4) {
            $this->view('parent/grades/showg', $data);
        }
    }

    // Displaying form for editing grade by subject

    public function editg($id)
    {

        $grade = $this->gradeModel->showGradeByIdStudentSubject($id);

        $data = [

            'grade' => $grade,
            'id' => $id
        ];

        $this->view('teacher/grades/editg', $data);
    }

    public function updateGrade($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'grade' => trim($_POST['grade']),
                'id' => $id,

                'grade_err' => '',
            ];


            // Validate Grade
            if (empty($data['grade'])) {
                $data['grade_err'] = 'Please enter grade';
            }

            // Make sure there are no errors
            if (empty($data['grade_err'])) {
                // Validation passed
                //Execute

                if ($this->gradeModel->updateGrade($data)) {
                    // Redirect to login
                    flash('grade_updated', 'Grade Updated');
                    redirect('users/t_students');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors

                $this->view('teacher/grades/editg', $data);
            }
        } else {
            $data = [

                'grade' => '',
                'id' => ''
            ];

            $this->view('teacher/grades/editg', $data);
        }
    }



    /* TEACHER PART END */

    public function index()
    {
        if ($this->isLoggedIn()) {
            if ($_SESSION['id_user_role'] == 1) {
                $this->view('users/index');
            } else {
                $this->logout();
            }
        } else {
            redirect('users/login');
        }
    }

    /* PARENT PART */
    public function parent()
    {
        if (isset($_SESSION['id_user'])) {

            if ($_SESSION['id_user_role'] == 4) {

                $num_of_classes_for_child = $this->classModel->get_number_of_classes_for_child();

                $data = [
                    'num_of_classes_for_child' => $num_of_classes_for_child
                ];

                $this->view('parent/index', $data);
            } else {
                $this->logout();
            }
        } else {
            redirect('users/login');
        }
    }
    // this method shows children of each parent
    public function p_students()
    {
        $parentId = $_SESSION['id_user'];

        if ($_SESSION['id_user_role'] == 4) {

            $students = $this->studentModel->showStudentsToParent();

            $data = [
                'students' => $students
            ];

            $this->view('parent/students/index', $data);
        }
    }
    /* PARENT PART END*/

    /* DIRECTOR PART */

    public function director()
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 2) {
                $this->view('director/index');
            } else {
                $this->logout();
            }
        } else {
            redirect('users/login');
        }
    }

    public function class_statistic()
    {
        $classes = $this->classModel->showAllClasses();

        $data = [

            'classes' => $classes

        ];

        $this->view('director/statistic/class_statistic', $data);
    }

    // this method gets average grade of entire school from Grade model
    public function school_statistic()
    {
        $this->view('director/statistic/school_statistic');
    }

    /* DIRECTOR PART END */

    /* ASSIGN USER */

    public function assign()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'first_name_a' => trim($_POST['first_name_a']),
                'last_name_a' => trim($_POST['last_name_a']),
                'id_school_class_a' => trim($_POST['id_school_class_a']),
                'email_p' => trim($_POST['email_p']),

                'first_name_a_err' => '',
                'last_name_a_err' => '',
                'id_school_class_a_err' => '',
                'email_p_err' => ''

            ];


            // Validate first name
            if (empty($data['first_name_a'])) {
                $data['first_name_a_err'] = 'Please enter first name';
            }

            // Validate last first name
            if (empty($data['last_name_a'])) {
                $data['last_name_a_err'] = 'Please last enter name';
            }

            // Validate email 

            if (empty($data['email_p'])) {
                $data['email_p_err'] = 'Please enter parent email';
            } else {
                // Check email
                if (!$this->studentModel->parentEmailExists($data['email_p'])) {
                    $data['email_p_err'] = 'Parent Email not exists';
                }
            }

            // Validate class 

            if (empty($data['id_school_class_a'])) {
                $data['id_school_class_a_err'] = 'Please select Student class';
            }


            // Make sure there are no errors
            if (empty($data['first_name_a_err']) && empty($data['last_name_a_err']) && empty($data['id_school_class_a_err']) && empty($data['email_p_err'])) {
                // Validation passed
                //Execute
                if ($this->studentModel->assignStudent($data) && $this->studentModel->assignStudent2($data)) {
                    // Redirect to login
                    flash('assign_message', 'Student Assigned to parent');
                    redirect('/students');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $classes = $this->classModel->showAllClasses();

                $data['classes'] = $classes;

                $this->view('admin/students/assign_student', $data);
            }
        } else {
            $data = [

                'first_name_a' => '',
                'last_name_a' => '',
                'id_school_class_a' => '',
                'email_p' => '',

                'first_name_a_err' => '',
                'last_name_a_err' => '',
                'id_school_class_a_err' => '',
                'email_p_err' => ''

            ];

            $classes = $this->classModel->showAllClasses();

            $data['classes'] = $classes;

            $this->view('admin/students/assign_student', $data);
        }
    }

    // Assign to professor

    public function assign_to_professor()
    {

        $professors = $this->userModel->find_all_professors();
        $subjects = $this->subjectModel->showallSubjects();
        $classes = $this->classModel->showAllClasses();

        $data = [

            'professors' => $professors,
            'subjects' => $subjects,
            'classes' => $classes,
            'id_class' => '',
            'id_professor' => ''

        ];

        $this->view('users/assign_to_professor', $data);
    }

    public function show_log()
    {

        if (isset($_SESSION['id_user']) && $_SESSION['id_user_role'] === '1') {

            $this->view("users/user_log");
        }
    }

    public function showLastLoggedInTime()
    {
        $logsFromDb = $this->userModel->show_logs();

        print(json_encode($logsFromDb));
    }

    /* ASSIGN USER END*/

    // insert in professor info table

    public function insert_in_professor_info()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id_professor' => $_POST['professor_id'],
                'id_subject' => $_POST['subject_id'] ?? '',
                'id_class' => $_POST['class_id'],

                'id_professor_err' => '',
                'id_subject_err' => '',
                'id_class_err' => '',


            ];


            // Validate id_professor
            if (empty($data['id_professor'])) {
                $data['id_professor_err'] = 'Please select professor';
            }

            // subject
            if (empty($data['id_subject'])) {

                $data['id_subject_err'] = 'Please select subject';
            }

            // Validate class
            if (empty($data['id_class'])) {
                $data['id_class_err'] = 'Please select class';
            }

            if (
                empty($data['email_err'])
                && empty($data['id_professor_err'])
                && empty($data['id_subject_err'])
                && empty($data['id_class_err'])
            ) {




                for ($i = 0; $i < count($data['id_subject']); $i++) {

                    $success = $this->userModel->insertProfessorInfo($data['id_subject'][$i], $data);
                }

                if ($success) {
                    flash('professor_msg', "Subject('s) addeded for professor");
                    redirect('users/assign_to_professor');

                    $this->view('users/assign_to_professor');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors

                $professors = $this->userModel->find_all_professors();
                $subjects = $this->subjectModel->showallSubjects();
                $classes = $this->classModel->showAllClasses();

                $data['professors'] = $professors;
                $data['subjects'] = $subjects;
                $data['classes'] = $classes;


                $this->view('users/assign_to_professor', $data);
            }
        }
    }
}
