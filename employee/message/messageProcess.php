<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

if (isset($_POST['displayApprovedUser'])) {
    echo json_encode((array)$dbh->getApprovedClientData($_SESSION['id']));
}

$trimmed_array = '';

if (isset($_FILES['filesEmployee']['name']) && $_FILES['filesEmployee']['name'] != '') {

    $imageCount = count($_FILES['filesEmployee']['name']);
    $paths = "";


    for ($i = 0; $i < $imageCount; $i++) {
        $file_name = $_FILES['filesEmployee']['name'][$i];
        $file_tmp = $_FILES["filesEmployee"]["tmp_name"][$i];
        $img_path = "../../clientEmployeeFiles/" . basename($file_name);
        $paths .= $img_path . ",";
        if (!move_uploaded_file($file_tmp, $img_path)) {
            $paths = "";
        }
    }

    $trimmed_array = trim($paths, ",");

    $clientID = $_POST['clientID'];
    $date = date('Y-m-d H:i:s');
   
    $jsonFiles = array(
        (object)[
            "content" => $trimmed_array,
            "dateTime" => $date,
            "sender" => "employee"
        ]
    );

    $jsonFiles = json_encode($jsonFiles);
    
    if ($dbh->insertEmployeeFiles($jsonFiles, $clientID, $_SESSION['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    }


}
if(isset($_POST['employeeMessage'])){

    $clientID = $_POST['clientID'];
    $date = date('Y-m-d H:i:s');
    $jsonContent = array(
        (object)[
            "content" => $_POST['employeeMessage'],
            "dateTime" => $date,
            "sender" => "employee"
        ]
    );
    $jsonContent = json_encode($jsonContent);
    if ($dbh->insertEmployeeMessage($jsonContent, $clientID, $_SESSION['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    }
}

if (isset($_POST['getMessage'])) {
    $client_id = $_POST['id'];
    echo json_encode((array)$dbh->getContent($client_id, $_SESSION['id'])[0]);
}
