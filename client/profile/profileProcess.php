<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;


if(isset($_POST['firstName'])){

    $img_path = "image/".basename($_FILES['image']['name']);

    $info = (object) [
        'firstName' => $_POST['firstName'],
        'middleName' => $_POST['middleName'],
        'lastName' => $_POST['lastName'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'contact_no' => $_POST['contact_no'],
        'house_no' => $_POST['house_no'],
        'street' => $_POST['street'],
        'barangay' => $_POST['barangay'],
        'municipality' => $_POST['municipality'],
        'province' => $_POST['province'],
        'image' => $img_path
    ];
    
        $dbh->profileUpdate($info, $_SESSION['id']);
    }

    if(move_uploaded_file($_FILES['image']['tmp_name'], $img_path)){
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Uploaded Successfully.'
        ));
    }else{
        echo json_encode(array(
            "status" => 'error',
            "msg" => 'There was a problem Uploading, Please try again.'
        ));
    }
    
?>