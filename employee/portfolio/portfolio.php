<?php
include("../include/dbh.employee.php");
$dbh = new dbHandler;
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="../portfolio/portfolio.js"></script>
<div class="container-fluid">
    <h3><i class="fad fa-calendar-alt bi me-2"></i></i>Portfolio</h3>
    <hr>
    <div class="row g-2">
        <div class="col-4 mx-4">
            <input type="search" name="search" id="search" class="form-control mb-2" placeholder="Search">

            <ul class="nav nav-pills mt-3 mb-3">
                <li class="nav-item">
                    <button type="button" id="listBtn" class="nav-link fs-5" aria-current="page">List of Clients</button>
                </li>
                <!-- <li class="nav-item">
                    <button type="button" id="pendingBtn" class="nav-link" aria-current="page">Pending</button>
                </li> -->
            </ul>
            
            <div id="list" class="list-group"></div>
            <!-- <div id="pending" class="list-group"></div> -->
        </div>
        <div id="records" class="col">
            <div class="card mb-2  rounded-3">
                <div class="card-body rounded-3" style="background-color:#f8f9fa;">
                    <div class="mb-2 mx-3 rounded-4" style="height: 30px; width: 400px; background-color:#e9ecef;"></div>
                    <hr>
                    <div class="d-flex align-items-baseline text-end justify-content-start mb-4">
                        <div class="mb-2 mx-3 rounded-4" style="height: 80px; width: 500px; background-color:#e9ecef;"></div>
                    </div>
                    <div class="d-flex align-items-baseline text-end justify-content-end mb-4">
                        <div class="mb-2 mx-3 rounded-4" style="height: 70px; width: 500px; background-color:#e9ecef;"></div>
                    </div>
                    <div class="mb-2 mx-3 rounded-4" style="height: 90px; width: 300px; background-color:#e9ecef;"></div>
                    <div class="d-flex align-items-baseline text-end justify-content-end mb-1">
                        <div class="mb-2 mx-3 rounded-4" style="height: 100px; width: 500px; background-color:#e9ecef;"></div>
                    </div>
                    <div class="d-flex align-items-baseline text-end justify-content-end mb-4">
                        <div class="mb-2 mx-3 rounded-4" style="height: 40px; width: 300px; background-color:#e9ecef;"></div>
                    </div>
                    <div class="mb-2 mx-3 rounded-4" style="height: 100px; width: 600px; background-color:#e9ecef;"></div>
                    <div class="d-flex align-items-baseline text-end justify-content-center mb-1">
                        <div class=" mt-4 rounded-4" style="height: 30px; width: 900px; background-color:#e9ecef;"></div>
                        <div class=" mt-4 rounded-2" style="height: 20px; width: 30px; background-color:#e9ecef;"></div>
                        <div class=" mt-4 mx-2 rounded-2" style="height: 20px; width: 30px; background-color:#e9ecef;"></div>
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
            messageClient($(this).val());
            generalClient($(this).val());
        });

        $("#listBtn").click(function() {
            $(this).addClass("active");
            $("#pendingBtn").removeClass("active");
            $("#list").show();
            $("#pending").hide();
            messageClient();
            generalClient();


            $("#listBtn").click(function() {
                $(this).addClass("active");
                $("#pendingBtn").removeClass("active");
                $("#list").show();
                $("#pending").hide();
            });


        });
    });