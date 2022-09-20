<?php
include ("../include/dbh.inc.php");
$dbh = new dbHandler;

if(isset($_POST["getAllMaterial_req"])) {
    echo json_encode((array)$dbh->getAllMaterials());
    
}