<?php 
include_once('../include/dbh.admin.php');
$dbh = new dbHandler;

if (isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($dbh->isEmailExist($email)){
        if ($id = $dbh->checkAccount($email, $password)) {
            echo json_encode(array(
                "status" => 'success'
            ));
            $_SESSION['admin_id'] = $id;
        } else {
            echo json_encode(array(
                "status" => 'error',
                'msg' => "Incorrect Username or Password!"
            ));
        }
    }
} else {
    echo json_encode(array(
        "status" => 'error',
        'msg' => "Incorrect Email or Password!"
    ));
}
?>