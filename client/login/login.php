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
    <div class="row h-100 d-flex align-items-center">
        <div class="col-md-7  offset-1 ">

            <h1 class="display-1 text-light">Affordable homes in thriving communities</h1>

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
                        <a href="../forgotPassword/forgotPassword.php"  class="mt-3 btn btn-link text-dark text-decoration-none">Forgot Password?</a>
                        <a href="../register/register.php"  class="mt-3 btn btn-link text-dark text-decoration-none">Create an Account</a>
                    </div>
                    

                </form>

            </div>


        </div>

        
</body>

</html>