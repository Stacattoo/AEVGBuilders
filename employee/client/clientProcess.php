<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

if (isset($_POST['displayClient'])) {
    echo json_encode((array)$dbh->getClientData($_SESSION['id']));
}

// if (isset($_POST['displayPendingUser'])) {
//     echo json_encode((array)$dbh->getAllClientPendingSched());
// }

if (isset($_POST['getEmployee'])) {
    echo json_encode((array)$dbh->getAllUserData());
}

if (isset($_POST['accept_client'])) {
    $empID = $_SESSION['id'];
    echo json_encode((array)$dbh->assignEmployee($empID, $_POST['clientID']));
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

if (isset($_POST['updateStatus'])) {
    echo json_encode((array)$dbh->updateClientStatus($_POST['updateStatus'], $_POST['clientStatus']));
}
