<?php
include("../include/dbh.employee.php");
$dbh = new dbHandler;
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="../message/message.js"></script>
<div class="container-fluid">
    <h3><i class="fal fa-user-alt me-2 mx-4"></i>Message</h3>
    <hr>
    <div class="row g-2">
        <div class="col-4 mx-4">
            <input type="search" name="search" id="search" class="form-control mb-2" placeholder="Search">

            <ul class="nav nav-pills mt-3 mb-3">
                <li class="nav-item">
                    <button type="button" id="listBtn" class="nav-link active" aria-current="page">Clients</button>
                </li>
                <li class="nav-item">
                    <button type="button" id="pendingBtn" class="nav-link" aria-current="page">General Chat</button>
                </li>
            </ul>
            <div id="list" class="list-group"></div>
            <div id="pending" class="list-group"></div>
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

    <script>
        $(document).ready(function() {
            $("#list").show();
            // $("#pending").hide();
            messageClient();

            $("#search").change(function(e) {
                e.preventDefault();
                messageClient($(this).val());
            });

<<<<<<< Updated upstream

        });
    </script>


=======
<script>
    $(document).ready(function() {

        $("#list").show();
        $("#pending").hide();

        messageClient();
        generalClient();

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
            $("#pendingBtn").click(function() {
                $(this).addClass("active");
                $("#listBtn").removeClass("active");
                $("#pending").show();
                $("#list").hide();
>>>>>>> Stashed changes

            });

    <!-- <div class="col-sm-8 conversation">
        <div class="row heading">

            <div class="col-sm-8 col-xs-7 heading-name">
                <a class="heading-name-meta">John Doe
                </a>

            </div>
            <div class="col-sm-1 col-xs-1  heading-dot pull-right">
                <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
            </div>
        </div>


        <div class="row reply">
            <div class="col-sm-1 col-xs-1 reply-emojis">
                <i class="fa fa-smile-o fa-2x"></i>
            </div>
            <div class="col-sm-9 col-xs-9 reply-main">
                <textarea class="form-control" rows="1" id="comment"></textarea>
            </div>
            <div class="col-sm-1 col-xs-1 reply-recording">
                <i class="fa fa-microphone fa-2x" aria-hidden="true"></i>
            </div>
            <div class="col-sm-1 col-xs-1 reply-send">
                <i class="fa fa-send fa-2x" aria-hidden="true"></i>
            </div>
        </div>
    </div> -->