<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="forgot.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="form-container text-center p-5">
        <div class="display-1 mb-5">
            <h4>Forgot Password</h4>
        </div>
        <form id="forgotPassForm">
            <input type="text" class="form-control mt-5" name="email" placeholder="Email">
            <div class="alert alert-danger mt-2" role="alert" id="alertError">
            </div>
            <div class="alert alert-success mt-2" role="alert" id="alertSuccess">
                A new password was successfully sent on your email.
                <a href=".'../login/login.php">Login</a>
            </div>
            <button type="submit" class="btn btn-primary form-control mt-1" id="forgotBtn">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span>
                <span id="load">Loading...</span>
                <span id="send">Send Email</span>
            </button>

        </form>

    </div>
    <script>
        $(document).ready(function() {

            $("#alertError").hide();
            $("#alertSuccess").hide();
            $("#spinner").hide();
            $("#load").hide();
            $("#send").show();

            $('#forgotPassForm').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'forgotProcess.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function() {
                        $("#spinner").show();
                        $("#load").show();
                        $("#send").hide();
                        $("#forgotBtn").attr("disabled", "disabled");
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'error') {
                            $("#spinner").hide();
                            $("#load").hide();
                            $("#send").show();
                            $("#forgotBtn").removeAttr('disabled');
                            $("#alertError").html(response.msg);
                            $("#alertError").show();
                        } else {
                            $("#spinner").hide();
                            $("#load").hide();
                            $("#send").show();
                            $("#alertSuccess").html(response.msg);
                            $("#alertSuccess").show();
                        }
                    }
                });
            });
        });
        $('#forgotPassForm').change(function(event) {
            $("#alertError").hide();
            $("#alertSuccess").hide();
            
            
        });
    </script>
</body>

</html>