<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

if ($dbh->checkIfEmailExist($_POST['email'])) {
    echo json_encode(array(
        "status" => 'error',
        "msg" => "<b>Email address</b> is already exist"
    ));
} else if ($dbh->checkIfUsernameExist($_POST['username'])) {
    echo json_encode(array(
        "status" => 'error',
        "msg" => "<b>Username</b> is already exist"
    ));
} else if ($_POST['password'] != $_POST['confirmPassword']) {
    echo json_encode(array(
        "status" => 'error',
        'msg' => "<b>Password and Confirm Password</b> didn't match"
    ));
} else {
    
   $account = (object) [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'contact' => $_POST['contact'],
        'houseNo' => $_POST['houseNo'],
        'street' => $_POST['street'],
        'baranggay' => $_POST['baranggay'],
        'municipality' => $_POST['municipality'],
        'province' => $_POST['province'],
        'password' => $_POST['password']
   ];
    if ($dbh->registerAccount($account)) {   
        echo json_encode(array(
            "status" => 'success'
        ));
    }
}