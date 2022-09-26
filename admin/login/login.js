$(document).ready(function () {
    $("#errorAlert").hide();
<<<<<<< Updated upstream
    $("#errorAlertFP").hide();
    $("#successAlertFP").hide();
=======
<<<<<<< HEAD
    $("#registerSpinner").hide();
=======
    $("#errorAlertFP").hide();
    $("#successAlertFP").hide();
>>>>>>> 2bf6afe057b6cd94b4a289944fb7ca4a1c48e855
>>>>>>> Stashed changes
    $("#loginForm").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "loginProcess.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function () {
                $("#registerSpinner").show();
            },
            success: function (response) {
                $("#registerSpinner").hide();
                if (response.status == 'error') {
                    $("#errorAlert").html(response.msg);
                    $("#errorAlert").show();
                } else {
                    window.location.href = '../HomeAdmin.php';
                }
            },
            error: function (response) {
                $("#errorAlert").html("We encounter a problem when logging your account. Contact admin for more info");
                $("#errorAlert").show();
                console.error(response.responseText);
                $("#registerSpinner").hide();
            }
        });
    });
});

