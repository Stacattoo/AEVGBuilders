<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

$sched = (object) [
    'firstName' => $_POST['firstName'],
    'lastName' => $_POST['lastName'],
    'contactNo' => $_POST['contactNo'],
    'email' => $_POST['email'],
    'projLocation' => $_POST['projLocation'],
    'targetDate' => $_POST['targetDate'],
    'projectType' => $_POST['projectType'],
    'lotArea' => $_POST['lotArea'],
    'noFloors' => $_POST['noFloors'],
    'businessType' => $_POST['businessType'],
    'meetType' => $_POST['meetType'],
    'meetLoc' => $_POST['meetLoc'],
    'appointmentDate' => $_POST['appointmentDate'],
    'appointmentTime' => $_POST['appointmentTime']
    
];

if ($dbh->setAppointment($sched, $_SESSION['id'])) {
    echo json_encode(array(
        "status" => 'success',
        "msg" => 'Profile Update Successfully.'
    ));
}else{
    echo json_encode(array(
        "status" => 'error',
        "msg" => 'There was a problem setting your schedule! Try Again Later.'
    ));
}
