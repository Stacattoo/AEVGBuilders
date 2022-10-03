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
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status == 'error') {
                    $("#alertError").html(response.msg);
                    $("#alertError").show();
                } else {
                    $("#alertSuccess").html(response.msg);
                    $("#alertSuccess").show();
                    $("#uploadProjects").trigger("reset");

                }
            }
        });
    });

    $('#uploadProjects').change(function (event) {

        $("#alertError").hide();
        $("#alertSuccess").hide();

    });

    $('#imgBtn').change(function () {

        var file = $("input[type=file]").get(0).files[0];

        if (file) {

            var reader = new FileReader();

            reader.onload = function () {
                $("#profileImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }

    });

    $.ajax({
        type: "post",
        url: "../projects/projectsProcess.php",
        data: {
            getAllProjects_req: true
        },
        dataType: "json",
        success: function (response) {
            // var filter = response.filter(function (data) {
            //         return data.category == "renovation";
            // })
            let content = ``;
            $.each(response, function (indexInArray, data) {
                console.log(data);
                content += `
                <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../../${data.image}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">${data.title}</h5>
                            <p class="card-text">${data.description}</p>
                            <p class="card-text"><small class="text-muted">${data.category}</small></p>
                        </div>
                        </div>
                </div>
                 `;
            });
            $("#projects").html(content);
            // console.log(response);
        },
        error: function (response) {
            console.error(response.responseText);
        }
    });
});
