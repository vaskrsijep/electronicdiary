<?php
class Subject
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function insertSubject($data)
    {
        $this->db->query('INSERT INTO subjects (name) VALUES (:name)');

        $this->db->bind(':name', $data['name']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showallSubjects() {
        $this->db->query('SELECT id_subject, 
                         name FROM subjects');

        $subjects = $this->db->resultSet();

        return $subjects;
    }
    public function editSubject()
    {
        $this->db->query('UPDATE subjects
                          SET name = :name');
    }
    public function getSubjectId($id)
    {

        // removed *

        $this->db->query('SELECT subjects.id_subject, subjects.name
                         FROM subjects
                         WHERE id_subject = :id_subject');

        $this->db->bind(':id_subject', $id);

        $row = $this->db->single();

        return $row;
    }


    public function deleteSubject($id)
    {
        $this->db->query('DELETE FROM subjects 
                          WHERE id_subject = :id_subject');

        $this->db->bind(':id_subject', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function update($data)
    {
        $this->db->query('UPDATE subjects
                         SET name = :name
                         WHERE id_subject = :id_subject');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':id_subject', $data['id_subject']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
