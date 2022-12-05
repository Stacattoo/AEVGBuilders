<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

if (isset($_POST['displayApprovedUser'])) {
    echo json_encode((array)$dbh->getApprovedClientData($_SESSION['id']));
}
if (isset($_POST['displayPendingUser'])) {
    echo json_encode((array)$dbh->getAllClientPendingSched());
}
