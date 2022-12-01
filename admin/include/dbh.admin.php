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

    function updateProject($value)
    {
        $query = "UPDATE `projects` SET title='$value->title', category='$value->category', 
        image='$value->image',  description='$value->description' WHERE id='$value->id'";
        return mysqli_query($this->conn, $query);
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


    function getAllClientInfoByID($id)
    {
        $query = "SELECT *, CONCAT(lastname, ', ', firstname) AS fullname, 
        CONCAT(house_no, ' ', street, ' ', barangay, ' ', municipality, ' ', province) AS address
        FROM client WHERE id=$id";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                $empName = "";
                $sql = "SELECT CONCAT(employee.lastName, ', ' , employee.firstName) as fullname FROM employee_client INNER JOIN employee ON employee.id = employee_client.employee_id WHERE employee_client.client_id = $id";
                $res = mysqli_query($this->conn, $sql);
                if (mysqli_num_rows($result)) {
                    if ($row2 = mysqli_fetch_assoc($res)) {
                        $empName = $row2['fullname'];
                    }
                }
                return (object)[
                    'id' => $row['id'],
                    'fullname' => $row['fullname'],
                    'contactNo' => $row['contact_no'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                    'address' => $row['address'],
                    'employeeName' => $empName,
                ];
            }
        }
    }

    function getAllUserData()
    {
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
    function getAllUserClientData()
    {
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

    function isClientUserAccountExist($id, $username, $email)
    {
        $sql = "SELECT id FROM client WHERE (username='$username' OR email='$email') AND id!='$id'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function updateUserInfo($value, $id)
    {
        $sql = "UPDATE `employee` SET username='$value->username', firstName='$value->firstName', middleName='$value->middleName',
             lastName='$value->lastName', email='$value->email', contact='$value->contact' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }

    function updateUserClientInfo($value, $id)
    {
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

    function updateSpecificClientInfo($id, $col, $value, $table = 'client')
    {
        $sql = "UPDATE `$table` SET $col='$value' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }

    function getAllAdminInfo($id)
    {
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
    function deleteProject($id)
    {
        $sql = "DELETE FROM `projects` WHERE `id`=$id";
        return mysqli_query($this->conn, $sql);
    }

    function getTop5Reaction()
    {
        $query = "SELECT COUNT(project_id) AS ctr, projects.*, employee.firstName, employee.lastName, employee.profile_picture FROM `project_reaction` INNER JOIN projects ON project_reaction.project_id=projects.id INNER JOIN employee ON employee.id=projects.employee_id GROUP BY project_id ORDER BY ctr DESC LIMIT 5
        ";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = (object) [
                    "id" => $row['id'],
                    "ctr" => $row['ctr'],
                    "fullName" => $row['firstName'] . " " . $row['lastName'],
                    "profile_picture" => $row['profile_picture'],
                    "title" => $row['title'],
                    "image" => explode(",", $row["image"]),
                    "category" => $row['category'],
                    "description" => $row['description'],
                    "status" => $row['status'],
                ];
            }
            return $data;
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

    function displayAllResult()
    {
        $sql = "SELECT schedule.*, CONCAT( employee.firstName,' ', employee.lastName) AS employeeName, CONCAT( client.firstName,' ', client.lastName) AS clientName   FROM `schedule`
        INNER JOIN  employee ON schedule.employee_id = employee.id INNER JOIN  client ON schedule.user_id = client.id";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
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

    function checkIfSomeAlrExist($key, $table, $col)
    {
        $sql = "SELECT id FROM $table WHERE $col='$key'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function uploadProduct($info)
    {
        $query = "INSERT INTO material(code, name, image, category, description, remaining_stock, initial_stock) 
        VALUES ('$info->code' ,'$info->name', '$info->image', '$info->category', '$info->description', '$info->stock', '$info->stock')";
        return mysqli_query($this->conn, $query);
    }

    function assignEmployee($employeeID, $clientID)
    {
        $query = "INSERT INTO `employee_client`(`employee_id`, `client_id`, `status`) VALUES ('$employeeID','$clientID','ongoing')";
        return mysqli_query($this->conn, $query);
    }

    function getAllMaterials()
    {
        $sql = "SELECT * FROM material ORDER BY id DESC";
        $result =  mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $materials = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $materials[] = (object)[
                    "id" => $row['id'],
                    "code" => $row['code'],
                    "name" => $row['name'],
                    "category" => $row['category'],
                    "description" => $row['description'],
                    "image" => $row['image'],
                ];
            }
            return $materials;
        }
    }

    function getAllClients()
    {
        $sql = "SELECT * FROM employee_client";
        $result =  mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $clients = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $clients[] = (object)[
                    "id" => $row['id'],
                    "employee_id" => $row['employee_id'],
                    "client_id" => $row['client_id'],
                    "status" => $row['status'],
                    "transaction_date" => $row['transaction_date'],

                ];
            }
            return $clients;
        }
    }

    function getFeedback()
    {
        $sql = "SELECT feedback.*, CONCAT(client.firstName, ' ', client.lastName) as fullname, client.email, client.contact_no FROM feedback INNER JOIN client ON client.id=feedback.client_id WHERE feedback_status = 'pending'";
        $result = mysqli_query($this->conn, $sql);
        $data = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = (object)[
                    "id" => $row['id'],
                    "fullname" => $row['fullname'],
                    "email" => $row['email'],
                    "contact_no" => $row['contact_no'],
                    "feedback" => $row['feedback'],
                    "status" => $row['contact_no'],
                    "date" => $row['date'],
                ];
            }
        }
        return $data;
    }

    function approveFeedback($id){
        $query = "UPDATE feedback SET feedback_status='approved' where id='$id'";
        return mysqli_query($this->conn, $query);
    }

    function countAllProjects()
    {
        $sql = "SELECT * FROM projects";
        $result =  mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $projects = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $projects[] = (object)[
                    "id" => $row['id'],
                    "employee_id" => $row['employee_id'],
                    "title" => $row['title'],
                    "image" => $row['image'],
                    "category" => $row['category'],
                    "description" => $row['description'],
                    "status" => $row['status'],

                ];
            }
            return $projects;
        }
    }
}
