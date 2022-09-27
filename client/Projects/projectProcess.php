<?php
include ("../include/dbh.inc.php");
$dbh = new dbHandler;

if(isset($_POST["getAllProjects_req"])) {
    echo json_encode((array)$dbh->getAllProjects());
    
}