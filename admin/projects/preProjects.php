<?php
include("../include/dbh.admin.php");
$dbh = new dbHandler;
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<link rel="stylesheet" type="text/css" href="projects/app.css">
<script src="projects/preProject.js"></script>
<!-- <script src="projects/app.js"></script> -->

<div class="container-fluid">
    <div class="d-flex justify-content-between mx-4">

        <h3><i class="fal fa-city me-2"></i></i>Pre-Posted Projects</h3>
        <!-- <button type="button" class="btn btn-dark" data-bs-target="#newProjectModal" data-bs-toggle="modal">New Project</button> -->
    </div>
    <hr>
    <div class="container-fluid">
        <div class="container mt-5">
            <div id="preprojects" class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-4">
            </div>
        </div>

    </div>
</div>