<?php
include ("../include/dbh.inc.php");
$dbh = new dbHandler;

if(isset($_POST["getAllProjects_req"])) {
    echo json_encode((array)$dbh->getAllProjects());
    
}
if(isset($_POST["setPostReaction"])) {
    if (isset($_SESSION["id"])) {
        echo json_encode((array)$dbh->updateProjectReaction($_SESSION["id"]), $_POST["projectId"]));
    } else {
        echo json_encode(array(
            "status" => false,
            "msg" => 'Login First'
        ));
    }
    
}