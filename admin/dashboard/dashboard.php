<?php
include("../include/dbh.admin.php");
$dbh = new dbHandler;
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="project/project.js"></script>


<div class="container-fluid ">
    <div class="d-flex justify-content-between mx-4">
        <h3><i class="fal fa-chart-line me-2"></i></i>Dashboard</h3> 
    </div>
    <hr>
    <div class="container-fluid">
        <div class="container mt-5">
            <div id="projects" class="row row-cols-2 row-cols-sm-2 row-cols-md-4 g-4">


            </div>
        </div>

    </div>
</div>

