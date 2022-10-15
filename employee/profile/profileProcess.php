<?php
include_once('../include/dbh.employee.php');
$dbh = new dbHandler;

//Profile Edit Info
$img_path = "";

// var_dump($_FILES);
if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
    
    $img_path = "image/" . basename($_FILES['image']['name']);

    move_uploaded_file($_FILES['image']['tmp_name'], $img_path);

} else {

    // echo "naka set";
    $img_path = $_POST["file_path"];
    // echo $img_path;
}

if (isset($_POST['firstName'])) {

    $info = (object) [
        'firstName' => $_POST['firstName'],
        'middleName' => $_POST['middleName'],
        'lastName' => $_POST['lastName'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'contactNo' => $_POST['contactNo'],
        'houseNo' => $_POST['houseNo'],
        'street' => $_POST['street'],
        'barangay' => $_POST['barangay'],
        'municipality' => $_POST['municipality'],
        'province' => $_POST['province'],
        'image' => $img_path
    ];


    if ($dbh->profileUpdate($info, $_SESSION['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    }else{
        echo json_encode(array(
            "status" => 'error',
            "msg" => 'There was a problem updating you profile, Please Try Again.'
        ));
    }
}
