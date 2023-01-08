<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

if (isset($_POST['displayClient'])) {
    echo json_encode((array)$dbh->getClientData($_SESSION['id']));
}

