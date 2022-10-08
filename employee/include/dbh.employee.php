<?php
session_start();
class dbHandler
{

    public $conn;

    function __construct()
    {

        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "aevgbuildersdb";
        $this->conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function checkIfEmployeeEmailExist($email)
    {
        $sql = "SELECT id FROM employee WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function checkIfEmployeeUsernameExist($username)
    {
        $sql = "SELECT id FROM employee WHERE username='$username'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function checkIfEmployeeAccExist($key)
    {
        if ($this->checkIfEmployeeEmailExist($key) || $this->checkIfEmployeeUsernameExist($key)) {
            return true;
        } else {
            return false;
        }
    }

    function checkAccount($key, $password, $col)
    {
        $query = "SELECT * FROM $col WHERE (email = '$key' OR username = '$key')  AND  password ='$password'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                if ($row["status"] == "active") {
                    if ($this->updateAttempt($key, 3)) {
                        $_SESSION['id'] = $row["id"];
                        $_SESSION['email'] = $row["email"];
                        return true;
                    }
                }
            }
        } else {
            $total_count = $this->getAttempt($key, 'employee') - 1;
            $this->updateAttempt($key, $total_count);
            // echo "Email and Password not match. Remaining attempts: " . $total_count;
            return false;
        }
    }

    function getAttempt($key, $col)
    {
        $query = "SELECT attempt FROM $col WHERE email = '$key' OR username = '$key'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            return $row['attempt'];
        } else {
            return 0;
        }
    }

    function updateAttempt($key, $attempt)
    {
        $query = "UPDATE employee SET attempt=$attempt WHERE email='$key' OR username='$key'";
        return mysqli_query($this->conn, $query);
    }

    function getFullname($id)
    {
        $sql = "SELECT CONCAT(firstName, ' ', lastName) AS fullName FROM employee WHERE id='$id'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            return $row['fullName'];
        } else {
            return '';
        }
    }

    function updateProject($value, $id)
    {
        $query = "UPDATE `projects` SET title='$value->title', category='$value->category', 
        image='$value->image',  description='$value->description' WHERE id=$id";
        return mysqli_query($this->conn, $query);
    }

    function uploadProject($info)
    {
        $query = "INSERT INTO projects(title, image, category, description) 
        VALUES ('$info->title' ,'$info->image', '$info->category', '$info->description')";
        return mysqli_query($this->conn, $query);
    }



    function checkIfSomeAlrExist($key, $table, $col)
    {
        $sql = "SELECT id FROM $table WHERE $col='$key'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function deleteProject($id)
    {
        $sql = "DELETE FROM `projects` WHERE `id`=$id";
        return mysqli_query($this->conn, $sql);
        
    }


    function getAllProjects()
    {
        $query = "SELECT * FROM projects";
        $result = mysqli_query($this->conn, $query);
        $projects = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $projects[] = (object)[
                    "id" => $row["id"],
                    "title" => $row["title"],
                    "description" => $row["description"],
                    "category" => $row["category"],
                    "image" => explode(",", $row["image"]),
                ];
            }
        }
        return $projects;
    }

    function getValueByID($value, $id)
    {
        $sql = "SELECT `$value` FROM projects WHERE `id`=$id";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                return $row[$value];
            }
        }
    }
}
