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
    $province = [
        'Abra', 'Agusan del Norte', 'Agusan del Sur', 'Aklan', 'Albay', 'Antique', 'Apayao',
        'Aurora', 'Basilan', 'Bataan', 'Batanes', 'Batangas', 'Benguet', 'Biliran', 'Bohol',
        'Bukidnon', 'Bulacan', 'Cagayan', 'Camarines Norte', 'Camarines Sur', 'Camiguin',
        'Capiz', 'Catanduanes', 'Cavite', 'Cebu', 'Cotabato', 'Davao de Oro', 'Davao del Norte',
        'Davao del Sur', 'Davao Occidental', 'Davao Oriental', 'Dinagat Islands', 'Eastern Samar',
        'Guimaras', 'Ifugao', 'Ilocos Norte', 'Ilocos Sur', 'Iloilo', 'Isabela', 'Kalinga',
        'La Union', 'Laguna', 'Lanao del Norte', 'Lanao del Sur', 'Leyte', 'Maguindanao',
        'Marinduque', 'Masbate', 'Metro Manila', 'Misamis Occidental', 'Misamis Oriental',
        'Mountain Province', 'Negros Occidental', 'Negros Oriental', 'Northern Samar', 'Nueva Ecija',
        'Nueva Vizcaya', 'Occidental Mindoro', 'Oriental Mindoro', 'Palawan', 'Pampanga',
        'Pangasinan', 'Quezon', 'Quirino', 'Rizal', 'Romblon', 'Samar', 'Sarangani', 'Siquijor',
        'Sorsogon', 'South Cotabato', 'Southern Leyte', 'Sultan Kudarat', 'Sulu', 'Surigao del Norte',
        'Surigao del Sur', 'Tarlac', 'Tawi-Tawi', 'Zambales', 'Zamboanga del Norte', 'Zamboanga del Sur', 'Zamboanga Sibugay'
    ];
    $info = (object) [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'projLocation' => $_POST['projLocation'],
        'province' => $province[$_POST['province']],
        'municipality' => $_POST['municipality'],
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
    // var_dump($info);
    if ($dbh->editSetAppointment($info, $_SESSION['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    }else{
        echo json_encode(array(
            "status" => 'error',
            "msg" => 'Error.'
        ));
    }
    // echo json_encode(
    //     (array)
    //     $dbh->editSetAppointment($info, $_SESSION['id'])
    // );
}
