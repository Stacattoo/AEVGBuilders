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
                    <button type="button" id="listBtn" class="nav-link active pe-none" tabindex="-1" aria-disabled="true">Clients</button>
                </li>
            </ul>
            <div id="list" class="list-group"></div>
        </div>
        <div id="records" class="col">
        <div class="bg-dark mb-2" style="height: 250px;"></div>
            <div class="bg-dark mb-2" style="height: 250px;"></div>
            <div class="bg-dark mb-2" style="height: 250px;"></div>
            
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


    });
</script>