<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();

if (isset($_POST['getClients'])) {
    echo json_encode((array) $dbh->getAllClients());
} elseif (isset($_POST['getTop5Reaction'])) {
    echo json_encode((array) $dbh->getTop5Reaction());
} elseif (isset($_POST['getProjects'])) {
    echo json_encode((array) $dbh->countAllProjects());
} elseif (isset($_POST['getRegisteredUsers'])) {
    echo json_encode((array) $dbh->getAllUserClientData());
} elseif (isset($_POST['getEmployees'])) {
    echo json_encode((array) $dbh->getAllUserData());
} elseif (isset($_POST['getClientsFeedback'])) {
    echo json_encode((array) $dbh->getFeedback());
} elseif (isset($_POST['changeClientsFeedback'])) {
    echo json_encode((array) $dbh->approveFeedback($_POST['feedbackId']));
} elseif (isset($_POST['getPendingProjects'])) {
    echo json_encode((array) $dbh->getPendingProjects());
} elseif (isset($_POST['approveProjects'])) {
    echo json_encode((array) $dbh->approveProjects($_POST['projectId']));
} elseif (isset($_POST['disapprovedProjects'])) {
    echo json_encode((array) $dbh->disapprovedProjects($_POST['projectId2']));
}
