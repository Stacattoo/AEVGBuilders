<?php
include ("../include/dbh.inc.php");
$dbh = new dbHandler;

if(isset($_POST["getAllProjects_req"])) {
    if (isset($_SESSION["id"])) {
        echo json_encode((array)$dbh->getAllProjects($_SESSION["id"]));
    } else {
        echo json_encode((array)$dbh->getAllProjects("0"));
    }
    
}
if(isset($_POST["setPostReaction"])) {
    if (isset($_SESSION["id"])) {
        if ($_POST['react']) {
            echo json_encode((array)$dbh->deleteProjectReaction($_SESSION["id"], $_POST["projectId"]));
        } else {
            echo json_encode((array)$dbh->insertProjectReaction($_SESSION["id"], $_POST["projectId"]));
        }
    } else {
        echo json_encode(array(
            "status" => false,
            "msg" => 'Login First'
        ));
    }
    
}