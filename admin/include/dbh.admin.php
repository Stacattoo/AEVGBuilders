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

    function isEmailExist($email)
    {
        $sql = "SELECT id FROM admin WHERE email='$email' OR username='$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function checkAccount($key, $password){
        $query = "SELECT * FROM admin WHERE (email = '$key' OR username = '$key')  AND  password ='$password'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)){
            if ($row = mysqli_fetch_assoc($result)){
                return $row["id"];
            }
        }
    }

    function checkIfEmailExist($email)
    {
        $sql = "SELECT id FROM admin WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function updatePassword($email, $newPass)
    {
        $query = "UPDATE `admin` SET `password`='$newPass' WHERE `email`='$email'";
        return mysqli_query($this->conn, $query);
    }

    function getAllInfoByID($id){
        $query = "SELECT *, CONCAT(lastname, ', ', firstname) AS fullname, 
        CONCAT(houseNo, ' ', street, ' ', baranggay, ' ', municipality, ' ', province) AS address
        FROM employee WHERE id=$id";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)){
            if ($row = mysqli_fetch_assoc($result)){
                return (object)[
                    'id' => $row['id'],
                    'firstName' => $row['firstName'],
                    'lastName' => $row['lastName'],
                    'username' => $row['username'],
                    'contactNo' => $row['contactNo'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                    'houseNo' => $row['houseNo'],
                    'street' => $row['street'],
                    'baranggay' => $row['baranggay'],
                    'municipality' => $row['municipality'],
                    'province' => $row['province'],
                    'attempt' => $row['attempt'],
                    'status' => $row['status'],
                ];
            }
        }
    }

    function getAllUserData(){
        $sql = "SELECT *, CONCAT(lastName,', ', firstName) AS fullName,
        CONCAT(houseNo, ' ', street, ' ', baranggay, ' ', municipality, ' ', province)
        FROM employee WHERE status='active'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $user = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $user[] = (object) [
                    "id" => $row['id'],
                    "username" => $row['username'],
                    "fullName" => $row['fullName'],
                    "email" => $row['email'],
                    "contact" => $row['contact'],
                    "address" => $row['address'],
                    
                ];
            }
            return $user;
        }
    }

    function isUserAccountExist($id, $username, $email){
        $sql = "SELECT id FROM employee WHERE (username='$username' OR email='$email') AND id!='$id'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function updateUserInfo($value, $id){
        $sql = "UPDATE `employee` SET username='$value->username', firstName='$value->firstName', middleName='$value->middleName',
             lastName='$value->lastName', email='$value->email', contact='$value->contact' WHERE id=$id";
        $this->addActivities("Update User Info", "Admin update $value->firstName $value->lastName info with username $value->username");
        return mysqli_query($this->conn, $sql);
    }

    function addActivities($activity, $details) {
        $query = "INSERT INTO activities(user, activity, details) 
            VALUES ('admin', '$activity', '$details')";
        return mysqli_query($this->conn, $query);
    }

    function updateSpecificInfo($id, $col, $value, $table = 'employee'){
        $sql = "UPDATE `$table` SET $col='$value' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }
}
