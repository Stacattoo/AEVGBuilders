<!-- <script src="../reports/reports.js"></script> -->
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

<script>
    $(document).ready(function() {
        // console.log("alert");
        var userid = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "../reports/reportProcess.php",
            data: {
                getHandledClients: true
            },
            dataType: "JSON",
            success: function(dataResult) {
                var content = ``;
                $.each(dataResult.clients, function(indexInArray, c) {
                    console.log(c);
                    content += `
                        <tr id="clientid" data-bs-toggle="modal" href="#activitiesModal" value="${c.id}">
                            <td>${c.id}</td>
                            <td>${c.name}</td>
                            <td>${c.email}</td>
                            <td>${c.contact_no}</td>
                            <td>${c.status}</td>
                        </tr>
                    `;
                });
                $("#handledClientContent").html(content);

                //function pag ciniclick si table, nailaw.
                $('#table tr').click(function() {

                    $(this).find('td input:radio').prop('checked', true);
                    $('#table tr').removeClass("table-primary");
                    $(this).addClass("table-primary");
                })
            }
        });

    });
</script>