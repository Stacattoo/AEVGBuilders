<?php
include("../include/dbh.employee.php");
$dbh = new dbHandler;
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="../portfolio/portfolio.js"></script>
<div class="container-fluid">
    <div class="d-flex justify-content-between mx-4">

        <h3><i class="fal fa-file-alt me-2"></i></i>Portfolio</h3>
        <!-- <button type="button" class="btn btn-dark" data-bs-target="#newProjectModal" data-bs-toggle="modal">New Project</button> -->
    </div>
    <hr>
    <div class="row g-2">
        <div class="col-4 mx-4">
            <input type="search" name="search" id="search" class="form-control mb-2" placeholder="Search">

            <h2 class="text-center mt-3 mb-4">List of Clients</h2>
            <div class="card mb-2 rounded-2 sticky-top" style="background-color:#f8f9fa; height: 100vh; overflow:scroll;">
                <div id="list" class="list-group"></div>
            </div>
            <!-- <div id="pending" class="list-group"></div> -->
        </div>
        <div id="records" class="col">
            <div class="card mb-2  rounded-3">
                <div class="card-body rounded-3 " style="background-color:#f8f9fa;">
                    <div class="d-flex justify-content-between">
                        <div class="mb-2 mx-3 rounded-4" style="height: 30px; width: 400px; background-color:#e9ecef;"></div>
                        <div class="mb-2 mx-3 " style="height: 40px; width: 200px; background-color:#e9ecef;"></div>
                    </div>
                    <hr>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mx-5">
                        <div class="col">
                        <div class="mb-2  rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                        <div class="col">
                        <div class="mb-2  rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                        <div class="col">
                        <div class="mb-2 rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                        <div class="col">
                        <div class="mb-2  rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                        <div class="col">
                        <div class="mb-2  rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                        <div class="col">
                        <div class="mb-2 rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {

        $("#list").show();
        portfolioDisplay();

        $("#search").change(function(e) {
            e.preventDefault();
            portfolioDisplay($(this).val());
            // generalClient($(this).val());
        });

        // $("#listBtn").click(function() {
        //     $(this).addClass("active");
        //     $("#pendingBtn").removeClass("active");
        //     $("#list").show();
        //     $("#pending").hide();
        //     messageClient();
        //     generalClient();


        //     $("#listBtn").click(function() {
        //         $(this).addClass("active");
        //         $("#pendingBtn").removeClass("active");
        //         $("#list").show();
        //         $("#pending").hide();
        //     });


        // });
    });