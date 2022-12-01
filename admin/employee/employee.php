<script src="employee/employee.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<div class="container-fluid">
    <div class="d-flex justify-content-between mx-4">
        <h3><i class="fal fa-user-alt me-2"></i>Employee</h3>
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="fal fa-user-plus"></i> Add Employee</button>
    </div>
    <hr>
    <div id="error" class="alert alert-danger d-none py-1"></div>
    <div class="row g-2">
        <div class="col-4">
            <input type="search" name="search" id="search" class="form-control mb-2" placeholder="Search">
            <div id="list" class="list-group">

            </div>
        </div>
        <div id="records" class="col">
            <div class="card mb-2   ">
                <div class="card-body text-white" style="background-color:#343a40;">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-subtitle text-muted align-bottom m-0"></h5>
                        <div class="dropdown m-0">
                            <button class="btn text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" id="edit" data-bs-toggle="modal" href="#editEmployeeModal">Edit</a></li>
                                <li><a class="dropdown-item" id="delete" data-bs-toggle="modal" href="#removeEmployeeModal">Delete</a></li>
                            </ul>
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addEmployeeLabel">Add Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addEmployeeForm">
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="add-firstName" class="form-label">*First Name</label>
                                <input type="text" class="form-control" id="add-firstName" name="add-firstName" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="add-middleName" class="form-label">Middle Initial</label>
                                <input type="text" class="form-control" id="add-middleName" name="add-middleName">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="add-lastName" class="form-label">*Last Name</label>
                                <input type="text" class="form-control" id="add-lastName" name="add-lastName" required>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="add-email" class="form-label">*Email</label>
                                <input type="email" class="form-control" id="add-email" name="add-email" required email>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="add-contactNo" class="form-label">*Contact Number</label>
                                <input type="text" class="form-control" id="add-contactNo" name="add-contactNo" required>
                            </div>
                        </div>
                    </div>

                    <div>Home Address</div>
                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="add-houseNo" name="add-houseNo" placeholder="House No">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="add-street" name="add-street" placeholder="Street">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="add-barangay" name="add-barangay" placeholder="Barangay">
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="add-municipality" name="add-municipality" placeholder="Municipality">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="add-province" name="add-province" placeholder="Province">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Employee</button>
                </div>
            </form>
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