<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="register.js"></script>
</head>

<body>

    <div class="row h-100 d-flex align-items-center mx-0">

        <div class="col-md-5 ">

            <div class="form-container  glass-effect text-center p-5">
                <div class="display-4 mb-1">
                    <div>AEVG BUILDERS</div>
                    <h5 class="mt-4"> Create an Account</h5>
                </div>
                <form id="registerForm">
                    <div id="">
                        <div id="step1">



                            <div class="d-flex flex-column mb-3">
                                <input type="text" class="form-control mt-5 p-2" name="firstName" placeholder="First Name" required>
                                <input type="text" class="form-control mt-2 p-2" name="middleName" placeholder="Middle Name (optional)">
                                <input type="text" class="form-control mt-2 p-2" name="lastName" placeholder="Last Name" required>
                                <input type="email" class="form-control mt-2" name="email" id="emailRegister" placeholder="Email" required>
                                <input type="text" class="form-control mt-2" name="contact" id="contactNo" minlength="11" maxlength="11" placeholder="Contact Number" required>
                                <div class="alert alert-danger mt-3" role="alert" id="alertErrorbtn1">
                                </div>
                                <div class="d-flex justify-content-evenly mt-4">
                                    <a href="../../index.php">Already Have an Account?</a>
                                </div>
                                <div class="d-flex justify-content-end mx-3 my-3 px-2">
                                    <button type="button" id="step1Btn" class="btn btn-outline-dark btn-sm ">Next <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div id="step2">
                            <div class="d-flex flex-column mb-3 mt-5">
                                <div class="row g-2">
                                    <div class="col ">
                                        <div class=" ">
                                            <input type="text" class="form-control mt-5" name="houseNo" placeholder="House No. (optional)">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class=" ">
                                            <input type="text" class="form-control mt-5" name="street" placeholder="Street (optional)">
                                        </div>
                                    </div>
                                </div>

                                <select name="province" class="form-select mt-1" id="province" required>
                                    <option selected disabled >Select Province</option>
                                </select>

                                <select name="municipality" class="form-select mt-1" id="municipality" required>
                                    <option value="">Select Municipality</option>
                                </select>

                                <input type="text" name="barangay" value="Barangay" class="form-control mt-1" id="barangay" required>

                                
                            </div>
                            <div class="d-flex justify-content-between ">
                                <button type="button" id="prev1Btn" class="btn btn-outline-dark btn-sm"><i class="fas fa-chevron-left"></i> Back</button>
                                <button type="button" id="step2Btn" class="btn btn-outline-dark btn-sm">Next <i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                        <div id="step3">

                            <div class="d-flex flex-column mb-3 mt-5">
                                <input type="password" class="form-control mt-2" name="password" minlength="8" placeholder="Password" required>
                                <input type="password" class="form-control mt-2" name="confirmPassword" placeholder="Confirm Password" required>
                            </div>
                            <div class="alert alert-danger mt-3" role="alert" id="alertError">
                            </div>
                            <div class="alert alert-success mt-3" role="alert" id="alertSuccess">Successfully Registered! Proceed to <a href="../../index.php">Log-in</a>
                            </div>
                            <button type="submit" class="btn btn-primary form-control mt-3">Sign Up</button>
                            <div class="d-flex justify-content-between ">
                                <button type="button" id="prev2Btn" class="btn btn-outline-dark btn-sm mt-5"><i class="fas fa-chevron-left"></i> Back</button>

                            </div>
                        </div>


                </form>

            </div>


        </div>
</body>

</html>