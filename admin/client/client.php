<script src="client/client.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<div class="container-fluid">
    <div class="d-flex justify-content-between mx-4">
        <h3><i class="fal fa-user-alt me-2"></i>Clients</h3>
    </div>
    <hr>
    <div class="row g-2 ">
        <div class="col-4 ">
            <input type="search" name="search" id="search" class="form-control mb-2 " placeholder="Search" >
            <div id="list" class="list-group sticky-top" style="background-color:#f8f9fa; height: 100vh; overflow:scroll;">

            </div>
        </div>
        <div id="records" class="col ">
            <div class="card mb-2 text-bg-dark rounded-3">
                <div class=" " style="background-color:#343a40;">
                    <div class="mt-4 mb-2 mx-3 rounded" style="height: 20px; width: 30px; background-color:#495057;"></div>
                    <div class=" mb-2 mx-3 rounded-4" style="height: 50px; width: 700px; background-color:#495057;"></div>
                    <div class=" mb-2 mx-3 rounded-4" style="height: 20px; width: 500px; background-color:#495057;"></div>
                    <div class=" mb-2 mx-3 rounded-4" style="height: 20px; width: 500px; background-color:#495057;"></div>
                    <div class=" mb-2 mx-3 rounded-4" style="height: 20px; width: 500px; background-color:#495057;"></div>
                    <div class=" mb-3 mx-3 rounded-4" style="height: 20px; width: 500px; background-color:#495057;"></div>
                </div>
            </div>
        </div>
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