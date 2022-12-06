$(document).ready(function () {
    $("#alertError").hide();
    $("#alertSuccess").hide();
    // $("#step1").hide();
    $("#step2").hide();
    $("#step3").hide();
    $("#step4").hide();



    $("#step1Btn").click(function (e) {
        e.preventDefault();
        $("#step1").hide();
        $("#step2").show();
        $(".progress-bar").width("40%");
    });

    $("#prev1Btn").click(function (e) {
        e.preventDefault();
        $("#step1").show();
        $("#step2").hide();
        $(".progress-bar").width("20%");
    });

    $("#step2Btn").click(function (e) {
        e.preventDefault();
        $("#step2").hide();
        $("#step3").show();
        $(".progress-bar").width("70%");
    });

    $("#prev2Btn").click(function (e) {
        e.preventDefault();
        $("#step2").show();
        $("#step3").hide();
        $(".progress-bar").width("30%");
    });
    $("#step3Btn").click(function (e) {
        e.preventDefault();
        $("#step3").hide();
        $("#step4").show();
        $(".progress-bar").width("100%");
    });

    $("#prev3Btn").click(function (e) {
        e.preventDefault();
        $("#step3").show();
        $("#step4").hide();
        $(".progress-bar").width("70%");
    });


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
