<?php
include("../include/dbh.inc.php");
$dbh = new dbHandler;

// if(isset($_POST['reason'])){
    $sched = (object)[
        'id' => $_SESSION['id'],
        'reason' => $_POST['reason']
    ];
    echo $dbh->insertSchedule($sched);
// }
