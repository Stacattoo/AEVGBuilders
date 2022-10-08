<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler;

// $trimmed_array = "";
// echo json_decode($_POST['imageEditStore'], true);
// $array = array($_REQUEST);
print_r($_POST);
// if (isset($_FILES['imageEdit']['name']) && $_FILES['imageEdit']['name'] != '') {
//     $imageCount = count($_FILES['imageEdit']['name']);
//     $paths = "";
//     for ($i = 0; $i < $imageCount; $i++) {
//         $file_name = $_FILES['imageEdit']['name'][$i];
//         $file_tmp = $_FILES["imageEdit"]["tmp_name"][$i];
//         $img_path = "image/" . basename($file_name);
//         $paths .= $img_path . ",";
//         if (!move_uploaded_file($file_tmp, $img_path)) {
//             // echo json_encode(array(
//             //     "status" => 'error',
//             //     "msg" => 'There was a problem Uploading, Please try again.'
//             // ));
//             echo "error";
//         }
//     }

//     $array = trim($paths, ",");
//     $trimmed_array = $array + array_values($_GET['imageEditStore']);
// } else {
//     $trimmed_array = $_GET['imageEditStore'];
// }

// if (isset($_POST['title'])) {
//     //echo "asd";
//     $info = (object) [
//         'id' => $_GET['hiddenId'],
//         'title' => $_POST['title'],
//         'category' => $_POST['categoryEdit'],
//         'image' => $trimmed_array,
//         'description' => $_POST['descriptionEdit'],

//     ];


//     if ($dbh->updateProject($info, $info->id)) {
//         echo json_encode(array(
//             "status" => 'success',
//             "msg" => 'Project Successfully Updated.'
//         ));
//     }
// }
