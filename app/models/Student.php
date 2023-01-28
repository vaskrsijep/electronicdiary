<?php
class Student
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function insertStudent($data)
    {


        $this->db->query('INSERT INTO students (first_name , last_name , id_school_class) 
                          VALUES (:first_name , :last_name , :id_school_class)');

        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':id_school_class', $data['id_school_class']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function deleteStudent($id)
    {
        $this->db->query('DELETE FROM students
                          WHERE id_student = :id_student');

        $this->db->bind(':id_student', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function showAllStudentsJoinClasses()
    {
        $this->db->query('SELECT students.id_student , 
                                 students.first_name , 
                                 students.last_name , 
                                 school_classes.name , 
                                 school_classes.id_school_class 
                                 FROM students 
                                 JOIN school_classes 
                                 ON students.id_school_class = school_classes.id_school_class ');

        $students = $this->db->resultSet();

        return $students;
    }

    /* this method is showing all students for perticular teacher */
    public function showStudentsToTeacher()
    {


        $id_teacher = (int) htmlspecialchars($_SESSION['id_user']);

        $this->db->query(' SELECT   students.id_student,
                            students.first_name,
                            students.last_name,
                            school_classes.name
                            FROM students 
                            JOIN users ON users.teacher_class_id = students.id_school_class 
                            JOIN school_classes ON students.id_school_class = users.teacher_class_id
                            WHERE users.id_user = :id_teacher AND users.teacher_class_id = school_classes.id_school_class
                                        ');

        $this->db->bind(':id_teacher', $id_teacher);

        $students = $this->db->resultSet();

        return $students;
    }

    /* this method is showing all students for perticular parent */
    public function showStudentsToParent()
    {

        $id_parent = (int) htmlspecialchars($_SESSION['id_user']);

        $this->db->query(' SELECT students.id_student,
                            students.first_name,
                            students.last_name
                            FROM students 
                            JOIN users_students ON students.id_student = users_students.id_student
                            JOIN users ON users_students.id_user = users.id_user
                            WHERE users_students.id_user = :id_parent');

        $this->db->bind(':id_parent', $id_parent);

        $students = $this->db->resultSet();

        return $students;
    }

    public function getStudentById($id)
    {
        $this->db->query('SELECT students.id_student,
                          students.first_name,
                          students.last_name,
                          students.id_school_class FROM students WHERE id_student = :id_student');

        $this->db->bind(':id_student', $id);

        $row = $this->db->single();

        return $row;
    }

    public function update($data)
    {
        $this->db->query(
                        'UPDATE students 
                         SET    first_name = :first_name, 
                                last_name = :last_name, 
                                id_school_class = :id_school_class 
                          WHERE id_student = :id'
        );

        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':id_school_class', $data['id_school_class']);
        $this->db->bind(':id', $data['student_id']);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function assignStudent($data)
    {

        $this->db->query('INSERT INTO students (students.first_name, students.last_name , students.id_school_class) VALUES
        
        (:first_name_a , :last_name_a, :id_school_class_a);
        
        ');

        $this->db->bind(':first_name_a', $data['first_name_a']);

        $this->db->bind(':last_name_a', $data['last_name_a']);

        $this->db->bind(':id_school_class_a', $data['id_school_class_a']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function assignStudent2($data)
    {

        $this->db->query('INSERT INTO users_students (id_user, id_student) VALUES
        
         ((SELECT id_user 
         from users 
         WHERE users.email = :email), (SELECT id_student FROM students ORDER BY id_student DESC LIMIT 1))');

        $this->db->bind(':email', $data['email_p']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // checks if parent email exist in database

    public function parentEmailExists($email)
    {

        $this->db->query('SELECT users.id_user 
                          FROM users
                          WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // counts number of students by class

    public function count_students()
    {

        $this->db->query('SELECT count(*) as number_of_students
                         FROM students
                         WHERE students.id_school_class = :id_class');

        $id_class = (int) htmlspecialchars($_SESSION['teacher_class_id']);

        $this->db->bind(':id_class', $id_class);

        $numer_of_students = $this->db->single(PDO::FETCH_ASSOC);

        return $numer_of_students;
    }
}
