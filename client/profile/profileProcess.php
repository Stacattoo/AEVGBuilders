<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

//Profile Edit Info
$img_path = "";

if (!isset($_FILES['image']['name'])) {

    // echo "hindi naka set";
    $img_path = "image/" . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $img_path)) {

        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    } else {
        echo json_encode(array(
            "status" => 'error',
            "msg" => 'There was a problem uploading, Please try again.'
        ));
    }

} else {

    // echo "naka set";
    $img_path = $_POST["file_path"];
}

if (isset($_POST['firstName'])) {

    $info = (object) [
        'firstName' => $_POST['firstName'],
        'middleName' => $_POST['middleName'],
        'lastName' => $_POST['lastName'],
        //'username' => $_POST['username'],
        'email' => $_POST['email'],
        'contact_no' => $_POST['contact_no'],
        'house_no' => $_POST['house_no'],
        'street' => $_POST['street'],
        'barangay' => $_POST['barangay'],
        'municipality' => $_POST['municipality'],
        'province' => $_POST['province'],
        'image' => $img_path
    ];


    if ($dbh->profileUpdate($info, $_SESSION['id'])) {
        move_uploaded_file($_FILES['image']['tmp_name'], $img_path);
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    }
}
