<?php
include("../include/dbh.employee.php");
$dbh = new dbHandler;
?>
<div class="container-fluid">
    <h3><i class="fad fa-file-alt bi me-2"></i></i>Reports</h3>
    <hr>
    <h5>List of Handled Clients</h5>
    <table class="table table-bordered table-striped" id="handledClientTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="handledClientContent">
            <!-- <tr>
            <td>$client->id</td>
            <td>$client->name</td>
            <td>$client->email</td>
            <td>$client->contact_no</td>
            <td>$client->status</td>
        </tr> -->
        </tbody>
    </table>

    <!-- activities modal -->
    <div class="modal fade" id="activitiesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ACTIVITY LOG</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="table" class="table table-sm table-hover">
                        <thead>
                            <tr id="first-tr">
                                <th>ACTIVITY</th>
                                <th>DATE AND TIME</th>
                            </tr>
                        </thead>
                        <tbody id="activities">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../reports/reports.js"></script>