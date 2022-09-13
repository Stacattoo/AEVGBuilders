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

    function checkIfEmailExist($email)
    {
        $sql = "SELECT id FROM client WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function checkIfUsernameExist($username)
    {
        $sql = "SELECT id FROM client WHERE username='$username'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function checkIfAccountExist($key)
    {
        if ($this->checkIfEmailExist($key) || $this->checkIfUsernameExist($key)) {
            return true;
        } else {
            return false;
        }
    }

    function getAttempt($key)
    {
        $query = "SELECT login_attempt FROM client WHERE email = '$key' OR username = '$key'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            return $row['login_attempt'];
        } else {
            return 0;
        }
    }

    function updatePassword($email, $newPass)
    {
        $query = "UPDATE `userdata` SET `password`='$newPass' WHERE `email`='$email'";
        return mysqli_query($this->conn, $query);
    }

    function updateStatusToBlock($key)
    {
        $query = "UPDATE client SET status='block' WHERE email='$key' OR username='$key'";
        return mysqli_query($this->conn, $query);
    }

    function updateAttempt($key, $attempt)
    {
        $query = "UPDATE client SET login_attempt=$attempt WHERE email='$key' OR username='$key'";
        return mysqli_query($this->conn, $query);
    }


    function checkAccount($key, $password)
    {
        $query = "SELECT * FROM client WHERE (email = '$key' OR username = '$key')  AND  password ='$password'";
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
            $total_count = $this->getAttempt($key) - 1;
            $this->updateAttempt($key, $total_count);
            // echo "Email and Password not match. Remaining attempts: " . $total_count;
            return false;
        }
    }

    function registerAccount($info)
    {
        $query = "INSERT INTO client(firstName, middleName, lastName, username, password, email, contact_no, house_no, street, baranggay, municipality, province) 
        VALUES ('$info->firstName' ,'$info->middleName', '$info->lastName', '$info->username',
        '$info->password', '$info->email', '$info->contact', '$info->houseNo', '$info->street', '$info->baranggay', '$info->municipality', '$info->province')";
        //$this->addActivities($info->firstName + ' ' + $info->lastName, "Account", "Creat an account with student number $info->username");
        return mysqli_query($this->conn, $query);
    }

    function getFullname($id)
    {
        $sql = "SELECT CONCAT(firstName, ' ', lastName) AS fullName FROM client WHERE id='$id'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            return $row['fullName'];
        } else {
            return '';
        }
    }

    function __destroy()
    {
        $this->conn->close();
    }
}
