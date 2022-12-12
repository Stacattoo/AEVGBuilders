<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();

if (isset($_POST['pojStats'])) {
    echo json_encode((array)$dbh->getProjStats2());
}