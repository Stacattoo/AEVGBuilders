<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler();
$userData = $dbh->getAllInfoByID($_POST['STUDENT_ID']);
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<div class="card mb-2">
    <div class="card-body text-white" style="background-color:#343a40;">
        <div class="d-flex justify-content-between">

            <div class=" m-0">
                <!-- <button class="border-0  btn btn-outline-light" type="button" id="edit" href="#editEmployeeModal" data-id="<?php echo $userData->id; ?>">
                    <i class="fas fa-edit fs-5"></i>
                </button>
                <button class=" border-0  btn btn-outline-light" type="button" id="delete" href="#removeEmployeeModal" data-id="<?php echo $userData->id; ?>">
                    <i class="fas fa-trash fs-5"></i>
                </button> -->

            </div>
        </div>


        <h5 class="card-subtitle text-muted align-bottom m-0" id="empStatusID"><?php echo $userData->id; ?></h5>
        <h1 class="text-capitalize"><?php echo $userData->fullName; ?></h1>
        <div class="row">
            <div class="col-8">
                <div>Email: <a href="mailto:<?php echo $userData->email; ?>" class="fw-bolder text-white"><?php echo $userData->email; ?></a></div>
                <div>Address: <span class="fw-bolder text-capitalize"><?php echo $userData->address; ?></span></div>
            </div>
            <div class="col-4">

                <div>Client Status: <strong id="statusId"><?php echo $userData->status; ?></strong></div> <!-- dito yung status grr -->
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" id="statusId" type="button" data-bs-toggle="dropdown" aria-expanded="false">Choose Status</button> <!-- dito dapat magdisplay kung resigned or active -->
                    <ul class="dropdown-menu">
                        <li><button type="button" class="dropdown-item statusBtn" data-status="Active">Active</button></li>
                        <li><button type="button" class="dropdown-item statusBtn" data-status="Resigned">Resigned</button></li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-body" style="background-color:#f8f9fa;">
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
                <?php
                foreach ($userData->clients as $client) {
                    echo "
                            <tr>
                                <td>$client->id</td>
                                <td>$client->name</td>
                                <td>$client->email</td>
                                <td>$client->contact_no</td>
                                <td>$client->status</td>
                            </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- DELETE EMPLOYEE MODAL -->
<div class="modal fade py-5" tabindex="-1" id="removeEmployeeModal">
    <div class="modal-dialog">
        <div class="modal-content rounded-3">
            <div class="modal-body p-4 text-center">
                <h5 class="">Remove Employee</h5>
                <p class="mb-1">Are you sure you want to remove this employee?</p>
            </div>
            <div class="modal-footer flex-nowrap p-0">
                <button type="button" id="remove-yes-btn" data-id="<?php echo $userData->id; ?>" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Yes</strong></button>
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Employee Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editEmployeeLabel">Edit Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editEmployeeForm">
                <input type="hidden" name="edit-id" value="<?php echo $userData->id; ?>">
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="edit-firstName" class="form-label">*First Name</label>
                                <input type="text" class="form-control" id="edit-firstName" name="edit-firstName" value="<?php echo $userData->firstName; ?>" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="edit-middleName" class="form-label">Middle Initial</label>
                                <input type="text" class="form-control" id="edit-middleName" name="edit-middleName" value="<?php echo $userData->middleName; ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="edit-lastName" class="form-label">*Last Name</label>
                                <input type="text" class="form-control" id="edit-lastName" name="edit-lastName" value="<?php echo $userData->lastName; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="edit-email" class="form-label">*Email</label>
                                <input type="email" class="form-control" id="edit-email" name="edit-email" value="<?php echo $userData->email; ?>" required email>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="edit-contactNo" class="form-label">*Contact Number</label>
                                <input type="text" class="form-control" id="edit-contactNo" name="edit-contactNo" value="<?php echo $userData->contactNo; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div>Home Address</div>
                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="edit-houseNo" name="edit-houseNo" value="<?php echo $userData->houseNo; ?>" placeholder="House No">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="edit-street" name="edit-street" value="<?php echo $userData->street; ?>" placeholder="Street">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="edit-barangay" name="edit-barangay" value="<?php echo $userData->barangay; ?>" placeholder="Barangay">
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="edit-municipality" name="edit-municipality" value="<?php echo $userData->municipality; ?>" placeholder="Municipality">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="edit-province" name="edit-province" value="<?php echo $userData->province; ?>" placeholder="Province">
                            </div>
                        </div>
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
        $("#remove-yes-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "employee/employeeProcess.php",
                data: {
                    REMOVE_EMPLOYEE_REQ: id
                },
                dataType: "JSON",
                success: function(REMOVE_EMPLOYEE_RESP) {
                    if (REMOVE_EMPLOYEE_RESP) {
                        displayUsers();
                        $("#removeEmployeeModal").modal("hide");
                    } else {
                        $("#error").html(REMOVE_EMPLOYEE_RESP.msg);
                    }
                },
                error: function(response) {
                    $("#error").html(response.responseText);
                }
            });
        });

        $("#editEmployeeModal").on("hide.bs.modal", function() {
            $("#editEmployeeForm").trigger("reset");
            $("#errorAlert").hide();
        })

        $("#editEmployeeForm").submit(function(e) {
            e.preventDefault();
            var data = $(this).serializeArray(); // Form Data
            data.push({
                name: 'EDIT_EMPLOYEE_REQ',
                value: true
            });
            $.ajax({
                type: "POST",
                url: "employee/employeeProcess.php",
                data: data,
                dataType: "JSON",
                success: function(EDIT_EMPLOYEE_RESP) {
                    if (EDIT_EMPLOYEE_RESP) {
                        displayUsers();
                        $("#editEmployeeModal").modal("hide");
                    } else {
                        $("#error").html(EDIT_EMPLOYEE_RESP.msg);
                    }
                },
                error: function(response) {
                    $("#error").html(response.responseText);
                }
            });
        });
    });
</script>