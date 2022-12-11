<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler;

if (isset($_POST['getAllPortfolioClient'])) {
    echo json_encode((array)$dbh->getSpecificClientPortoflio($_SESSION['id']));

}
// var_dump($dbh->getSpecificClientPortoflio($_SESSION['id']));