$(document).ready(function () {

    $("#alertError").hide();
    $("#alertSuccess").hide();

    $("#uploadProjects").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: '../projects/projectsProcess.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            //dataType: "JSON",
            success: function (response) {
                console.log(response);
                // if (response.status == 'error') {
                //     $("#alertError").html(response.msg);
                //     $("#alertError").show();
                // } else {
                //     $("#alertSuccess").html(response.msg);
                //     $("#alertSuccess").show();
                //     $("#uploadProjects").trigger("reset");

                // }
            }
        });
    });

    $('#uploadProjects').change(function (event) {

        $("#alertError").hide();
        $("#alertSuccess").hide();

    });
});
