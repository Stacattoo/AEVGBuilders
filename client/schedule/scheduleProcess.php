<?php
include("../include/dbh.inc.php");
$dbh = new dbHandler;

    $sched = (object)[
        'id' => $_SESSION['id'],
        'reason' => $_POST['reason']
    ];
    $dbh->insertSchedule($sched);

