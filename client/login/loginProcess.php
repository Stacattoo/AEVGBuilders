<?php 
include('../include/dbh.inc.php');
$dbh = new dbHandler;

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($dbh->checkIfAccountExist($email)) {
            if ($dbh->checkAccount($email, $password, 'client')) {
                echo json_encode(array(
                    "status" => 'success',
                    'msg' => ""
                ));
            } else {
                echo json_encode(array(
                    "status" => 'error',
                    'msg' => "Incorrect Email or Password!"
                ));
            }
        
    } 
    // else {
    //     echo json_encode(array(
    //         "status" => 'error',
    //         'msg' => "Incorrect Email or Password!"
    //     ));
    // }
}