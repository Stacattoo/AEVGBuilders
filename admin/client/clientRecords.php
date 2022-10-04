<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();
$userData = $dbh->getAllClientInfoByID($_POST['id']);
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<div class="card mb-2">
    <div class="card-body">
        <div class="d-flex justify-content-between">
        <h5 class="card-subtitle text-muted align-bottom m-0"><?php echo " " ?></h5>
            <div class="dropdown m-0">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="edit" data-bs-toggle="modal" href="#editModal" data-id="<?php echo $userData->id; ?>">Edit</a></li>
                    <li><a class="dropdown-item" id="delete" data-bs-toggle="modal" href="#deleteModal" data-id="<?php echo $userData->id; ?>">Delete</a></li>
                </ul>
            </div>
        </div>
        <h1><?php echo $userData->fullname; ?></h1>
        <div>Email Address: <a href="mailto:<?php echo $userData->email; ?>" class="fw-bolder"><?php echo $userData->email; ?></a></div>
        <div>Contact Number: <span class="fw-bolder"><?php echo $userData->contactNo; ?></span></div>
        <div>Address: <span class="fw-bolder"><?php echo $userData->address; ?></span></div>
        <div>Assigned Employee: <span class="fw-bolder"></span></div>
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


<script>
    $(document).ready(function() {
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
                    console.log(response);
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
                    console.log(response);
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
            console.log($(this));
            $("#viewTestResult").modal('show');
            // $id = $(this).closest('tr').children('td:eq(0)').text();
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
