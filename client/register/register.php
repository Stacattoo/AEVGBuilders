<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="register.js"></script>
</head>

<body>
    <div class="form-container text-center p-5">
        <div class="display-1 mb-2">
            <h4>AEVG BUILDERS</h4>
            <h4>Register</h4>
        </div>
        <form id="registerForm">
            <div class="d-flex justify-content-evenly">
                <input type="text" class="form-control mt-5" name="firstName" placeholder="First Name" required>
                <input type="text" class="form-control mt-5" name="middleName" placeholder="Middle Name (optional)">
                <input type="text" class="form-control mt-5" name="lastName" placeholder="Last Name" required>
            </div>
            <input type="text" class="form-control mt-2" name="username" placeholder="Username" required>
            <div class="d-flex justify-content-evenly">
                <input type="email" class="form-control mt-2" name="email" placeholder="Email" required>
                <input type="text" class="form-control mt-2" name="contact" placeholder="Contact Number" required>
            </div>
            <div class="d-flex justify-content-evenly">
                <input type="text" class="form-control mt-2" name="houseNo" placeholder="House No. (optional)">
                <input type="text" class="form-control mt-2" name="street" placeholder="Street (optional)">
                <input type="text" class="form-control mt-2" name="baranggay" placeholder="Baranggay" required>
            </div>
            <div class="d-flex justify-content-evenly">
                <input type="text" class="form-control mt-2" name="municipality" placeholder="Municipality" required>
                <input type="text" class="form-control mt-2" name="province" placeholder="Province" required>
            </div>
            <input type="password" class="form-control mt-2" name="password" placeholder="Password" required>
            <input type="password" class="form-control mt-2" name="confirmPassword" placeholder="Confirm Password" required>

            <div class="alert alert-danger" role="alert" id="alertError">
            </div>
            <div class="alert alert-success" role="alert" id="alertSuccess">
            </div>
            <button type="submit" class="btn btn-primary form-control mt-3">Sign Up</button>
            <div class="d-flex justify-content-evenly mt-4">
                <a href="../login/login.php">Already Have an Account?</a>
            </div>
        </form>

    </div>
</body>

</html>