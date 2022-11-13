<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

$projectOthers = '';
$businessOthers = '';
$location = '';
$bstypename = $_POST['businessTypeName'];
$bstype = $_POST['businessType'];

if ($_POST['projectType'] == 'Others') {
    $projectOthers = $_POST['projectTypeOthers'];
} else {
    $projectOthers = $_POST['projectType'];
}

if(!empty($bstype)) {
    foreach($bstype as $key => $value) {
        if($value == 'Others'){
            $bstype[$key] = $bstypename;
        }
    }
}
$businessOthers = implode(", ", $bstype);
if (isset($_POST['meetLoc'])) {

    $location = $_POST['meetLoc'];
} else {
    $location = '';
}

$sched = (object) [
    'firstName' => $_POST['firstName'],
    'lastName' => $_POST['lastName'],
    'contactNo' => $_POST['contactNo'],
    'email' => $_POST['email'],
    'projLocation' => $_POST['projLocation'],
    'targetDate' => $_POST['targetDate'],
    'projectType' => $projectOthers,
    'lotArea' => $_POST['lotArea'],
    'noFloors' => $_POST['noFloors'],
    'businessType' => $businessOthers,
    'meetType' => $_POST['meetType'],
    'meetLoc' => $location,
    'appointmentDate' => $_POST['appointmentDate'],
    'appointmentTime' => $_POST['appointmentTime']

];

// var_dump($sched);
if ($dbh->setAppointment($sched, $_SESSION['id'])) {
    echo json_encode(array(
        "status" => 'success',
        "msg" => 'Profile Update Successfully.'
    ));
} else {
    echo json_encode(array(
        "status" => 'error',
        "msg" => 'There was a problem setting your schedule! Try Again Later.'
    ));
}
