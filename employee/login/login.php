<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="login.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="login.js"></script>
</head>

<body>
        <div class="row h-100 d-flex align-items-center mx-0">
            <div class="col-md-7  offset-1 ">
            
                <h1 class="display-1 text-light">Affordable homes in thriving communities</h1>
        
            </div>
            <div class="col-md-4 ">

                <div class="form-container  glass-effect text-center p-5">
                    <div class="display-4 mb-5">
                        <div>AEVG BUILDERS</div>
                        <h5>EMPLOYEE LOGIN</h5>
                    </div>
                    <form id="loginForm">
                        <input type="text" class="form-control mt-5" name="email" placeholder="Email">
                        <input type="password" class="form-control mt-2" name="password" placeholder="Password">
                        <div class="alert alert-danger mt-2" role="alert" id="alertError">
                        </div>
                        <button type="submit" class="btn btn-dark form-control mt-3">Login</button>
                        <div>
                            <button class="mt-3 btn btn-link text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot Password?</button>
                        </div>

                    </form>

                </div>


        </div>



    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="forgotPasswordForm">
                    <div class="modal-body">
                        <p>Enter your <span class="text-primary fw-bold">REGISTERED EMAIL</span></p>
                        <p>We will send to your new password to your email.</p>
                        <input type="email" name="fpEmail" id="fpEmail" class="form-control" placeholder="Registered Email" required>
                        <div class="alert alert-danger my-1" role="alert" id="errorAlertFP">
                            You have entered unregistered email address!
                        </div>
                        <div class="alert alert-success my-1" role="alert" id="successAlertFP">
                            Your new password has been sent to your email address
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="forgotbtn">
                            Send Email
                            <div id="fPSpinner" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>