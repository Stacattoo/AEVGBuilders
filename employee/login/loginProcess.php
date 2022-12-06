<?php 
include('../include/dbh.employee.php');
$dbh = new dbHandler;


// echo json_encode(array(
//     $dbh->checkIfEmployeeAccExist($email)
// ));
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($dbh->checkIfEmployeeAccExist($email)) {
        $total_count = $dbh->getAttempt($email, 'employee');
        if ($total_count == 0) {
            if ($dbh->updateStatusToBlock($email, 'employee')) {
                echo json_encode(array(
                    "status" => 'error',
                    'msg' => "Too many failed login attempts. Your account has been blocked"
                ));
            }
        } else {
            if ($dbh->checkAccount($email, $password, 'employee')) {
                echo json_encode(array(
                    "status" => 'success',
                    'msg' => ""
                ));
            } else {
                echo json_encode(array(
                    "status" => 'error',
                    'msg' => "Incorrect Password! Please Try again"
                ));
            }
        }
    } else {
        echo json_encode(array(
            "status" => 'error',
            'msg' => "Incorrect Email! Please Try Again."
        ));
    }
    
}