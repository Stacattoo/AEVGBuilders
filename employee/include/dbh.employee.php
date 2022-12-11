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
            // echo json_encode(array(
            //     "status" => 'error',
            //     'msg' => "Email and Password not match. Remaining attempts: " . $total_count
            // ));
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

    function updateStatusToBlock($key, $table)
    {
        $query = "UPDATE $table SET status='block' WHERE email='$key'";
        return mysqli_query($this->conn, $query);
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

    function updateProject($value)
    {
        $query = "UPDATE `projects` SET title='$value->title', category='$value->category', 
        image='$value->image',  description='$value->description', project_status='pending' WHERE id='$value->id'";
        return mysqli_query($this->conn, $query);
    }
    function updatePortfolio($value)
    {
        $query = "UPDATE `portfolio` SET title='$value->title', 
        image='$value->image',  description='$value->description' WHERE id='$value->id'";
        return mysqli_query($this->conn, $query);
    }

    function uploadProject($info, $id)
    {
        $query = "INSERT INTO projects(employee_id, title, image, category, description) 
        VALUES ($id, '$info->title' ,'$info->image', '$info->category', '$info->description')";
        return mysqli_query($this->conn, $query);
    }

    function uploadPortfolio($info, $clientId, $id)
    {
        $query = "INSERT INTO portfolio(employee_id, client_id, title, image, description) 
        VALUES ($id, $clientId,'$info->title' ,'$info->image', '$info->description')";
        return mysqli_query($this->conn, $query);
    }

    function profileUpdate($value, $id)
    {
        $sql = "UPDATE `employee` SET firstName='$value->firstName', middleName='$value->middleName', lastName='$value->lastName', username='$value->username', email='$value->email',
         contactNo='$value->contactNo', houseNo='$value->houseNo', street='$value->street', barangay='$value->barangay', municipality='$value->municipality', 
         province='$value->province', profile_picture='$value->image' WHERE id=$id";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    function getSpecificInfo($id, $col)
    {
        $sql = "SELECT $col FROM employee WHERE id='$id'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            return $row[$col];
        } else {
            return 0;
        }
    }
    function updateSpecificInfo($id, $col, $value)
    {
        $sql = "UPDATE `employee` SET $col='$value' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
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
    function deletePortfolio($id)
    {
        $sql = "DELETE FROM `portfolio` WHERE `id`=$id";
        return mysqli_query($this->conn, $sql);
    }


    function getSpecificProjects($id, $status)
    {
        $query = "SELECT * FROM projects WHERE employee_id = $id AND project_status='$status'";
        $result = mysqli_query($this->conn, $query);
        $projects = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $projects[] = (object)[
                    "id" => $row["id"],
                    "title" => $row["title"],
                    "description" => $row["description"],
                    "category" => $row["category"],
                    "status" => $row["project_status"],
                    "image" => explode(",", $row["image"]),
                ];
            }
        }
        return $projects;
    }
    function getAllProjects($id)
    {
        $query = "SELECT * FROM projects WHERE employee_id = $id AND( project_status='active' OR (project_status = 'pending'))";
        $result = mysqli_query($this->conn, $query);
        $projects = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $projects[] = (object)[
                    "id" => $row["id"],
                    "title" => $row["title"],
                    "description" => $row["description"],
                    "category" => $row["category"],
                    // "status" => $row["project_status"],
                    "image" => explode(",", $row["image"]),
                ];
            }
        }
        return $projects;
    }

    function getAllPortfolio($client, $empID)
    {
        $query = "SELECT * FROM portfolio WHERE client_id='$client' AND employee_id ='$empID'";
        $result = mysqli_query($this->conn, $query);
        $projects = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $projects[] = (object)[
                    "id" => $row["id"],
                    "client_id" => $row["client_id"],
                    "employee_id" => $row["employee_id"],
                    "title" => $row["title"],
                    "description" => $row["description"],
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

    function getValueByProfileID($value, $id, $table = "employee")
    {
        $sql = "SELECT `$value` FROM $table WHERE id=$id";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                return $row[$value];
                // return $sql;
            }
        }
    }

    //client getting info mysql

    function getClientData($id)
    {
        $sql = "SELECT *, CONCAT(lastName,', ', firstName) AS fullName,
        CONCAT(house_no, ' ', street, ' ', barangay, ' ', municipality, ' ', province) AS address
        FROM client INNER JOIN employee_client ON client.id=employee_client.client_id WHERE employee_client.employee_id = $id";
        $user = array();
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user[] = (object) [
                    "id" => $row['client_id'],
                    "fullName" => $row['fullName'],
                    "email" => $row['email'],
                    "contact" => $row['contact_no'],
                    "address" => $row['address'],
                    "status" => "active"
                ];
            }
        }

        $sql2 = "SELECT *, CONCAT(lastName,', ', firstName) AS fullName,
        CONCAT(house_no, ' ', street, ' ', barangay, ' ', municipality, ' ', province) AS address, client.id AS client_id FROM client  INNER JOIN appointment ON client.id=appointment.client_id WHERE appointment.status='pending'";
        $result2 = mysqli_query($this->conn, $sql2);
        if (mysqli_num_rows($result2)) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $user[] = (object) [
                    "id" => $row2['client_id'],
                    "fullName" => $row2['fullName'],
                    "email" => $row2['email'],
                    "contact" => $row2['contact_no'],
                    "address" => $row2['address'],
                    "status" => 'pending'
                ];
            }
        }
        return $user;
    }

    function getAllUserClientData()
    {
        $sql = "SELECT *, CONCAT(lastName,', ', firstName) AS fullName,
        CONCAT(house_no, ' ', street, ' ', barangay, ' ', municipality, ' ', province) AS address
        FROM client WHERE NOT EXISTS (SELECT * FROM  employee_client WHERE employee_client.client_id = client.id)";
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

    function getAllClientInfoByID($id)
    {
        $query = "SELECT *, CONCAT(lastname, ', ', firstname) AS fullname, 
        CONCAT(house_no, ' ', street, ' ', barangay, ' ', municipality, ' ', province) AS address
        FROM client WHERE id=$id";
        $result = mysqli_query($this->conn, $query);
        // $info = array();
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {


                $empName = "";
                $status = "";
                $sql = "SELECT CONCAT(employee.lastName, ', ' , employee.firstName) as fullname, employee_client.status as empclistatus  FROM employee_client 
                INNER JOIN employee ON employee.id = employee_client.employee_id WHERE employee_client.client_id = $id";
                $res = mysqli_query($this->conn, $sql);
                if (mysqli_num_rows($res)) {
                    if ($row2 = mysqli_fetch_assoc($res)) {
                        $empName = $row2['fullname'];
                        $status = $row2['empclistatus'];
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
                    'status' => $status
                ];
            }
        }
    }

    function PgetAllClientInfoByID($id)
    {
        $query = "SELECT *, CONCAT(lastname, ', ', firstname) AS fullname, 
        CONCAT(house_no, ' ', street, ' ', barangay, ' ', municipality, ' ', province) AS address
        FROM client WHERE id='$id'";
        $result = mysqli_query($this->conn, $query);
        // $info = array();
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
                    'status' => $row['status'],
                    'employeeName' => $empName
                ];
            }
        }
    }

    function getStatus($clientId)
    {
        $sql = "SELECT * from employee_client WHERE client_id = $clientId"; // employee_id = $empId AND 
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                return (object)[
                    "status" => $row['status']
                ];
            }
        }
    }

    function updateClientStatus($id, $status)
    {
        $query = "UPDATE employee_client SET status='$status' where client_id='$id'";
        $result = mysqli_query($this->conn, $query);
        if($result){
            
            $this->insertActivity($id, "Change Transaction Status into: $status");
            
        }

        return $result;
    }

    function activities($id)
    {
        $sql = "SELECT client.*, activity_log.* from client INNER JOIN activity_log 
        ON client.id = activity_log.client_id WHERE client.id = $id ORDER BY date_time DESC";
        $result = mysqli_query($this->conn, $sql);
        $data = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = (object)[
                    "date_time" => $row['date_time'],
                    "status" => $row['status_message']

                ];
            }
        }
        return $data;
    }

    function getClientScheduleDetails($id)
    {

        $sql = "SELECT *, appointment.id AS appID, appointment.image AS imageApp, appointment.status AS statusCheck FROM appointment INNER JOIN client ON appointment.client_id = client.id WHERE client_id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        $sched = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $businessType = explode(", ", $row['businessType']);
                $imgExplode = explode(",", $row['imageApp']);
                $fullName = $row['firstName'] . " " . $row['lastName'];
                $sched[] = (object)[
                    "id" => $row['appID'],
                    "client_id" => $row["client_id"],
                    'fullName' => $fullName,
                    'contactNo' => $row['contact_no'],
                    'email' => $row['email'],
                    'projLocation' => $row['projectLocation'],
                    'projImage' => $row['projectImage'],
                    'targetDate' => $row['targetConsDate'],
                    'projectType' => $row['projectType'],
                    'lotArea' => $row['lotArea'],
                    'noFloors' => $row['numberFloors'],
                    'businessType' => $businessType,
                    'meetType' => $row['meetingType'],
                    'meetLoc' => $row['meetingLocation'],
                    'image' => $imgExplode,
                    'appointmentDate' => $row['meetingDate'],
                    'appointmentTime' => $row['meetingTime'],
                    'status' => $row['statusCheck']
                ];
            }
        }
        return $sched;
    }

    function assignEmployee($employeeID, $clientID)
    {
        $query1 = "INSERT INTO `employee_client`(`employee_id`, `client_id`, `status`) VALUES ('$employeeID','$clientID','ongoing')";
        if (mysqli_query($this->conn, $query1)) {
            $sql = "UPDATE `appointment` SET status='ongoing' WHERE client_id=$clientID";
            if (mysqli_query($this->conn, $sql)) {
                $query = "UPDATE `message` SET employee_id='$employeeID' WHERE client_id=$clientID";
                if (mysqli_query($this->conn, $query)) {
                    return (object)[
                        "status" => 'success',
                        "msg" => 'Profile Update Successfully.'
                    ];
                }
            } else {
                return (object)[
                    "status" => 'error'
                ];
            }
        } else {
            return (object)[
                "status" => 'error'
            ];
        }
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

    function insertEmployeeMessage($content, $client, $id)
    {
        $sql = "SELECT * FROM message WHERE employee_id = '$id' AND client_id = '$client'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                $msg = json_decode($row["content"]);
                array_push($msg, json_decode($content)[0]);
                $msg = json_encode($msg);
                $sql = "UPDATE `message` SET content='$msg', employee_id='$id' WHERE client_id='$client'";
                return mysqli_query($this->conn, $sql);
            }
        } else {
            $sql = "INSERT INTO message(employee_id, client_id ,content) VALUES ('$id', '$client','$content')";
            return mysqli_query($this->conn, $sql);
        }
    }

    function insertEmployeeFiles($content, $client, $id)
    {
        $sql = "SELECT * FROM message WHERE employee_id = '$id' AND client_id = '$client'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $msg = array();
            if ($row = mysqli_fetch_assoc($result)) {
                if ($row["files"] != '') {
                    $msg = json_decode($row["files"]);
                } else {
                    $msg = array();
                }
                array_push($msg, json_decode($content)[0]);
                $msg = json_encode($msg);
                $sql = "UPDATE `message` SET files='$msg', employee_id='$id' WHERE client_id='$client'";
                return mysqli_query($this->conn, $sql);
            }
        } else {
            $content = json_encode($content);
            $sql = "INSERT INTO message(employee_id, client_id , files) VALUES ('$id', '$client', '$content')";
            return mysqli_query($this->conn, $sql);
        }
    }
    function insertEmployeeCostEstimate($content, $client, $id)
    {

        $sql = "UPDATE `message` SET costEstimate='$content' WHERE client_id='$client' AND employee_id='$id'";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            $date = date('Y-m-d H:i:s');
            $jsonContent = array(
                (object)[
                    "content" => "Cost Estimate has been sent! Kindly Check your profile to view and download",
                    "dateTime" => $date,
                    "sender" => "employee"
                ]

            );
            $jsonContent = json_encode($jsonContent);
            $this->insertEmployeeMessage($jsonContent, $client, $id);
            $this->insertActivity($client, "Send a Cost Estimate ");
        }
        return $result;
    }

    function insertActivity($clientId, $statusMessage)
    {
        $query = "INSERT INTO `activity_log`(`client_id`, `status_message`) VALUES ('$clientId','$statusMessage')";
        return mysqli_query($this->conn, $query);
    }

    function getContent($client_id, $id)

    {
        $sql = "SELECT * FROM message WHERE employee_id='$id' AND client_id='$client_id'";
        $result = mysqli_query($this->conn, $sql);
        $message = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $arrayObj = array_merge((array) json_decode($row['content']), (array) json_decode($row['files']));
                $message[] = (object) [
                    'id' => $row['employee_id'],
                    'content' => $arrayObj,
                    'date' => $row['dateTime'],
                    'status' => $row['status']
                ];
            }
        }
        return $message;
    }

    function getAllInfoById($id)
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


    // INSERT INTO activity_log (status_message) VALUES ("Registration Date: ")
}
