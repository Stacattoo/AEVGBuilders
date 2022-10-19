<script src="../client/client.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<div class="container-fluid">
    <h3><i class="fal fa-user-alt me-2 mx-4"></i>Clients</h3>
    <hr>
    <div class="row g-2">
        <div class="col-4 mx-4">
            <input type="search" name="search" id="search" class="form-control mb-2" placeholder="Search">

            <ul class="nav nav-pills mt-3 mb-3">
                <li class="nav-item">
                    <button type="button" id="listBtn" class="nav-link active" aria-current="page">Clients</button>
                </li>
                <li class="nav-item">
                    <button type="button" id="pendingBtn" class="nav-link" aria-current="page">Pending</button>
                </li>
            </ul>
            <div id="list" class="list-group"></div>
            <div id="pending" class="list-group"></div>
        </div>
        <div id="records" class="col"></div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $("#list").show();
        $("#pending").hide();
        displayApproveClient();
        displayPendingClient();
       
        $("#listBtn").click(function() {
            $(this).addClass("active");
            $("#pendingBtn").removeClass("active");
            $("#list").show();
            $("#pending").hide();
        });

        $("#pendingBtn").click(function() {
            $(this).addClass("active");
            $("#listBtn").removeClass("active");
            $("#pending").show();
            $("#list").hide();
        });

        $("#search").change(function(e) {
            e.preventDefault();
            displayUsers($(this).val());
        });


    });
</script>