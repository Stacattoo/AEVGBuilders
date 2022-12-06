$(document).ready(function () {

    $("#alertError").hide();
    $("#alertSuccess").hide();

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
                    $("#imgCon").html("");
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
            url: "projects/projectsProcess.php",
            data: {
                getAllProjects_req: true
            },
            dataType: "json",
            success: function (response) {
                let content = ``;
                $.each(response, function (indexInArray, data) {
                    content += `
                    <div class="col">
                        <div class="projectEditDiv card shadow-sm" data-id="${data.id}" style="cursor: pointer;">
                            <div class="card-img-top" style="height: 220px; background-image: url('../employee/projects/${data.image[0]}'); background-size: cover; ">
                            </div>
                            
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">                       
                                <div class="fw-bold text-capitalize">${data.title}</div> 
                                <small class="text-muted">${data.category}</small>
                                </div>
                                <p class="card-text text-truncate">${data.description}</p>
                            </div>
                        </div>
                    </div>    
                        `;
                });

                $("#projects").html(content);

                $('.projectEditDiv').click(function (e) {
                    e.preventDefault();
                    projectId = $(this).data("id");
                    $('#hiddenId').val(projectId);
                    dataFilter = response.filter(function (eachEditInfo) {
                        //console.log(eachEditInfo);
                        return eachEditInfo.id == projectId;
                    })[0];
                    function imageRefresh() {
                        let contentEdit = ``;
                        $.each(dataFilter.image, function (indexInArray, data) {

                            // removeItem = dataFilter.image.splice()
                            console.log(data);
                            contentEdit += `
                                <div class="col">
                                    <div class="border position-relative">
                                        <img src="../employee/projects/${data}" class="d-block img-fluid img">
                                        <span class="deleteImgBtn position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                            id="imageDeleteBtn"  data-id="${indexInArray}">
                                            X
                                        </span>
                                       
                                    </div>
                                </div>
                                <style> 
                                    .deleteImgBtn {
                                        cursor: pointer;
                                    }

                                    .deleteImgBtn:hover {
                                        background: #461217 !important;
                                    }
                                </style>
                            `;
                        });
                        $('#view-editImage').html(contentEdit);
                        $('#edit-image').val(dataFilter.image);
                    }
                    imageRefresh();
                    $('#deleteBtn').attr("data-id", dataFilter.id);
                    $('#hiddenId').data("id", dataFilter.id);
                    $('#edit-title').val(dataFilter.title);
                    $('#edit-category').val(dataFilter.category);
                    $('#edit-description').html(dataFilter.description);
                    $('#editProjectModal').modal("show");

                    $('.deleteImgBtn').click(function (e) {
                        e.preventDefault();
                        deleteId = $(this).attr('data-id');
                        imageSplice = dataFilter.image.splice(deleteId, 1);
                        console.log(imageSplice);
                        imageRefresh();

                    });
                    $("#alertErrorEdit").hide();
                    $("#alertSuccessEdit").hide();
                    $('#editUploadProjects').submit(function (e) {
                        e.preventDefault();
                        console.log("ok log check");
                        //var dataform = $(this).serializeArray(); // Form Data Ginawang variable
                        $.ajax({
                            type: 'post',
                            url: '../admin/projects/editProfileProcess.php',
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: "JSON",
                            success: function (response) {
                                if (response.status == 'error') {
                                    $("#alertErrorEdit").html(response.msg);
                                    $("#alertErrorEdit").show();
                                } else {
                                    $("#alertSuccessEdit").html(response.msg);
                                    $("#alertSuccessEdit").show();
                                    $("#editUploadProjects").trigger("reset");
                                    $('#editProjectModal').modal("hide");
                                    refreshTable();
                                   
                                }
                            }, error: function (response) {
                                console.error(response);
                            }
                        });
                    });

                });
            }
            ,
            error: function (response) {
                console.error(response.responseText);
            }


        });
    } // End of Refresh Table :D


    $('#deleteBtn').click(function (e) {
        e.preventDefault();
        deleteId = $(this).attr("data-id");
        console.log(deleteId);
        $.ajax({
            type: "post",
            url: "projects/deleteProject.php",
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

});
