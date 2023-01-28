<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Insert User
    public function insert($data)
    {
        $this->db->query('INSERT INTO users(username, password, email, id_user_role, teacher_class_id) 
                          VALUES (:name, :password, :email, :id_user_role, :teacher_class_id)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':id_user_role', $data['user_role']);
        $this->db->bind(':teacher_class_id', $data['teacher_class_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login User
    public function login($email, $password)
    {
        $this->db->query('SELECT u.id_user,
                            u.username,
                            u.password,
                            u.email,
                            u.id_user_role,
                            u.teacher_class_id
                            FROM users AS u 
                            WHERE email = :email OR username = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();


        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT u.id_user,
                              u.username,
                              u.password,
                              u.email,
                              u.id_user_role
                              FROM users AS u
                              WHERE email = :email OR username = :email');
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

    // Get User by ID
    public function getUserById($id)
    {
        $this->db->query('SELECT u.id_user,
                              u.username,
                              u.password,
                              u.email,
                              u.id_user_role
                              FROM users AS u
                              WHERE id_user = :id');
        // Bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Edit(update) user
    public function updateUser($data)
    {
        var_dump($data);
        $this->db->query(
            'UPDATE users 
                              SET   username = :username, 
                                    email = :email, 
                                    id_user_role = :id_user_role
                              WHERE id_user = :id'
        );

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':id_user_role', $data['id_user_role']);
        $this->db->bind(':id', $data['id_user']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete user
    public function deleteUser($id)
    {
        $this->db->query('DELETE FROM users 
                          WHERE id_user = :id_user');

        $this->db->bind(':id_user', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Retrieve all user roles from database
    public function GetAllUserRoles()
    {
        $this->db->query('SELECT ur.id_user_role,
                              ur.name,
                              ur.description 
                              FROM user_roles AS ur');

        $allUserRoles = $this->db->resultSet();

        return $allUserRoles;
    }

    // Retrieve all users from database and their user roles
    public function GetUsersByRoles($id_user_role)
    {
        $this->db->query('  SELECT u.id_user,
                                u.username,
                                u.email,
                                ur.id_user_role,
                                ur.name
                                FROM users AS u 
                                JOIN user_roles AS ur ON u.id_user_role = ur.id_user_role
                                WHERE ur.id_user_role = :id_user_role
                                ORDER BY ur.name;
                            ');
        $this->db->bind(':id_user_role', $id_user_role);

        $allUsers = $this->db->resultSet();

        return $allUsers;
    }

    // get number of classes for teacher by day

    public function get_number_of_classes()
    {

        $integerOfDay = idate('w', time());

        $this->db->query("SELECT count(*) 
                          as number_of_classes 
                          FROM schedules
                          WHERE schedules.day_id = $integerOfDay
                          AND schedules.subject_name != ''
                          AND schedules.class_id = :id_class");

        $id_class = (int) htmlspecialchars($_SESSION['teacher_class_id']);

        $this->db->bind(':id_class', $id_class);

        $number_of_classes = $this->db->single(PDO::FETCH_ASSOC);

        return $number_of_classes;
    }

    public function LoginTimeInsert()
    {
        $this->db->query("insert into user_log(ip_user, id_user) values (:ip_adress, :id_user) ");

        $id_user = (int) $_SESSION['id_user'];



        $this->db->bind(':ip_adress', $_SERVER['REMOTE_ADDR']);
        $this->db->bind(':id_user', $id_user);

        if ($this->db->execute()) {
            $id = $this->db->lastInsertId();
            $_SESSION['last_id'] = $id;
            return true;
        } else {
            return false;
        }
    }

    public function LogoutTimeUpdate()
    {

        $this->db->query("UPDATE user_log 
                          SET user_log.logout_time = NOW() 
                          WHERE id_log = :id_log");

        $id_log = (int) $_SESSION['last_id'];

        $this->db->bind(':id_log', $id_log);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function show_logs()
    {
        $this->db->query("  SELECT users.id_user,
                                users.email,
                                users.username,
                                user_log.login_time, 
                                user_log.logout_time
                            FROM user_log
                                JOIN users ON user_log.id_user = users.id_user
                            ORDER BY user_log.id_log DESC");

        $user_id = (int) $_SESSION['id_user'];

        $this->db->bind('user_id', $user_id);

        $logs = $this->db->resultSet();

        return $logs;
    }

    // insert in table professor_info

    public function insertProfessorInfo($subjects, $data)
    {

        $this->db->query('INSERT INTO professor_info (id_professor, id_class, id_subject) 
        
                           VALUES 
                           
                           (:id_professor , :id_class, :id_subject)');


        $this->db->bind('id_professor', $data['id_professor']);
        $this->db->bind('id_class', $data['id_class']);
        $this->db->bind('id_subject', $subjects);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // inserts in table class_masters

    public function insertInTableClass_masters($data)
    {


        $this->db->query('INSERT INTO class_masters (id_professor , id_class)
                         VALUES ((SELECT users.id_user FROM users WHERE users.id_user_role = 5 ORDER BY users.id_user DESC LIMIT 1) , :id_class)');

        $this->db->bind('id_class', $data['professor_class_id']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // find all professors

    public function find_all_professors()
    {

        $this->db->query('SELECT users.id_user, users.username,
                          users.email 
                          FROM users 
                          WHERE users.id_user_role = 5');

        $professors = $this->db->resultSet();

        return $professors;
    }
}
