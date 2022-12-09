function portfolioDisplay(searchQuery = '') {
    $(document).ready(function () {
        // $("#records").html("");

        $.ajax({
            type: "POST",
            url: "../message/messageDisplay.php",
            data: {
                displayApprovedUser: true
            },
            dataType: "JSON",
            success: function (response) {
                var content = ``;
                var filtered = response.filter(function (data) {
                    searchQuery = searchQuery.toLowerCase();
                    return data.email.includes(searchQuery)
                        || data.fullName.toLowerCase().includes(searchQuery)
                        || data.email.toLowerCase().includes(searchQuery)

                });
                $.each(filtered, function (i, data) {

                    content += `
					<button type="button" class="client list-group-item list-group-item-action" data-id='`+ data.id + `'>
						<h5 class="text-capitalize mb-1">`+ data.fullName + `</h5>
						<p class="mb-1">`+ data.email + `</p>
					</button>`;

                });
                $('#list').html(content);
            }
            ,
            // error: function (dataResult) {
            // 	console.log(dataResult);
            // },
            complete: function () {
                $(".client").click(function (e) {
                    e.preventDefault();
                    $(".client").removeClass("active");
                    $(this).addClass("active");
                    var userid = $(this).attr("data-id");
                    console.log("client click");
                    console.log(userid);
                    $.ajax({
                        url: "../portfolio/portfolioContent.php",
                        type: "POST",
                        data: {
                            id: userid
                        },
                        success: function (dataResult) {
                            $("#records").html(dataResult);
                        },
                        error: function (result) {
                            console.log(result);
                        }
                    });
                });
            }
        });

    });
}
$(document).ready(function () {
    refreshTable();
    $("#uploadProjects").submit(function (event) {
        event.preventDefault();
        console.log($('#imgBtn').val());
        if ($('#imgBtn').val() == '') {
            $("#alertError").show();
            $("#alertError").html("Image Required!");
        } 
        else {
            $.ajax({
                type: 'post',
                url: '../portfolio/portfolioProcess.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    refreshTable();
                    if (response.status == 'error') {
                        $("#alertError").html(response.msg);
                        $("#alertError").show();
                    } else {
                        // imageRefresh();
                        $("#alertSuccess").html(response.msg);
                        $("#imgCon").html("");
                        $("#alertSuccess").show();
                        $("#uploadProjects").trigger("reset");

                    }
                }
            });
        }
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
        var userid = $(this).attr("data-id");
        $.ajax({
            type: "post",
            url: "../portfolio/portfolioProcess.php",
            data: {
                getAllProjects_req: true,
                id: userid
            },
            dataType: "json",
            success: function (response) {

                let content = ``;
                $.each(response, function (indexInArray, data) {
                    content += `
                    <div class="col">
                        <div class="projectEditDiv card shadow-sm" data-bs-target="#editProjectModal" data-bs-toggle="modal" data-id="${data.id}" style="cursor: pointer;">
                            <div class="card-img-top" style="height: 220px; background-image: url('${data.image[0]}'); background-size: cover; ">
                            </div>

                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">                       
                                <div class="fw-bold text-capitalize">${data.title}</div> 
                                </div>
                                <p class="card-text text-truncate">${data.description}</p>
                                </div>
                            </div>
                        </div>
                    </div>    
                        `;

                });

                $("#projects").html(content);

                $('.projectEditDiv').click(function (e) {
                    e.preventDefault();
                    projectId = $(this).data("id");
                    console.log(projectId);
                    $('#hiddenId').val(projectId);
                    dataFilter = response.filter(function (eachEditInfo) {
                        console.log(eachEditInfo);
                        return eachEditInfo.id == projectId;
                    })[0];
                    function imageRefresh() {
                        let contentEdit = ``;
                        // console.log(dataFilter.image);
                        $.each(dataFilter.image, function (indexInArray, data) {

                            contentEdit += `
                                <div class="col">
                                    <div class="border position-relative">
                                        <img src="${data}" class="d-block img-fluid img">
                                        <span class="deleteImgBtn position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                            id="imageDeleteBtn"  data-id="${indexInArray}">
                                            -
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

                        $('.deleteImgBtn').click(function (e) {
                            e.preventDefault();
                            deleteId = $(this).attr('data-id');
                            imageSplice = dataFilter.image.splice(deleteId, 1);
                            console.log(dataFilter.image);
                            imageRefresh();
    
                        });
                    }

                    imageRefresh();
                    $('#deleteBtn').attr("data-id", dataFilter.id);
                    $('#hiddenId').data("id", dataFilter.id);
                    $('#edit-title').val(dataFilter.title);
                    $('#edit-description').html(dataFilter.description);
                    // $('#editProjectModal').modal("show");

                   
                    $("#alertErrorEdit").hide();
                    $("#alertSuccessEdit").hide();
                    $('#editUploadProjects').submit(function (e) {
                        e.preventDefault();
                        //var dataform = $(this).serializeArray(); // Form Data Ginawang variable
                        $.ajax({
                            type: 'post',
                            url: '../portfolio/portfolioEdit.php',
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
                                    // $('#editProjectModal').modal("hide");
                                    $.each(response.img, function (indexInArray, val) { 
                                        dataFilter.image.push(val)
                                        console.log(val);
                                    });
                                }
                                imageRefresh();
                            }
                            // , error: function (response) {
                            //     console.error(response);
                            // }
                        });
                    });

                });

                // console.log(response);
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
            url: "../portfolio/portfolioDelete.php",
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
