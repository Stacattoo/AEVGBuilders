<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();

if(isset($_POST['displayResults'])){
    echo json_encode((array)$dbh->displayAllResult());
}