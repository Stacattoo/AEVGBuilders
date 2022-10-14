<?php
include('../include/dbh.employee.php');
//C:\xampp\htdocs\AEVGBuilders\employee\include\dbh.employee.php
$dbh = new dbHandler;

$trimmed_array = "";
$oldImgImp = "";
$oldImg = array($_POST['imageEditStore']);


if (isset($_FILES['imageEdit']['name']) && $_FILES['imageEdit']['name'] != '') {

    $imageCount = count($_FILES['imageEdit']['name']);
    $paths = "";
    for ($i = 0; $i < $imageCount; $i++) {
        $file_name = $_FILES['imageEdit']['name'][$i];
        $file_tmp = $_FILES["imageEdit"]["tmp_name"][$i];
        $img_path = "image/" . basename($file_name);
        $paths .= $img_path . ",";
        if (!move_uploaded_file($file_tmp, $img_path)) {
            $paths = "";
        }
    }
    $array = trim($paths, ",");
    $trimmed_array = array_push($oldImg, $array);
    $oldImgImp = implode(",", $oldImg);
}


if (isset($_POST['titleEdit'])) {
    //echo "asd";

    $oldImgImp =  trim($oldImgImp, ",");

    $info = (object) [
        'id' => $_POST['hiddenId'],
        'title' => $_POST['titleEdit'],
        'category' => $_POST['categoryEdit'],
        'image' => $oldImgImp,
        'description' => $_POST['descriptionEdit'],

    ];

    if ($dbh->updateProject($info)) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Project Successfully Updated.'
        ));
    }else{
        echo json_encode(array(
            "status" => 'error',
            "msg" => 'There was a problem Uploading, Please try again.'
        ));
    }
}
