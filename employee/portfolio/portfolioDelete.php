<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

if (isset($_POST['deleteProjects_req'])) {

    if ($dbh->deletePortfolio($_POST['id'])) {
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


