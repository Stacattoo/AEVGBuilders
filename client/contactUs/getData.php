<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

if (isset($_POST['displaySchedDetails'])) {
    echo json_encode((array)$dbh->getSched($_SESSION['id'])[0]);
}
if (isset($_POST['getSchedEdit']) == $_SESSION['id']) {
    echo json_encode((array)$dbh->getSched($_SESSION['id'])[0]);
}
if (isset($_POST['checkSched'])) {
    echo json_encode((array)$dbh->checkSched());

}
if (isset($_POST['checkAppointment'])) {
    echo json_encode((array)$dbh->getSched($_SESSION['id'])[0]);
}
if (isset($_POST['checkAppointmentProfile'])) {
    echo json_encode((array)$dbh->getSched($_SESSION['id'])[0]);
}

if (isset($_POST['firstName'])) {
    $projectOthers = '';
    $businessOthers = '';
    $location = '';
    $bstypename = $_POST['businessTypeName'];
    $bstype = $_POST['businessType'];


    $trimmed_array = "";
    $oldImgImp = "";
    $oldImg = array($_POST['imageEditStore']);


    if (!array_sum($_FILES['imageEdit']['error']) > 0) {

        $imageCount = count($_FILES['imageEdit']['name']);
        $paths = "";
        for ($i = 0; $i < $imageCount; $i++) {
            $file_name = $_FILES['imageEdit']['name'][$i];
            $file_tmp = $_FILES["imageEdit"]["tmp_name"][$i];
            $img_path = "../../images/" . basename($file_name);
            $paths .= $img_path . ",";
            if (!move_uploaded_file($file_tmp, $img_path)) {
                $paths = "";
            }
        }
        $array = trim($paths, ",");
        $trimmed_array = array_push($oldImg, $array);
        $oldImgImp = implode(",", $oldImg);
    }

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



    $oldImgImp =  trim($oldImgImp, ",");

    $info = (object) [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'projLocation' => $_POST['projLocation'],
        'targetDate' => $_POST['targetDate'],
        'projectType' => $projectOthers,
        'projectImage' => $_POST['listGroupCheckableRadios'],
        'lotArea' => $_POST['lotArea'],
        'noFloors' => $_POST['noFloors'],
        'businessType' => $businessOthers,
        'meetType' => $_POST['meetType'],
        'meetLoc' => $location,
        'image' => $oldImgImp,
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
