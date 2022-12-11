<?php
include_once("../include/dbh.employee.php");
$dbh = new dbHandler;
?>

<script src="../client/client.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<div class="container-fluid">
    <h3><i class="fal fa-user-alt me-2 mx-4"></i>Clients</h3>
    <hr>
    <div class="row g-2">
        <div class="col-4 px-4">
            <input type="search" name="search" id="search" class="form-control mb-2" placeholder="Search">

            <ul class="nav nav-pills mt-3 mb-3">
                <li class="nav-item">
                    <button type="button" id="listBtn" class="nav-link active" aria-current="page">Clients</button>
                </li>
                <li class="nav-item">
                    <button type="button" id="pendingBtn" class="nav-link" aria-current="page">Pending</button>
                </li>
            </ul>

            <div class="card mb-2 rounded-2 sticky-top" style="background-color:#f8f9fa; height: 100vh; overflow:scroll;">
                <div id="list" class="list-group"></div>
            </div>

        </div>
        <div id="records" class="col-8">
            <div class="card mb-2  rounded-5">
                <div class="card-body text-white rounded-3" style="background-color:#343a40;">
                    <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 90%; background-color:#495057;"></div>
                    <div class="mb-2 mx-3 rounded-4" style="height: 20px; width: 500px; background-color:#495057;"></div>
                    <div class="mb-2 mx-3 rounded-4" style="height: 20px; width: 300px; background-color:#495057;"></div>
                    <div class="mb-2 mx-3 rounded-4" style="height: 20px; width: 600px; background-color:#495057;"></div>
                    <div class=" mb-2 mx-3 rounded-4" style="height: 20px; width: 400px; background-color:#495057;"></div>
                </div>
            </div>
            <div class="card mt-2 rounded-4">

                <div class="card-body rounded-4" style="background-color:#f8f9fa;">

                    <div class="mt-2  mx-3 rounded-4" style="height: 30px; width: 400px; background-color:#e9ecef;"></div>


                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 30px; width: 300px; background-color:#e9ecef;"></div>
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 90%; background-color:#e9ecef;"></div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 90%; background-color:#e9ecef;"></div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 90%; background-color:#e9ecef;"></div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 80%; background-color:#e9ecef;"></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 80%; background-color:#e9ecef;"></div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-9">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 600px; background-color:#e9ecef;"></div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 30px; width: 100px; background-color:#e9ecef;"></div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 80%; background-color:#e9ecef;"></div>

                            </div>
                            <div class="col-sm-6">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 80%; background-color:#e9ecef;"></div>

                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 80%; background-color:#e9ecef;"></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 80%; background-color:#e9ecef;"></div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 80%; background-color:#e9ecef;"></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 40px; width: 80%; background-color:#e9ecef;"></div>
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
            $("#pending").hide();
            displayClient('active');
            $("#listBtn").click(function() {
                $(this).addClass("active");
                $("#pendingBtn").removeClass("active");
                displayClient('active');
            });
            $("#pendingBtn").click(function() {
                $(this).addClass("active");
                $("#listBtn").removeClass("active");
                displayClient('pending');
            });
            $("#search").change(function(e) {
                e.preventDefault();
                displayClient($(this).val());
            });
        });
    </script>