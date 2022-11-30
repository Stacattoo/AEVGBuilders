<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

if (isset($_POST['getHandledClients'])) {
    echo json_encode((array)$dbh->getAllInfoByID($_SESSION['id']));
}

if(isset($_POST['getActivities'])){
    //
}
?>