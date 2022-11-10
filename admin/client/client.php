<script src="client/client.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<div class="container-fluid">
    <div class="d-flex justify-content-between mx-4">
        <h3><i class="fal fa-user-alt me-2"></i>Clients</h3>
    </div>
    <hr>
    <div class="row g-2 ">
        <div class="col-4 ">
            <input type="search" name="search" id="search" class="form-control mb-2 " placeholder="Search">
            <div id="list" class="list-group "></div>
        </div>
        <div id="records" class="col "></div>
    </div>

</div>

<script>
    $(document).ready(function() {
        displayUsers();
        $("#search").change(function(e) {
            e.preventDefault();
            displayUsers($(this).val());
        });

    });
</script>