<?php
include_once("../include/dbh.employee.php");
$dbh = new dbHandler();

if (isset($_POST['getEmployeeInfo'])) {
    if (isset($_SESSION['id'])) {
        echo json_encode((array)$dbh->getAllEmployeeInfo($_SESSION['id']));
    } else {
        return false;
    }
}
if (isset($_POST['username'])) {
    $id = $_SESSION['id'];
    $info = $dbh->getAllEmployeeInfo($id);
    $password = $_POST['password'];
    if ($password == $info->password) {
        if (isset($_POST['newPassword'])) {
            $newPassword = $_POST['newPassword'];
            if ($newPassword == $_POST['confirmPassword']) {
                $dbh->updateInfo($id, 'password', $newPassword);
            } else {
                echo json_encode(array(
                    "status" => 'error',
                    "msg" => 'Incorrect Password'
                ));
                exit();
            }
        }
        $dbh->updateInfo($id, 'username', $_POST['username']);
        $dbh->updateInfo($id, 'email', $_POST['email']);
        echo json_encode(array("status" => 'success'));
    } else {
        echo json_encode(array(
            "status" => 'error',
            "msg" => 'Incorrect Password'
        ));
    }
}




?>