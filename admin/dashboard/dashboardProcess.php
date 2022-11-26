<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();

if (isset($_POST['getClients'])) {
    echo json_encode((array) $dbh->getAllClients());
} elseif (isset($_POST['getTop5Reaction'])) {
    echo json_encode((array) $dbh->getTop5Reaction());
} elseif (isset($_POST['getProjects'])) {
    echo json_encode((array) $dbh->countAllProjects());
} elseif (isset($_POST['getRegisteredUsers'])) {
    echo json_encode((array) $dbh->getAllUserClientData());
} elseif (isset($_POST['getEmployees'])) {
    echo json_encode((array) $dbh->getAllUserData());
}
