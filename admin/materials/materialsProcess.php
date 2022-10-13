<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler;

// if(isset($_POST['displayMaterials'])){
//     echo json_encode((array)$dbh->getAllMaterials());
// }

if ($dbh->checkIfSomeAlrExist($_POST['code'], 'material', 'code')) {

    echo json_encode(array(
        "status" => 'error',
        'msg' => "Product Already Exist!"
    ));
} else {

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        $img_path = "../../images/" . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $img_path)) {
            echo json_encode(array(
                "status" => 'error',
                "msg" => 'There was a problem Uploading, Please try again.'
            ));
        }
        $info = (object) [
            'code' => $_POST['code'],
            'name' => $_POST['name'],
            'image' => $img_path,
            'category' => $_POST['category'],
            'description' => $_POST['description'],
            'stock' => $_POST['stock']

        ];

        if ($dbh->uploadProduct($info)) {
            echo json_encode(array(
                "status" => 'success',
                "msg" => 'Product Successfully Uploaded.'
            ));
        }
    }
}
