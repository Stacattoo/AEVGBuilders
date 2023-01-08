<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

//Change Password Edit

$id = $_SESSION['id'];
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
$confirmPass = $_POST['confirmPass'];
if(isset($_POST['oldPass'])){
if ($oldPass !== $dbh->getSpecificInfo($id, 'password')) {
    echo json_encode(array(
        "status" => "error",
        "msg" => "Current Password is incorrect"
    ));
} else if ($newPass !== $confirmPass) {
    echo json_encode(array(
        "status" => "error",
        "msg" => "Password does not match"
    ));
    
} else {

    if($dbh->updateSpecificInfo($id, 'password', $newPass)){
        echo json_encode(array(
            "status" => "success",
            "msg" => "Change password successfully!"
        ));
    }
    
}
}