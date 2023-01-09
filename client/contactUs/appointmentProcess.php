<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

$projectOthers = '';
$businessOthers = '';
$projectImg = '';
$trimmed_array = '';
$location = '';
$bstypename = $_POST['businessTypeName'];
$bstype = $_POST['businessType'];

if ($_POST['projectType'] == 'Others') {
    if(isset($_POST['projectTypeOthers'])){

        $projectOthers = 'Others';
        $projectImg = '';
    }

} else {
    $projectOthers = $_POST['projectType'];
    $projectImg = $_POST['listGroupCheckableRadios'];
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
if (isset($_POST['firstName'])) {
    if (!array_sum($_FILES['imageEdit']['error']) > 0) {
        $imageCount = count($_FILES['imageEdit']['name']);
        $paths = "";

        for ($i = 0; $i < $imageCount; $i++) {
            $file_name = $_FILES['imageEdit']['name'][$i];
            $file_tmp = $_FILES["imageEdit"]["tmp_name"][$i];
            $img_path = "../../images/" . basename($file_name);
            $paths .= $img_path . ",";
            if (!move_uploaded_file($file_tmp, $img_path)) {
                echo json_encode(array(
                    "status" => 'error',
                    "msg" => 'There was a problem Uploading, Please try again.'
                ));
            }
        }

        $trimmed_array = trim($paths, ",");
    }
    // var_dump($_FILES);
    $sched = (object) [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'contactNo' => $_POST['contactNo'],
        'email' => $_POST['email'],
        'projLocation' => $_POST['projLocation'],
        'targetDate' => $_POST['targetDate'],
        'projectType' => $projectOthers,
        'projectImage' => $projectImg,
        'lotArea' => $_POST['lotArea'],
        'noFloors' => $_POST['noFloors'],
        'businessType' => $businessOthers,
        'meetType' => $_POST['meetType'],
        'meetLoc' => $location,
        'image' => $trimmed_array,
        'appointmentDate' => $_POST['appointmentDate'],
        'appointmentTime' => $_POST['appointmentTime']

    ];

    // var_dump($sched);
    if ($dbh->setAppointment($sched, $_SESSION['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    }

}
