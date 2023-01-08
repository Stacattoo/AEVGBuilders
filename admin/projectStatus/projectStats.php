<?php
include("../include/dbh.admin.php");
$dbh = new dbHandler;
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="projects/app.css">
<script src="projectStatus/projectStats.js"></script>
<!-- <script src="projects/app.js"></script> -->

<div class="container-fluid">
    <div class="d-flex justify-content-between mx-4">

        <h3><i class="fad fa-calendar-alt bi me-2"></i></i>Project Status</h3>
    </div>
    <hr>
</div>

<div id="tableContainer">
    <table class="table table-bordered table-striped" id="resultTable" cellspacing="0" cellpadding="5" border="1">
        <thead>
            <tr>
                <th scope="col">Client Name</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Status</th>
                <th scope="col">Transaction Date Started</th>
            </tr>
        </thead>
        <tbody id="projStatus">

        </tbody>

    </table>
</div>
<div id="output">

</div>