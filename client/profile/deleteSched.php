<?php
include ("../include/dbh.inc.php");
$dbh = new dbHandler();
$dbh->deletedSched($_SESSION['id']);
header('Location: ../profile/profile.php');