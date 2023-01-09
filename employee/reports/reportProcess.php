<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

if (isset($_POST['getHandledClients'])) {
    echo json_encode((array)$dbh->getAllInfoByID($_SESSION['id']));
}

if(isset($_POST['getActivities'])){
    echo json_encode((array)$dbh->activities($_POST['clientId']));
}

if(isset($_POST['updateToOngoing'])){
    echo json_encode((array)$dbh->updateClientStatus($_POST['id'], 'Ongoing'));
}

if(isset($_POST['updateToOnhold'])){
    echo json_encode((array)$dbh->updateClientStatus($_POST['id'], 'Onhold'));
}

if(isset($_POST['updateToStopped'])){
    echo json_encode((array)$dbh->updateClientStatus($_POST['id'], 'Stopped'));
}
if(isset($_POST['updateToFinished'])){
    echo json_encode((array)$dbh->updateClientStatus($_POST['id'], 'Finished'));
}
if(isset($_POST['displayName'])){
    echo json_encode((array)$dbh->getAllInfoByID($_SESSION['id']));
}
?>