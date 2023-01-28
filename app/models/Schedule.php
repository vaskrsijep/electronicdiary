<?php
class Schedule
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function insertSchedule($data)
    {
        $this->db->query(

            'INSERT INTO schedules (subject_name , order_id , day_id, class_id)
        
         VALUES 
         
        (:subject_name1 , :school_class_id1, :day_id1, :class_id),
        (:subject_name2 , :school_class_id2, :day_id2, :class_id),
        (:subject_name3 , :school_class_id3, :day_id3, :class_id),
        (:subject_name4 , :school_class_id4, :day_id4, :class_id),
        (:subject_name5 , :school_class_id5, :day_id5, :class_id),
        (:subject_name6 , :school_class_id6, :day_id6, :class_id),
        (:subject_name7 , :school_class_id7, :day_id7, :class_id),
        
        (:subject_name1b , :school_class_id1, :day_id1b, :class_id),
        (:subject_name2b , :school_class_id2, :day_id2b, :class_id),
        (:subject_name3b , :school_class_id3, :day_id3b, :class_id),
        (:subject_name4b , :school_class_id4, :day_id4b, :class_id),
        (:subject_name5b , :school_class_id5, :day_id5b, :class_id),
        (:subject_name6b , :school_class_id6, :day_id6b, :class_id),
        (:subject_name7b , :school_class_id7, :day_id7b, :class_id),
        
        
        (:subject_name1c , :school_class_id1, :day_id1c, :class_id),
        (:subject_name2c , :school_class_id2, :day_id2c, :class_id),
        (:subject_name3c , :school_class_id3, :day_id3c, :class_id),
        (:subject_name4c , :school_class_id4, :day_id4c, :class_id),
        (:subject_name5c , :school_class_id5, :day_id5c, :class_id),
        (:subject_name6c , :school_class_id6, :day_id6c, :class_id),
        (:subject_name7c , :school_class_id7, :day_id7c, :class_id),
        
        (:subject_name1d , :school_class_id1, :day_id1d, :class_id),
        (:subject_name2d , :school_class_id2, :day_id2d, :class_id),
        (:subject_name3d , :school_class_id3, :day_id3d, :class_id),
        (:subject_name4d , :school_class_id4, :day_id4d, :class_id),
        (:subject_name5d , :school_class_id5, :day_id5d, :class_id),
        (:subject_name6d , :school_class_id6, :day_id6d, :class_id),
        (:subject_name7d , :school_class_id7, :day_id7d, :class_id),

        (:subject_name2e , :school_class_id2, :day_id2e, :class_id),
        (:subject_name1e , :school_class_id1, :day_id1e, :class_id),
        (:subject_name3e , :school_class_id3, :day_id3e, :class_id),
        (:subject_name4e , :school_class_id4, :day_id4e, :class_id),
        (:subject_name5e , :school_class_id5, :day_id5e, :class_id),
        (:subject_name6e , :school_class_id6, :day_id6e, :class_id),
        (:subject_name7e , :school_class_id7, :day_id7e, :class_id)
        
        '
        );

        //monday

        $this->db->bind(':subject_name1', $data['a1']);
        $this->db->bind(':school_class_id1', $data['class_num1']);
        $this->db->bind(':day_id1', $data['day1']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name2', $data['a2']);
        $this->db->bind(':school_class_id2', $data['class_num2']);
        $this->db->bind(':day_id2', $data['day1']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name3', $data['a3']);
        $this->db->bind(':school_class_id3', $data['class_num3']);
        $this->db->bind(':day_id3', $data['day1']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name4', $data['a4']);
        $this->db->bind(':school_class_id4', $data['class_num4']);
        $this->db->bind(':day_id4', $data['day1']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name5', $data['a5']);
        $this->db->bind(':school_class_id5', $data['class_num5']);
        $this->db->bind(':day_id5', $data['day1']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name6', $data['a6']);
        $this->db->bind(':school_class_id6', $data['class_num6']);
        $this->db->bind(':day_id6', $data['day1']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name7', $data['a7']);
        $this->db->bind(':school_class_id7', $data['class_num7']);
        $this->db->bind(':day_id7', $data['day1']);
        $this->db->bind(':class_id', $data['class_id']);

        //tuesday

        $this->db->bind(':subject_name1b', $data['b1']);
        $this->db->bind(':school_class_id1', $data['class_num1']);
        $this->db->bind(':day_id1b', $data['day2']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name2b', $data['b2']);
        $this->db->bind(':school_class_id2', $data['class_num2']);
        $this->db->bind(':day_id2b', $data['day2']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name3b', $data['b3']);
        $this->db->bind(':school_class_id3', $data['class_num3']);
        $this->db->bind(':day_id3b', $data['day2']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name4b', $data['b4']);
        $this->db->bind(':school_class_id4', $data['class_num4']);
        $this->db->bind(':day_id4b', $data['day2']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name5b', $data['b5']);
        $this->db->bind(':school_class_id5', $data['class_num5']);
        $this->db->bind(':day_id5b', $data['day2']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name6b', $data['b6']);
        $this->db->bind(':school_class_id6', $data['class_num6']);
        $this->db->bind(':day_id6b', $data['day2']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name7b', $data['b7']);
        $this->db->bind(':school_class_id7', $data['class_num7']);
        $this->db->bind(':day_id7b', $data['day2']);
        $this->db->bind(':class_id', $data['class_id']);

        // wednesday

        $this->db->bind(':subject_name1c', $data['c1']);
        $this->db->bind(':school_class_id1', $data['class_num1']);
        $this->db->bind(':day_id1c', $data['day3']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name2c', $data['c2']);
        $this->db->bind(':school_class_id2', $data['class_num2']);
        $this->db->bind(':day_id2c', $data['day3']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name3c', $data['c3']);
        $this->db->bind(':school_class_id3', $data['class_num3']);
        $this->db->bind(':day_id3c', $data['day3']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name4c', $data['c4']);
        $this->db->bind(':school_class_id4', $data['class_num4']);
        $this->db->bind(':day_id4c', $data['day3']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name5c', $data['c5']);
        $this->db->bind(':school_class_id5', $data['class_num5']);
        $this->db->bind(':day_id5c', $data['day3']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name6c', $data['c6']);
        $this->db->bind(':school_class_id6', $data['class_num6']);
        $this->db->bind(':day_id6c', $data['day3']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name7c', $data['c7']);
        $this->db->bind(':school_class_id7', $data['class_num7']);
        $this->db->bind(':day_id7c', $data['day3']);
        $this->db->bind(':class_id', $data['class_id']);

        // tuesday

        $this->db->bind(':subject_name1d', $data['d1']);
        $this->db->bind(':school_class_id1', $data['class_num1']);
        $this->db->bind(':day_id1d', $data['day4']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name2d', $data['d2']);
        $this->db->bind(':school_class_id2', $data['class_num2']);
        $this->db->bind(':day_id2d', $data['day4']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name3d', $data['d3']);
        $this->db->bind(':school_class_id3', $data['class_num3']);
        $this->db->bind(':day_id3d', $data['day4']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name4d', $data['d4']);
        $this->db->bind(':school_class_id4', $data['class_num4']);
        $this->db->bind(':day_id4d', $data['day4']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name5d', $data['d5']);
        $this->db->bind(':school_class_id5', $data['class_num5']);
        $this->db->bind(':day_id5d', $data['day4']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name6d', $data['d6']);
        $this->db->bind(':school_class_id6', $data['class_num6']);
        $this->db->bind(':day_id6d', $data['day4']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name7d', $data['d7']);
        $this->db->bind(':school_class_id7', $data['class_num7']);
        $this->db->bind(':day_id7d', $data['day4']);
        $this->db->bind(':class_id', $data['class_id']);

        //friday

        $this->db->bind(':subject_name1e', $data['e1']);
        $this->db->bind(':school_class_id1', $data['class_num1']);
        $this->db->bind(':day_id1e', $data['day5']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name2e', $data['e2']);
        $this->db->bind(':school_class_id2', $data['class_num2']);
        $this->db->bind(':day_id2e', $data['day5']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name3e', $data['e3']);
        $this->db->bind(':school_class_id3', $data['class_num3']);
        $this->db->bind(':day_id3e', $data['day5']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name4e', $data['e4']);
        $this->db->bind(':school_class_id4', $data['class_num4']);
        $this->db->bind(':day_id4e', $data['day5']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name5e', $data['e5']);
        $this->db->bind(':school_class_id5', $data['class_num5']);
        $this->db->bind(':day_id5e', $data['day5']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name6e', $data['e6']);
        $this->db->bind(':school_class_id6', $data['class_num6']);
        $this->db->bind(':day_id6e', $data['day5']);
        $this->db->bind(':class_id', $data['class_id']);

        $this->db->bind(':subject_name7e', $data['e7']);
        $this->db->bind(':school_class_id7', $data['class_num7']);
        $this->db->bind(':day_id7e', $data['day5']);
        $this->db->bind(':class_id', $data['class_id']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showAllFromSchedule()
    {

        $this->db->query('SELECT id_schedules, subject_name, order_id, day_id, class_id
                          FROM schedules');

        $schedules = $this->db->resultSet();

        return $schedules;
    }

    public function getScheduleById($id)

    //removed *
    {
        $this->db->query('SELECT schedules.id_schedules, schedules.subject_name 
                         FROM schedules
                         WHERE id_schedules = :id_schedule');

        $this->db->bind(':id_schedule', $id);

        $row = $this->db->single();

        return $row;
    }

    // Get schedule by techer class

    public function show_schedule_by_teacher_class_id($id)
    {

        $this->db->query('SELECT schedules.id_schedules, schedules.subject_name , schedules.order_id, schedules.day_id, schedules.class_id
                          FROM schedules
                          WHERE schedules.class_id = :teacher_class_id');

        $this->db->bind(':teacher_class_id', $id);

        $schedules = $this->db->resultSet();

        return $schedules;
    }

    public function update($data)
    {


        $this->db->query('UPDATE schedules 
                          SET subject_name = :name
                          WHERE id_schedules = :id');

        $this->db->bind(':id', $data['id_schedules']);

        $this->db->bind(':name', $data['name']);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getScheduleByClassId($id)
    {

        // removed *

        $this->db->query('SELECT schedules.id_schedules, schedules.subject_name , schedules.order_id
                          FROM schedules 
                          WHERE class_id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->resultSet();

        return $row;
    }



    public function getClassNameByClassId($id)
    {

        $this->db->query('SELECT name 
                          FROM school_classes 
                          WHERE id_school_class = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->resultSet();

        return $row;
    }

    public function getClassWithSchedule()
    {

        $this->db->query('SELECT DISTINCT name
                          FROM school_classes
                          JOIN schedules 
                          ON school_classes.id_school_class = 
        
        schedules.class_id ');

        $row = $this->db->resultSet(PDO::FETCH_ASSOC);

        return $row;
    }

    public function deleteSchedule($id)
    {
        $this->db->query('DELETE FROM schedules
                          WHERE class_id = :class_id');

        $this->db->bind(':class_id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
