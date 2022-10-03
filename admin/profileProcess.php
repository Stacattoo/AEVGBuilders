<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

$img_path = "";

if (!isset($_FILES['image']['name'])) {

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

    $img_path = $_POST["file_path"];
}

if (isset($_POST['firstName'])) {

    $info = (object) [

        'username' => $_POST['username'],
        'email' => $_POST['email'],
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
