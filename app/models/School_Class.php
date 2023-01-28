<?php
class School_class
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function update($data)
    {


        $this->db->query('UPDATE school_classes
                          SET name = :name
                          WHERE id_school_class = :id');

        $this->db->bind(':id', $data['id_school_class']);

        $this->db->bind(':name', $data['name']);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function showAllClasses()
    {

        // removed *

        $this->db->query('SELECT school_classes.id_school_class,
                          school_classes.name 
                          FROM school_classes');

        $classes = $this->db->resultSet();

        return $classes;
    }

    public function getClassById($id)
    {

        // removed *

        $this->db->query('SELECT school_classes.id_school_class,
                          school_classes.name
                          FROM school_classes 
                          WHERE id_school_class = :id_class');

        $this->db->bind(':id_class', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteClass($id)
    {

        $this->db->query('DELETE FROM school_classes
                          WHERE id_school_class = :id_school_class');

        $this->db->bind(':id_school_class', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Insert class

    public function insertClass($data)
    {
        $this->db->query('INSERT INTO school_classes(name)
                          VALUES (:name)');
        // Bind values
        $this->db->bind(':name', $data['name']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // get number of classes for parent child

    public function get_number_of_classes_for_child()
    {

        $this->db->query('SELECT students.first_name,
                          students.last_name,
                          students.id_school_class, COUNT(schedules.id_schedules) 
                          AS class_count
                          FROM students, schedules
                          WHERE students.id_student 
                          IN (SELECT users_students.id_student FROM users_students WHERE users_students.id_user = :id_user) AND schedules.day_id = :id_day AND schedules.subject_name != "" ANd schedules.class_id = students.id_school_class GROUP BY students.id_student');

        $id_day = idate('w', time());
        $id_user = (int) $_SESSION['id_user'];

        $this->db->bind(':id_user', $id_user);
        $this->db->bind(':id_day', $id_day);

        $num_of_classes_for_child = $this->db->resultSet();

        return $num_of_classes_for_child;
    }
}
