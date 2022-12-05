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
                <div class="" style="background-color:#343a40;">
                    <div class="mt-4 mb-2 mx-3 rounded" style="height: 20px; width: 30px; background-color:#495057;"></div>
                    <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 50px; width: 700px; background-color:#495057;"></div>
                    <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 20px; width: 500px; background-color:#495057;"></div>
                    <div class="mt-2 mb-4 mx-3 rounded-4" style="height: 20px; width: 500px; background-color:#495057;"></div>
                </div>
            </div>

            <div class="card">
                <div class="card-body" style="background-color:#f8f9fa;">
                    <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 20px; width: 500px; background-color:#e9ecef;"></div>
                    <div class="mt-2 mb-2 mx-3 rounded-4" style="height: 70px; width: 1000px; background-color:#e9ecef;"></div>
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
                    <button type="submit" class="btn btn-primary" id="addBtn">
                        Add Employee
                        <span class="spinner-border spinner-border-sm" id="addSpinner" role="status"></span>
                    </button>
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