<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

if (isset($_POST['insertFeedback'])) {
    echo json_encode((array)$dbh->insertFeedback($_SESSION['id'], $_POST['insertFeedback']));
}

if (isset($_POST['firstName'])) {
    $img_path = "";
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        $img_path = "image/" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $img_path);
    } else {
        $img_path = $_POST["file_path"];
    }

    

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

        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    }
}
if (isset($_POST['getCostEstimate'])) {
    echo json_encode((array)$dbh->getCostEstimate($_SESSION['id'])[0]);
    // echo "cost estimate";
}

if (isset($_POST['getPortfolioUploads'])) {
    echo json_encode((array)$dbh->getSpecificClientPortoflio($_SESSION['id'])[0]);
    // echo "cost estimate";
}