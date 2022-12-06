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
                console.log(response);
                if (response.status == 'error') {
                    console.log("pasok ba here");
                    $("#alertError").html(response.msg);
                    $("#alertError").show();
                } else {
                    console.log("pasok ba here 2");
                    $("#alertError").hide();
                    $("#alertSuccess").html(response.msg);
                    $("#alertSuccess").show();
                    $('#registerForm').trigger("reset");


                }
            }, error: function (response) {
                console.error(response);
            }
        });
    });

    $('#registerForm').change(function (event) {
        $("#alertError").hide();
        $("#alertSuccess").hide();
    });
});
