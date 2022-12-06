<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();

if(isset($_POST['displayResults'])){
    echo json_encode((array)$dbh->displayAllResult());
}

// if(isset($_POST['startDate'])){
// $dateRange = (object)[
//     'startDate' => $_POST['startDate'],
//     'endDate' => $_POST['endDate']
// ];
// }