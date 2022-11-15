<?php
include ("../include/dbh.inc.php");
$dbh = new dbHandler();
$dbh->canceledSched($_SESSION['id']);
header('Location: ../profile/profile.php');