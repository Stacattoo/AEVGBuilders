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
    <div class="form-container text-center p-5">
        <div class="display-1 mb-5">
        <h4>AEVG BUILDERS</h4>
        <h4>LOGIN</h4>
        </div>
        <form id="loginForm">
            <input type="text" class="form-control mt-5" name="email" placeholder="Email">
            <input type="text" class="form-control mt-2" name="password" placeholder="Password">
            <button type="submit" class="btn btn-primary form-control mt-3">Login</button>
            <div class="d-flex justify-content-evenly mt-4">
                <a href="">Forgot Password?</a>
                <a href="../register/register.php">Create an Account</a>
            </div>
        </form>

    </div>
</body>

</html>