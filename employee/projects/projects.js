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
                    <tbody class="projectEditDiv" data-id="${data.id}">
                        <tr>
                        <th scope="row">${data.id}</th>
                        <td>${data.title}</td>
                        <td>${data.category}</td>
                        <td>${data.image}</td>
                        <td>${data.description}</td>
                        </tr>
                    <tbody>
                 `;
            });
            $("#projects").html(content);


            // console.log(response);
        },
        error: function (response) {
            console.error(response.responseText);
        }


    });

    $('.projectEditDiv').click(function (e) {
        e.preventDefault();

        console.log(projectId = $(this).data("id"));

        // $('#edit-title').val(projectId.title);
        // $('#edit-title').val(projectId.title);
    });
});
