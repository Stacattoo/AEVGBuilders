<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();

if (isset($_POST['displayBlockedUser'])) {
    echo json_encode((array)$dbh->getAllBlocked());
}
if (isset($_POST['unblock'])) {
    $dbh->updateStatustoUnblock($_POST['unblock']);
}
?>
