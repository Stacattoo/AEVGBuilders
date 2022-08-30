$(document).ready(function () {
    $("#alertError").hide();
    $("#alertSuccess").hide();
    $('#registerForm').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: 'registerProcess.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            success: function (response) {
                //console.log(response);
                if (response.status == 'error') {
                    $("#alertError").html(response.msg);
                    $("#alertError").show();
                } else {
                    $("#alertError").hide();
                    $("#alertSuccess").show();
                    //$("#alertSuccess").html(response.msg);
                    $('#registerForm').trigger("reset");

                }
            }
        });
    });
});
