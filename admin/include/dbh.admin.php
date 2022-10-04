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

    function checkAccount($key, $password)
    {
        $query = "SELECT * FROM admin WHERE (email = '$key' OR username = '$key')  AND  password ='$password'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
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

    function getAllInfoByID($id)
    {
        $query = "SELECT *, CONCAT(lastname, ', ', firstname) AS fullname, 
            CONCAT(houseNo, ' ', street, ' ', barangay, ' ', municipality, ', ', province) AS address
            FROM employee WHERE id=$id";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $sql = "SELECT client.id, CONCAT(client.lastName, ', ' , client.firstName) as fullname, client.email, client.contact_no, employee_client.status FROM employee_client INNER JOIN client ON employee_client.client_id=client.id WHERE employee_client.employee_id=$id";
                $res = mysqli_query($this->conn, $sql);
                $client = array();
                if (mysqli_num_rows($res)) {
                    while ($row_client = mysqli_fetch_assoc($res)) {
                        $client[] = (object)[
                            'id' => $row_client["id"],
                            'name' => $row_client["fullname"],
                            'email' => $row_client["email"],
                            'contact_no' => $row_client["contact_no"],
                            'status' => $row_client["status"],
                        ];
                    }
                }
                return (object)[
                    'id' => $id,
                    'firstName' => $row['firstName'],
                    'lastName' => $row['lastName'],
                    'middleName' => $row['middleName'],
                    'fullName' => $row['fullname'],
                    'username' => $row['username'],
                    'contactNo' => $row['contactNo'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                    'address' => $row['address'],
                    'houseNo' => $row['houseNo'],
                    'street' => $row['street'],
                    'barangay' => $row['barangay'],
                    'municipality' => $row['municipality'],
                    'province' => $row['province'],
                    'attempt' => $row['attempt'],
                    'status' => $row['status'],
                    'clients' => $client
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
        CONCAT(houseNo, ' ', street, ' ', barangay, ' ', municipality, ' ', province)
        FROM employee WHERE status='active' ORDER BY id DESC";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $user = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $user[] = (object) [
                    "id" => $row['id'],
                    "username" => $row['username'],
                    "fullName" => $row['fullName'],
                    "email" => $row['email'],
                    "contact" => $row['contactNo'],
                    "houseNo" => $row['houseNo'],
                    "street" => $row['street'],
                    "barangay" => $row['barangay'],
                    "municipality" => $row['municipality'],
                    "province" => $row['province'],
                    "profile_picture" => $row['profile_picture'],

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

    function isUserAccountExist($id, $username, $email)
    {
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
        return mysqli_query($this->conn, $sql);
    }

    function updateUserClientInfo($value, $id){
        $sql = "UPDATE `client` SET username='$value->username', firstName='$value->firstName', middleName='$value->middleName',
             lastName='$value->lastName', email='$value->email', contact='$value->contact' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }

    function editEmployee($value)
    {
        $sql = "UPDATE `employee` SET `firstName`='$value->firstName',`middleName`='$value->middleName',`lastName`='$value->lastName',`contactNo`='$value->contactNo',`email`='$value->email',`houseNo`='$value->houseNo',`street`='$value->street',`barangay`='$value->barangay',`municipality`='$value->municipality',`province`='$value->province' WHERE id=$value->id";
        
        if (mysqli_query($this->conn, $sql)) {
            return (object) ['status' => true, 'msg' => ''];
        } else {
            return (object) ['status' => false, 'sql' => $sql, 'msg' => "Error description: " . mysqli_error($this->conn)];
        }
    }

    function addNewEmployee($details)
    {
        $query = "INSERT INTO `employee`(`firstName`, `middleName`, `lastName`, `username`, `contactNo`, `email`, `password`, `houseNo`, `street`, `barangay`, `municipality`, `province`) VALUES ('$details->firstName','$details->middleName','$details->lastName','$details->username','$details->contactNo','$details->email','$details->password','$details->houseNo','$details->street','$details->barangay','$details->municipality','$details->province')";
        if (mysqli_query($this->conn, $query)) {
            return (object) ['status' => true, 'msg' => ''];
        } else {
            return (object) ['status' => false, 'sql' => $query, 'msg' => "Error description: " . mysqli_error($this->conn)];
        }
    }

    

    function updateSpecificInfo($id, $col, $value, $table = 'employee')
    {
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

    function getAllBlocked()
    {
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

    function updateStatustoUnblock($id)
    {
        $query = "UPDATE employee SET status='active', attempt='3' where id='$id'";
        return mysqli_query($this->conn, $query);
    }

    function updateStatustoBlock($key)
    {
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
