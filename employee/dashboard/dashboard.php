<?php
include("../include/dbh.employee.php");
$dbh = new dbHandler;
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<div class="container-fluid">
    <h3><i class="fal fa-analytics me-2"></i>Projects</h3>
    <hr>
    <div class="container-fluid">
        <form id="uploadMaterials">
            <input type="text" class="" name="title" placeholder="title">
            <input type="text" class="" name="name" placeholder="name">
            <input type="text" class="" name="name" placeholder="name">
        </form>
    </div>

</div>
<script src="dashboard/dashboardChart.js"></script>
<script src="dashboard/dashboard.js"></script>
<script src="include/moment.js"></script>