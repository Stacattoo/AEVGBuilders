<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();

if (isset($_POST['displayUsers'])) {
    echo json_encode((array)$dbh->getAllUserClientData());
}

if(isset($_POST['getEmployee'])){
    echo json_encode((array)$dbh->getEmployeeProjectCount());
}

if(isset($_POST['employeeID'])){
    echo json_encode((array)$dbh->assignEmployee($_POST['employeeID'], $_POST['clientID']));
}



if (isset($_POST['email'])) {
    $info = (object) [
        'id' => $_POST['id'],
        'firstName' => $_POST['firstName'],
        'middleName' => $_POST['middleName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'contact' => $_POST['contact']
    ];

    if (!$dbh->isClientUserAccountExist($info->id, $info->contact, $info->email)) {
        echo $dbh->updateUserInfo($info, $_POST['id']);
    } 
}

if (isset($_POST['deleteUser'])) {
    echo $dbh->updateSpecificClientInfo($_POST['deleteUser'], 'status', 'deleted', 'client');
}

if (isset($_POST['editUser'])) {
    echo json_encode((array)$dbh->getAllClientInfoByID($_POST['editUser']));
}
