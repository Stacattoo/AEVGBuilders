<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();

if(isset($_POST['displayMaterials'])){
    echo json_encode((array)$dbh->getAllMaterials());
}


?>