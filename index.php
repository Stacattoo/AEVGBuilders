<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="client/include/style.css"> <!--  -->
    <link rel="stylesheet" href="client/login/login.css"> <!--  -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="client/login/login.js"></script> <!--  -->
</head>

<body>
    <div class="row h-100 d-flex align-items-center mx-0">
        <div class="col-md-7  offset-1 ">

        </div>
        <div class="col-md-4 ">

            <div class="form-container  glass-effect text-center p-5">
                <div class="display-4 mb-5">
                    <div>AEVG BUILDERS</div>
                    <h5> LOGIN</h5>
                </div>
                <form id="loginForm">
                    <input type="text" class="form-control mt-5" name="email" placeholder="Email">
                    <input type="password" class="form-control mt-2" name="password" placeholder="Password">
                    <div class="alert alert-danger mt-2" role="alert" id="alertError">
                    </div>
                    <button type="submit" class="btn btn-dark form-control mt-3">Login</button>
                    <div class="d-flex justify-content-evenly mt-4">
                        <button class="mt-3 btn btn-link text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot Password?</button>
                        <a href="client/register/register.php" class="mt-3 btn btn-link text-dark text-decoration-none">Create an Account</a>
                    </div>
                </form>
            </div>
        </div>


        <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h1 class="fw-bold mb-0 fs-2">Forgot Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5 pt-0">

                        <div class="    text-center p-5">
                            <form id="forgotPassForm">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control rounded-3" name="email" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                    <div class="alert alert-danger mt-2" role="alert" id="alertErrorfp"> </div>
                                    <div class="alert alert-success mt-2" role="alert" id="alertSuccess">
                                        A new password was successfully sent on your email.
                                        <a href="client/login/login.php">Login</a>
                                    </div>
                                </div>

                                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" id="forgotBtn">

                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span>
                                    <span id="load">Loading...</span>
                                    <span id="send">Send Email</span>
                                </button>


                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</body>

</html>