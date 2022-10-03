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


    function getAllClientInfoByID($id){
        $query = "SELECT *, CONCAT(lastname, ', ', firstname) AS fullname, 
        CONCAT(house_no, ' ', street, ' ', barangay, ' ', municipality, ' ', province) AS address
        FROM client WHERE id=$id";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)){
            if ($row = mysqli_fetch_assoc($result)){
                return (object)[
                    'id' => $row['id'],
                    'fullname' => $row['fullname'],
                    'contactNo' => $row['contact_no'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                    'address' => $row['address']
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
    function getAllUserClientData(){
        $sql = "SELECT *, CONCAT(lastName,', ', firstName) AS fullName,
        CONCAT(house_no, ' ', street, ' ', barangay, ' ', municipality, ' ', province) AS address
        FROM client";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $user = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $user[] = (object) [
                    "id" => $row['id'],
                    "fullName" => $row['fullName'],
                    "email" => $row['email'],
                    "contact" => $row['contact_no'],
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

    function isClientUserAccountExist($id, $username, $email){
        $sql = "SELECT id FROM client WHERE (username='$username' OR email='$email') AND id!='$id'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function updateUserInfo($value, $id){
        $sql = "UPDATE `employee` SET username='$value->username', firstName='$value->firstName', middleName='$value->middleName',
             lastName='$value->lastName', email='$value->email', contact='$value->contact' WHERE id=$id";
        $this->addActivities("Update User Info", "Admin update $value->firstName $value->lastName info with username $value->username");
        return mysqli_query($this->conn, $sql);
    }

    function updateUserClientInfo($value, $id){
        $sql = "UPDATE `client` SET username='$value->username', firstName='$value->firstName', middleName='$value->middleName',
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

    function updateSpecificClientInfo($id, $col, $value, $table = 'client'){
        $sql = "UPDATE `$table` SET $col='$value' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }

    function getAllAdminInfo($id){
        $sql = "SELECT * FROM admin WHERE id='$id'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                return (object) [
                    'username' => $row['username'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                ];
            }
        }
    }

    function getAllBlocked(){
        $query = "SELECT *, CONCAT(lastName,', ', firstName, ' ', middleName) AS fullName FROM employee WHERE status = 'block' ";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $blocked = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $blocked[] = (object) [
                    "id" => $row['id'],
                    "employee_id" => $row['employee_id'],
                    "fullName" => $row['fullName'],
                    "email" => $row['email'],
                    
                ];
            }
            return $blocked;
        }
    }

    function updateStatustoUnblock($id){
        $query = "UPDATE employee SET status='active', attempt='3' where id='$id'";
        return mysqli_query($this->conn, $query);
    }

    function updateStatustoBlock($key){
        $query = "UPDATE employee SET status='block' WHERE email='$key' OR username='$key'";
        return mysqli_query($this->conn, $query);
    }

    function displayAllResult(){
        $sql = "SELECT schedule.*, CONCAT( employee.firstName,' ', employee.lastName) AS employeeName, CONCAT( client.firstName,' ', client.lastName) AS clientName   FROM `schedule`
        INNER JOIN  employee ON schedule.employee_id = employee.id INNER JOIN  client ON schedule.user_id = client.id";
        $result = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($result)){
         $res = array();
         while ($row = mysqli_fetch_assoc($result)) {
             $dateStart = strtotime($row['dateStart']);
             $dateEnd = strtotime($row['dateEnd']);
             $res[] = (object)[
                 'id' => $row['id'],
                 'dateStart' => date("M d, Y h:i A", $dateStart),
                 'dateEnd' => date("M d, Y h:i A", $dateEnd),
                 'status' => $row['status'],
                 'employeeName' => $row['employeeName'],
                 'clientName' => $row['clientName']
             ];
         }
         return $res;
     } 
    }
}
