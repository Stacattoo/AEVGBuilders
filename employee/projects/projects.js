$(document).ready(function () {

    $("#alertError").hide();
    $("#alertSuccess").hide();
    $("#alertErrorEdit").hide();
    $("#alertSuccessEdit").hide();
    refreshTable();
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
                    refreshTable();

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
    function refreshTable() {
        $.ajax({
            type: "post",
            url: "../projects/projectsProcess.php",
            data: {
                getAllProjects_req: true
            },
            dataType: "json",
            success: function (response) {

                let content = ``;

                $.each(response, function (indexInArray, data) {
                    console.log(data);
                    content += `
                   
                        <tr class="projectEditDiv" data-id="${data.id}">
                        <th scope="row">${data.id}</th>
                        <td class="align-middle">${data.title}</td>
                        <td class="align-middle">${data.category}</td>
                        <td class="align-middle">${data.description}</td>

                        </tr>
                 `;

                });
                $("#projects").html(content);
                $('.projectEditDiv').click(function (e) {
                    e.preventDefault();

                    projectId = $(this).data("id");
                    dataFilter = response.filter(function (eachEditInfo) {
                        console.log(eachEditInfo);

                        return eachEditInfo.id == projectId;
                    })[0];

                    let contentEdit = ``;
                    $.each(dataFilter.image, function (indexInArray, data) {
                        console.log(data);
                        contentEdit += `
                                <div class="col">
                                    <div class="border">
                                    <button class="deleteImgBtn" id="imageDeleteBtn${indexInArray}"  data-id="">
                                    <img src="../projects/${data}" class="d-block img-fluid img">
                                    </button>
                                    </div>
                                </div>
                            `;
                        $('#view-editImage').html(contentEdit);
                    });
                    
                    $('.deleteImgBtn').attr("data-id", data);
                    $('#deleteBtn').attr("data-id", dataFilter.id);
                    $('#edit-title').val(dataFilter.title);
                    $('#edit-category').val(dataFilter.category);
                    $('#edit-image').attr("src", dataFilter.image);
                    $('#edit-description').html(dataFilter.description);
                    $('#editProjectModal').modal("show");


                });

                // console.log(response);
            },
            error: function (response) {
                console.error(response.responseText);
            }


        });
    }
    $('#deleteBtn').click(function (e) {
        e.preventDefault();
        deleteId = $(this).attr("data-id");
        $.ajax({
            type: "post",
            url: "../projects/deleteProject.php",
            data: {
                deleteProjects_req: true,
                id: deleteId
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('#editProjectModal').modal("hide");
                refreshTable();
            },
            error: function (response) {
                console.error(response.responseText);
            }

        });
    });

    $('.deleteImgBtn').click(function (e){
        e.preventDefault();
        deleteId = $(this).attr("data-id");
        $.ajax({
            type: "post",
            url: "../projects/deleteProject.php",
            data: {
                deleteImage: true,
                id: deleteId
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('#editProjectModal').modal("show");
                //refreshTable();
            },
            error: function (response) {
                console.error(response.responseText);
            }

        });
    });

});
