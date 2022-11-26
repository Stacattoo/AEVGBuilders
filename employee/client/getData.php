<?php
include_once('../../client/include/dbh.inc.php');
$dbh = new dbHandler;

if (isset($_POST['displaySchedDetails'])) {
    echo json_encode((array)$dbh->getSched($_POST['client_id'])[0]);
}


