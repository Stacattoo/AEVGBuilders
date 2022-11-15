<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

if (isset($_POST["getFeedback"])) {
    echo json_encode((array)$dbh->getFeedback());
}