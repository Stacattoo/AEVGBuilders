<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

if (isset($_POST['email'])) {
    if ($dbh->checkIfEmailExist($_POST['email'])) {

        echo json_encode(array(
            $dbh->checkIfEmailExist($_POST['email'])
        ));
    }
}

else if (isset($_POST['password'])) {
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
        // var_dump($account);
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
