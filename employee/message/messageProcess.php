<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

if (isset($_POST['displayApprovedUser'])) {
    echo json_encode((array)$dbh->getApprovedClientData($_SESSION['id']));
}

if (isset($_POST['employeeMessage'])) {
    $clientID = $_POST['clientID'];
    $date = date('Y-m-d H:i:s');
    $json = array(
        (object)[
            "content" => $_POST['employeeMessage'],
            "dateTime" => $date,
            "sender" => "employee"
        ]
    );
    $json = json_encode($json);
    if ($dbh->insertEmployeeMessage($json, $clientID ,$_SESSION['id'])) {
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