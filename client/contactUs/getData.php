<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

if (isset($_POST['displaySchedDetails'])) {
    echo json_encode((array)$dbh->getSched($_SESSION['id'])[0]);
}
if (isset($_POST['getSchedEdit']) == $_SESSION['id']) {
    echo json_encode((array)$dbh->getSched($_SESSION['id'])[0]);
}
if(isset($_POST['checkAppointment'])){
    echo json_encode((array)$dbh->getSched($_SESSION['id'])[0]);
}
if(isset($_POST['checkAppointmentProfile'])){
    echo json_encode((array)$dbh->getSched($_SESSION['id'])[0]);
}

if (isset($_POST['firstName'])) {
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

if (!empty($bstype)) {
    foreach ($bstype as $key => $value) {
        if ($value == 'Others') {
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



    $info = (object) [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
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


    if ($dbh->editSetAppointment($info, $_SESSION['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    }
}
