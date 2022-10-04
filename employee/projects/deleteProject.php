<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

if (isset($_POST['deleteProjects_req'])) {

    if ($dbh->deleteProject($_POST['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Project Successfully Uploaded.'
        ));
    } else {
        echo json_encode(array(
            "status" => 'error',
            "msg" => 'There was a problem Uploading, Please try again.'
        ));
    }
    
}

if(isset($_POST['deleteImage'])){
    if ($dbh->deleteImage($_POST['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Image Deleted'
        ));
    } else {
        echo json_encode(array(
            "status" => 'error',
            "msg" => 'There was a problem deleting, Please try again.'
        ));
    }
}
