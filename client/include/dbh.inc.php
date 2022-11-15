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

    function getAllMaterials()
    {
        $query = "SELECT * FROM material";
        $result = mysqli_query($this->conn, $query);
        $materials = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $materials[] = (object)[
                    "id" => $row["id"],
                    "code" => $row["code"],
                    "name" => $row["name"],
                    "description" => $row["description"],
                    "category" => $row["category"],
                    "image" => $row["image"],
                    "remaining_stock" => $row["remaining_stock"],
                ];
            }
        }
        return $materials;
    }

    function getAllProjects($clientId)
    {
        $query = "SELECT * FROM projects";
        $result = mysqli_query($this->conn, $query);
        $projects = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $sql = "SELECT COUNT(project_reaction.project_id) AS reactionCtr FROM project_reaction WHERE project_id=$id";
                $result2 = mysqli_query($this->conn, $sql);
                if (mysqli_num_rows($result)) {
                    if ($row2 = mysqli_fetch_assoc($result2)) {
                        $sql2 = "SELECT * FROM project_reaction WHERE client_id=$clientId AND project_id=$id";
                        $result3 = mysqli_query($this->conn, $sql2);
                        $isReacted = mysqli_num_rows($result3);

                        $projects[] = (object)[
                            "id" => $row["id"],
                            "title" => $row["title"],
                            "description" => $row["description"],
                            "category" => $row["category"],
                            "image" => explode(",", $row["image"]),
                            "reactionCtr" => $row2["reactionCtr"],
                            "reaction" => $isReacted
                        ];
                    }
                }
            }
        }
        return $projects;
    }

    function checkIfEmailExist($email)
    {
        $sql = "SELECT id FROM client WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    // function checkIfUsernameExist($username)
    // {
    //     $sql = "SELECT id FROM client WHERE username='$username'";
    //     $result = mysqli_query($this->conn, $sql);
    //     return mysqli_num_rows($result);
    // }

    function checkIfAccountExist($key)
    {
        if ($this->checkIfEmailExist($key)) {
            return true;
        } else {
            return false;
        }
    }


    function updatePassword($email, $newPass)
    {
        $query = "UPDATE `client` SET `password`='$newPass' WHERE `email`='$email'";
        return mysqli_query($this->conn, $query);
    }

    function updateStatusToBlock($key, $table)
    {
        $query = "UPDATE $table SET status='block' WHERE email='$key'";
        return mysqli_query($this->conn, $query);
    }


    function profileUpdate($value, $id)
    {
        $sql = "UPDATE `client` SET firstName='$value->firstName', middleName='$value->middleName', lastName='$value->lastName', email='$value->email',
         contact_no='$value->contact_no', house_no='$value->house_no', street='$value->street', barangay='$value->barangay', municipality='$value->municipality', 
         province='$value->province', image='$value->image' WHERE id=$id";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    function checkAccount($key, $password, $col)
    {
        $query = "SELECT * FROM $col WHERE email = '$key'  AND  password ='$password'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                if ($row["status"] == "active") {
                    // if ($this->updateAttempt($key, 3)) {
                    $_SESSION['id'] = $row["id"];
                    $_SESSION['email'] = $row["email"];
                    return true;
                    //}
                }
            }
        } else {
            return false;
        }
    }

    function registerAccount($info)
    {
        $query = "INSERT INTO client(firstName, middleName, lastName, password, email, contact_no, house_no, street, barangay, municipality, province) 
        VALUES ('$info->firstName' ,'$info->middleName', '$info->lastName',
        '$info->password', '$info->email', '$info->contact', '$info->houseNo', '$info->street', '$info->barangay', '$info->municipality', '$info->province')";
        //$this->addActivities($info->firstName + ' ' + $info->lastName, "Account", "Creat an account with student number $info->username");
        return mysqli_query($this->conn, $query);
    }

    function getFullname($id)
    {
        $sql = "SELECT CONCAT(lastName, ',', ' ', firstName, ' ', IFNULL(middleName, '')) AS fullName FROM client WHERE id='$id'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            return $row['fullName'];
        } else {
            return '';
        }
    }

    function getAddress($id)
    {
        $sql = "SELECT CONCAT(street, ' ', barangay, ' ', municipality, ',', ' ', province) AS address FROM client WHERE id='$id'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            return $row['address'];
        } else {
            return '';
        }
    }

    function getValueByID($value, $id, $table = "client")
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
    function getAppDetailsByID($value, $id, $table = "appointment")
    {
        $sql = "SELECT `$value` FROM $table WHERE client_id=$id";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                return $row[$value];
                // return $sql;
            }
        }
    }



    function getSpecificInfo($id, $col)
    {
        $sql = "SELECT $col FROM client WHERE id='$id'";
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
        $sql = "UPDATE `client` SET $col='$value' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }

    function insertSchedule($sched)
    {
        $sql = "INSERT INTO `schedule`(`user_id`, `reason`) VALUES ('$sched->id', '$sched->reason')";
        return mysqli_query($this->conn, $sql);
    }
    function getSched($id)
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

    function setAppointment($value, $id)
    {

        $sql = "INSERT INTO appointment(client_id, projectLocation, targetConsDate, projectType, projectImage, lotArea, numberFloors, businessType, meetingType, meetingLocation, image, meetingDate, meetingTime)
        VALUES ('$id', '$value->projLocation', '$value->targetDate', '$value->projectType', '$value->projectImage','$value->lotArea', '$value->noFloors', '$value->businessType', '$value->meetType', 
        '$value->meetLoc', '$value->image', '$value->appointmentDate', '$value->appointmentTime')";
        return mysqli_query($this->conn, $sql);
    }

    function editSetAppointment($value, $id)
    {

        $sql = "UPDATE `appointment` SET  projectLocation = '$value->projLocation', targetConsDate = '$value->targetDate', projectType = '$value->projectType', projectImage = '$value->projectImage',
        lotArea = '$value->lotArea', numberFloors = '$value->noFloors', businessType = '$value->businessType', meetingType = '$value->meetType',
        meetingLocation = '$value->meetLoc', image= '$value->image',  meetingDate = '$value->appointmentDate', meetingTime = '$value->appointmentTime' WHERE client_id='$id'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    function insertProjectReaction($clientId, $projectId)
    {
        $sql = "INSERT INTO `project_reaction`(`client_id`, `project_id`) VALUES ($clientId, $projectId)";
        return mysqli_query($this->conn, $sql);
    }

    function deleteProjectReaction($clientId, $projectId)
    {
        $sql = "DELETE from `project_reaction` where client_id = $clientId AND project_id = $projectId";
        return mysqli_query($this->conn, $sql);
    }
    function canceledSched($id)
    {
        $sql = "UPDATE `appointment` SET status='canceled' WHERE client_id='$id'";
        // $fullName = $this->getFullname($id);
        // $this->addActivities($fullName, "Schedule", "Cancel schedule");
        return mysqli_query($this->conn, $sql);
        // unset($_POST['dateChanged']);
    }

    function getFeedback() {
        $sql = "SELECT feedback.*, CONCAT(client.firstName, ' ', client.lastName) as fullname, client.image FROM feedback INNER JOIN client ON client.id=feedback.client_id WHERE status = 'active'";
        $result = mysqli_query($this->conn, $sql);
        $data = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = (object)[
                    "fullname" => $row['fullname'],                    
                    "image" => $row['image'],                    
                    "feedback" => $row['feedback'],                    
                ];
            }
        }
        return $data;
    }

    function insertFeedback($clientId, $feedback)
    {
        $sql = "INSERT INTO `feedback`(`client_id`, `feedback`) VALUES ($clientId, $feedback)";
        return mysqli_query($this->conn, $sql);
    }

    // inserting message
    function insertClientMessage($content, $id)
    {
        $sql = "SELECT * FROM message WHERE client_id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                $msg = json_decode($row["content"]);
                array_push($msg, json_decode($content)[0]);
                $msg = json_encode($msg);
                $sql = "UPDATE `message` SET content='$msg' WHERE client_id='$id'";
                return mysqli_query($this->conn, $sql);
            }
        } else {
            $sql = "INSERT INTO message(client_id, content) VALUES ('$id', '$content')";
            return mysqli_query($this->conn, $sql);
        }
    }

    function getContent($id)
    {
        $sql = "SELECT * FROM message WHERE client_id='$id'";
        $result = mysqli_query($this->conn, $sql);
        $message = array();
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $message[] = (object) [
                    'id' => $row['client_id'],
                    'content' => json_decode($row['content']),
                    'date' => $row['dateTime'],
                    'status' => $row['status']
                ];
            }
        }
        return $message;
    }

    //message end



    function __destroy()
    {
        $this->conn->close();
    }
}
