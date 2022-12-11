<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

if(isset($_POST['emailCheck'])){
    if ($dbh->checkIfEmailExist($_POST['emailCheck'])) {

        echo $dbh->checkIfEmailExist($_POST['emailCheck']);
    }
}

if (isset($_POST['password'])) {
    if ($_POST['password'] != $_POST['confirmPassword']) {
        echo json_encode(array(
            "status" => 'error',
            'msg' => "<b>Password and Confirm Password</b> didn't match"
        ));
    } else {

        $account = (object) [
            'firstName' => $_POST['firstName'],
            'middleName' => $_POST['middleName'],
            'lastName' => $_POST['lastName'],
            // 'username' => $_POST['username'],
            'email' => $_POST['email'],
            'contact' => $_POST['contact'],
            'houseNo' => $_POST['houseNo'],
            'street' => $_POST['street'],
            'barangay' => $_POST['barangay'],
            'municipality' => $_POST['municipality'],
            'province' => $_POST['province'],
            'password' => $_POST['password']
        ];
        if ($dbh->registerAccount($account)) {
            echo json_encode(array(
                "status" => 'success',
                'msg' => "Register Successful!"
            ));
        } else {
            echo json_encode(array(
                "status" => 'error',
                'msg' => "There is an error occur. Please try again."
            ));
        }
    }
}
