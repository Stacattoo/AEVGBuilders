<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Log-in</title>
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="login.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script src="login.js"></script>
    <script src="../forgotPassword/forgot.js"></script>

</head>

<body>
    <main class="d-flex align-items-center vh-100">
        <div class="form-container py-5 px-5 m-auto">
            <form id="loginForm">
                <div class="mb-3 text-center">
                    <!-- <i class="fas fa-user-plus display-5 mb-2"></i> -->
                    <h5 class="fw-normal">Admin Login</h5>
                    <h5 class="fw-bolder">ADMIN</h5>
                </div>
                <hr>
                <div class="mx-3">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-lg" name="email" placeholder="name@example.com" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-0">
                        <input type="password" class="form-control form-control-lg" name="password" placeholder="example" required>
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-link text-decoration-none" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">
                            Forgot Password?
                        </button>
                        <div class="alert alert-danger my-1" role="alert" id="errorAlert">
                            {{ errorMessage }}
                        </div>
                        <button class="w-100 btn btn-lg btn-primary my-2" type="submit">
                            Sign in
                            <div id="registerSpinner" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </main>

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
                            <div id="fPSpinner" class="spinner-border spinner-border-sm" role="status">
                            </div>
                            <span id="send">Send Email</span>
                            <span id="load">Loading...</span>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>