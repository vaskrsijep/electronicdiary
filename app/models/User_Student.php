<?php
class User_Student
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insertInUserStudentTable()
    {

        $this->db->query('INSERT INTO users_students (id_user, id_student) VALUES 
        ((SELECT id_user FROM users WHERE id_user_role = 4 ORDER BY id_user DESC LIMIT 1) 

        , 

        (SELECT id_student FROM students  ORDER BY id_student DESC LIMIT 1))');

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
