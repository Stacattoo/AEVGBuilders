<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();
$userData = $dbh->getAllClientInfoByID($_POST['id']);
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<div class="card mb-2 text-bg-dark rounded-3">
    <div class="card-body text-white" style="background-color:#343a40;">
        <div class="d-flex justify-content-between ">
            <h5 class="card-subtitle text-muted align-bottom m-0"><?php echo $userData->id ?></h5>
            <div class="m-0">
                <button class=" border-0  btn btn-outline-light" type="button" id="delete" href="#removeEmployeeModal" data-id="<?php echo $userData->id; ?>">
                    <i class="fas fa-trash fs-5"></i>
                </button>
                <button class="border-0  btn btn-outline-light" type="button" id="edit" href="#editEmployeeModal" data-id="<?php echo $userData->id; ?>">
                    <i class="fas fa-edit fs-5"></i>
                </button>
            </div>
        </div>
        <h1><?php echo $userData->fullname; ?></h1>
        <div>Email Address: <a href="mailto:<?php echo $userData->email; ?>" class="text-reset fw-bolder"><?php echo $userData->email; ?></a></div>
        <div>Contact Number: <span class="fw-bolder"><?php echo $userData->contactNo; ?></span></div>
        <div>Address: <span class="fw-bolder"><?php echo $userData->address; ?></span></div>
        <div>Assigned Employee: <span class="text-reset fw-bolder">
                <?php if ($userData->employeeName == "") {
                    echo '<a id="choose" data-bs-toggle="modal" class="text-warning" href="#chooseModal">Choose an Employee </a>';
                } else {
                    echo $userData->employeeName;
                } ?></span></div>
    </div>
</div>

<!-- EDIT Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm">

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="1234" required>
                        <label for="firstName">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="middleName" name="middleName" placeholder="1234">
                        <label for="middleName">Middle Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="1234" required>
                        <label for="lastName">Last Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="1234" email required>
                        <label for="email">Emaill Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="1234" required>
                        <label for="contact">Contact Number</label>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- choose modal -->
<div class="modal fade" id="chooseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Choose Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="table" class="table table-sm table-hover">
                    <thead>
                        <tr id="first-tr">
                            <th>Select</th>
                            <th>ID</th>
                            <th>Employee Name</th>
                        </tr>
                    </thead>
                    <tbody id="chooseEmployee">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="chooseBtn" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {


        $.ajax({
            type: "POST",
            url: "client/clientProcess.php",
            data: {
                getEmployee: true
            },
            dataType: "JSON",
            success: function(response) {
                var content = ``;
                $.each(response, function(i, val) {
                    content += `
                    <tr>
                            <td><input type="radio" id="empChoose" value="${val.id}" name="select"></td>
                            <td>${val.id}</td>
                            <td>${val.fullName}</td>
                            

                        </tr>
                    `;
                });
                $('#chooseEmployee').html(content);

                $('#table tr').click(function() {

                    $(this).find('td input:radio').prop('checked', true);
                    $('#table tr').removeClass("table-primary");
                    $(this).addClass("table-primary");
                })
            }
        });

        $("#chooseBtn").click(function(e) {
            e.preventDefault();
            var employeeID = $('input[name="select"]:checked').val();
            var clientID = <?php echo ($userData->id); ?>;

            $.ajax({
                type: "POST",
                url: "client/clientProcess.php",
                data: {
                    employeeID: employeeID,
                    clientID: clientID
                },
                dataType: "JSON",
                success: function(response) {
                }
            });
        });



        $("#errorAlert").hide();
        $("#edit").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $("#errorAlert").hide();
            $.ajax({
                type: "POST",
                url: "students/studentProcess.php",
                data: {
                    editUser: id
                },
                dataType: 'JSON',
                success: function(response) {
                    $("#id").val(response.id);
                    $("#studentno").val(response.studentno);
                    $("#firstName").val(response.firstName);
                    $("#middleName").val(response.middleName);
                    $("#lastName").val(response.lastName);
                    $("#email").val(response.email);
                    $("#contact").val(response.contact);
                    $("#strand").val(response.strand);
                },
                complete: function() {
                    $("#editModal").modal("show");
                }
            });

        });

        $("#editForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'students/studentProcess.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response) {
                        $.getScript("students/students.js", function(script) {
                            $("#editForm").trigger('reset');
                            $("#editModal").modal('hide');
                            displayUsers();
                        });
                    } else {
                        $("#errorAlert").show();
                    }
                },
                error: function(response) {
                }
            });
        });

        $("#delete").click(function(e) {
            e.preventDefault();
            if (confirm("Are you sure you want to delete this user?")) {
                var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "students/studentProcess.php",
                    data: {
                        deleteUser: id
                    },
                    success: function(response) {
                        if (response) {
                            $.getScript("students/students.js", function(script) {
                                displayUsers();
                            });
                        }
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        $('#resultTable').DataTable();
        $(".modal-btn").click(function() {
            $("#viewTestResult").modal('show');
            $date = $(this).closest('tr').children('td:eq(0)').text();
            $result = $(this).closest('tr').children('td:eq(1)').text();
            $q1 = $(this).closest('tr').children('td:eq(2)').text();
            $q2 = $(this).closest('tr').children('td:eq(3)').text();
            $("#date").html($date);
            $("#Q1").html($q1);
            $("#Q2").html($q2);
            $("#testresult").html($result);
        });
    });
</script>