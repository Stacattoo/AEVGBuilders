<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

if(isset($_POST['firstName'])){
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
        'province' => $_POST['province']
    ];
    
        $dbh->profileUpdate($info, $_SESSION['id']);
    }
    
?>