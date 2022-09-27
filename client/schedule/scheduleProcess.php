<?php
include("../include/dbh.inc.php");
$dbh = new dbHandler;

if (isset($_POST['dateChanged'])) {
    //echo $dbh->checkSched($_POST['date']);
    echo json_encode((array)$dbh->checkSched($_POST['date']));

} else {
    $sched = (object)[
        'id' => $_SESSION['id'],
        'dateTime' => $_POST['date'] . " " . $_POST['time'],
        'reason' => $_POST['reason']
    ];
    $dbh->insertSchedule($sched);

    // if ($sched->dateTime !== $dbh->checkSched($id, 'dateTime')) {
    //     echo json_encode(array(
    //         "status" => "success",
    //         "msg" => "Schedule Success"
    //     ));
    //     $dbh->insertSchedule($id,$sched->dateTime);
    // }else{
    //     echo json_encode(array(
    //         "status" => "error",
    //         "msg" => "Time is Already Taken"
    //     ));
    // }

}
